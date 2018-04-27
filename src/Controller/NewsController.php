<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\View\View;
use App\Controller\component\Email;
use App\Controller\component\Upload;
use Cake\View\Helper;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Controller\Component;
use Cake\Network\Session\DatabaseSession;
use Cake\View\Helper\SessionHelper;
use Cake\Collection\Collection;
class NewsController extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator');
	var $components = array('RequestHandler');
	public function initialize()
	{
		parent::initialize();
	}
	public function readTypeproduct()
	{
		$typeProducts = TableRegistry::get('typeproducts');
		$query = $typeProducts->find()
		->select(['typeproducts.name','typeproducts.id'])
		-> toArray();
		$this->set('typeproducts',$query);
	}
	public function news()
	{	
		$product = TableRegistry::get('products');
		$sl = TableRegistry::get('slides');
		$slides= $sl->find('all');
		$count = count($product->find('all')->toArray());
		$pr  = array();
		for($i=1; $i <$count-3 ; $i++){ 
			array_push($pr,$i);
		}
		$random_keys=array_rand($pr,6);
		$product_sale  = array();

		foreach ($random_keys as $key ) {
				if($key == 0){
					$key = $count-1;
				}
				$image = $product->get($key);
				array_push($product_sale,$image);
		}
		$this->readTypeproduct();
		
		$news = $this->News->find('all')
		->order(['news.id' => 'desc'])
		->toArray();
		$this->set(compact('news','product_sale')); 
	}
	public function comment()
	{
		$c = TableRegistry::get('comments');
		$query = $c->find('all')
		->where(['comments.id_news !=' =>0])
		->order(['comments.id' => 'desc'])
		-> toArray();

		$this->set('comments',$query);
	}

	public function addComment($id)
	{
		$c = TableRegistry::get('comments');
		$read_user = $this->request->session()->read('Auth.User');
		$email =  $read_user['email'];
		$data = $this->request->data();
		$comment = $c->newEntity();
		$comment['id_user'] = $read_user['id'];
		$comment['id_news'] = $id;
		$comment['comment'] = $data['comment'];
		$comment['email'] = $email;
		$c->save($comment);
		$this->redirect($this->referer());
	}

	public function deleteComment($id)
	{	
		$readuser = $this->request->session()->read('Auth.User');
		$c = TableRegistry::get('comments');
		$comment = $c->get($id);

		if($readuser['id']== $comment['id_user']){
			if ($c->delete($comment)) {
			$this->Flash->success(__('Bình luận id: {0} đã được xóa.', h($id)));
			return $this->redirect($this->referer());
			} 
		}else {
			$this->Flash->error(__('Bạn không có quyền xóa bình luận này. Bạn chỉ có thể xóa bình luận của mình'));
			return $this->redirect($this->referer());
		}
		
	}
	public function detailNews($id)
	{

		$this->comment();
		$this->readTypeproduct();
		$this->news();
		$img = TableRegistry::get('images');
		$image = $img->find("all")
		->where(['images.id_news = ' =>$id])
		->toArray();
		$getnews = $this->News->get($id)->toArray();
		$this->set(compact('getnews','image' ));
	}
	public function listNews()
	{
		$readuser = $this->request->session()->read('Auth.User');

		$this->readTypeproduct();
		$this->paginate= array(
			'limit' => LIMIT_LISR_USER,
			'order' => [
				'news.id' => 'DESC'
			],
		);
		if($readuser['permission'] == 2){
			$getnews = $this->News->find('all')
			->where(['news.id_author =' => $readuser['id']] );
			$news = $this->paginate($getnews);
		}
		else if($readuser['permission']==3){
			$news = $this->paginate('News');
		}
		$this->set(compact('news','typeproducts'));		
	}
	
 
	public function saveImage()
	{
		$img = TableRegistry::get('images');
		$id = $this->News->find()
		->select(['id'])
		->where(['id !=' => 1])
		->last();
		$data = $this->request->data();
		$image=$data['img_up'];
		$dir = WWW_ROOT .'img\uploads\ '. $image;
		$a = move_uploaded_file($data['img_up'], $dir);
		$saveimg = $img->newEntity();
		$saveimg['image'] = '/img/uploads/'.$image;
		$saveimg['id_news']	= $id['id'];
		$img->save($saveimg);

	}
	public function addNews()
	{	
		$this->readTypeproduct();
		$this->news();
		$img = TableRegistry::get('images');
	 	$news = $this->News->newEntity();
		if($this->request->is('post'))
		{
			$this->News->patchEntity($news,$this->request->data);
	 		$readuser = $this->request->session()->read('Auth.User');
	 		$news['author'] = $readuser['name'];
	 			$this->News->save($news);
				$this->saveImage();
				$this->Flash->success(__('Bài viết của bạn đã được tạo. Cảm ơn bạn'));
				return $this->redirect(URL_INDEX);
		}
	}
			
	public function editNews($id)
	{	
		$readuser = $this->request->session()->read('Auth.User');
		$this->readTypeproduct();
		$this->news();
		$news = $this->News->get($id);
		$img = TableRegistry::get('images');
		$image =$this->News->find()
		->select(['c.image','c.id'])
		->hydrate(false)
		->join([
			'table' => 'images',
			'alias' => 'c',
			'type' => 'LEFT',
			'conditions' => array(
				'c.id_news = news.id',
			)     
		])
		->where(['news.id =' => $id ])
		->toArray();

		if ($readuser['id'] == $news->id_author) {
			if ($this->request->is(['post'])) {
				
				$this->News->patchEntity($news, $this->request->data);
				if ($this->News->save($news)) {
					$this->saveImage();
					$this->Flash->success(__('Bài viết của bạn được cập nhật.'));
					return $this->redirect($this->referer());
				}$this->Flash->error(__('không thể cập nhật bài viết.'));
			}
		}else {
			$this->Flash->error(__('Bạn không có quyền chỉnh sửa bài viết này.'));
			return $this->redirect($this->referer());
		}
		

		$this->set(compact('news', 'image'));
	}
	public function deleteImage($id)
	{	
		$img = TableRegistry::get('images');
		$id = $img->get($id);
		if ($img->delete($id)) {
			$this->Flash->success(__('Ảnh Đã Được Xóa.', h($id)));
			return $this->redirect($this->referer());
		}		
	}
	public function delete($id)
	{
		$news = TableRegistry::get('news');
		$id = $news->get($id);
		if ($news->delete($id)) {
			$this->Flash->success(__('Bản tin đã được xóa.'));
			return $this->redirect(URL_INDEX);
		}		
	}
}
?>

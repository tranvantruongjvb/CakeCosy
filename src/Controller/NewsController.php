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
		
		$news = $this->News->find('all')-> toArray();
		$this->set(compact('news','product_sale')); 
	}
	public function detailNews($id)
	{
		$img = TableRegistry::get('images');
		$getpro = $img->find("all")
		->where(['images.id_news = ' =>$id])
		->toArray();
		pr($getpro);die;
		$image = $img->get($id);
		pr($image);
	}
	public function listNews()
	{
		$this->readTypeproduct();
		$this->paginate= array(
			'limit' => LIMIT_LISR_USER,
			'order' => [
				'news.id' => 'DESC'
			],
		);
		$news = $this->paginate('News');
		$this->set(compact('news','typeproducts'));		
	}
	public function addNews()
	{	
		$this->readTypeproduct();
		$this->news();
		$img = TableRegistry::get('images');
	 	$news = $this->News->newEntity();
	 	
		if ($this->request->is('post'))
		{
			$this->News->patchEntity($news,$this->request->data);
	 		$readuser = $this->request->session()->read('Auth.User');
	 		$news['author'] = $readuser['name'];
			if ($this->News->save($news)) {
				$id = $this->News->find()
				->select(['id'])
				->where(['id !=' => 1])
				->last();

				$data = $this->request->data();
				$image=$data['image'];		
				$dir = WWW_ROOT .'img\uploads\ '. $image;
				$a = move_uploaded_file($data['image'], $dir);
				$saveimg = $img->newEntity();
				$saveimg['image'] = '/img/uploads/'.$image;
				$saveimg['id_news']	= $id['id'];
				$img->save($saveimg);
				$this->Flash->success(__('Bài viết của bạn đã được tạo. Cảm ơn bạn'));
				return $this->redirect(URL_INDEX);
			}
			else{
				$this->Flash->error(__('Không thể lưu lại bài viết. Thử lại .'));
			}
		}
		$this->Flash->error(__('Không thể Đăng Ký Tài Khoản.'));
	}
			
	public function editNews($id)
	{	
		$this->readTypeproduct();
		$this->news();
		$news = $this->News->get($id);
		$img = TableRegistry::get('images');
		$image =$this->News->find()
		->select(['c.image'])
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
		if ($this->request->is(['post'])) {
			$this->News->patchEntity($news, $this->request->data);
			if ($this->News->save($news)) {
				$this->Flash->success(__('Bài viết của bạn được cập nhật.'));
				return $this->redirect($this->referer());
			}$this->Flash->error(__('không thể cập nhật bài viết.'));
		}
		$this->set(compact('news', 'image'));
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('Người Dùng Có id: {0} Đã Được Xóa.', h($id)));
			return $this->redirect($this->referer());
		}		
	}
}
?>

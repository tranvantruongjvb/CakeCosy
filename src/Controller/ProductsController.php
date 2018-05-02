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
class ProductsController  extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator'   );
	var $components = array('RequestHandler','session');
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout']);
	}
	public function getNew()
	{
		$news = TableRegistry::get('get_email');
		if($this->request->is('post')) {
			$data = $this->request->data();
			$email = $data['your_email'];
			$array  = array('email'=>$email);
			$get = $news->newEntity();
			$get->email = $email;
			$news->save($get);
			$this->Email->sendUserEmail($email,'Nhận tin từ CakeFoody',$array,'getnews');
			$this->Flash->success(__('Cảm ơn bạn đăng ký nhận tin từ CakeFoody'));
			$this->redirect($this->referer());
		}
	}
	public function index()
	{
		$this->readtypeproduct();
		$sl = TableRegistry::get('slides');
		$slides= $sl->find('all');
		$count = count($this->Products->find('all')->toArray());
		$pr  = array();
		for($i=1; $i <$count-4 ; $i++){ 
			array_push($pr,$i);
		}
		$random_keys=array_rand($pr,4);
		$product_sale  = array();
		foreach ($random_keys as $key ) {
				if($key == 0){
					$key = $count-1;
				}
				$image = $this->Products->get($key);
				array_push($product_sale,$image);
		}
		$random_new=array_rand($pr,4);
		$product_new  = array();
		foreach ($random_new as $key ) {
				if($key == 0){
					$key = $count-1;
				}
				$image = $this->Products->get($key);
				array_push($product_new,$image);
		}
		$promotion = $this->Products->find("all")
		->where( ['products.promotion_price >=' => 1])
		->order(['products.id' => 'DESC']);
		$this->paginate= array(
			'limit' => LIMIT_PRODUCT_INDEX);
		$promotion_price = $this->paginate($promotion)->toArray();
		$new = $this->Products->find("all")
		->where(['products.new >=' => 1 ])
		->order(['products.id' => 'desc'])
		->limit(LIMIT_PRODUCT_INDEX);
		$productnew = $this->paginate($new)->toArray();
		$price100 = $this->Products->find("all")
		->where(['products.unit_price <=' => 100000 ])
		->limit(LIMIT_PRODUCT_INDEX);
		$price200 = $this->Products->find("all")
		->where(['products.unit_price <=' => 200000 , 'products.unit_price >=' => 100000])
		->limit(LIMIT_PRODUCT_INDEX);
		$price300 = $this->Products->find("all")
		->where(['products.unit_price <=' => 300000 , 'products.unit_price >=' => 200000])
		->limit(LIMIT_PRODUCT_INDEX)
		->order(['products.id' => 'desc']);
		$price400 = $this->Products->find("all")
		->where(['products.unit_price >=' => 300000])
		->limit(LIMIT_PRODUCT_INDEX);
		$this->set(compact('productnew','promotion_price','price100','price200','price300','price400','slides','product_sale','product_new'));
	}
	public function viewMoreProduct($id)
	{   
		$this->readtypeproduct();
		if($this->request->data()){
			$s = $this->request->data();
			$sort = $s['sort'];
		}else{
			$sort ='thấp';
		}
		if($id ==11 ){
			$find = $this->Products->find('all')
			->where(['products.promotion_price >' =>0]);
			if($sort == 'thấp'){
				$find->order(['products.promotion_price' => 'asc']);
			}else {
				$find->order(['products.promotion_price' => 'desc']);
			}
			$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,);
			$products = $this->paginate($find);
			$name =" Sản Phẩm Khuyến Mãi";
		}else if($id <100000 ){
			$find = $this->Products->find('all')
			->where(['products.unit_price <' =>100000]);
			if($sort  == 'thấp'){
				$find->order(['products.promotion_price' => 'asc']);
			}else {
				$find->order(['products.promotion_price' => 'desc']);   
			}
			$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,);
			$products = $this->paginate($find);
			$name =" Sản Phẩm Có Giá Nhỏ hơn 100,000đ ";
		}else if($id >= 100000 && $id <200000 ){
			$find = $this->Products->find('all')
			->where(['products.unit_price <=' =>200000, 'products.unit_price >=' =>100000]);
			if($sort  == 'thấp'){
				$find->order(['products.promotion_price' => 'asc']);
			}else {
				$find->order(['products.promotion_price' => 'desc']);
			}
			$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,);
			$products = $this->paginate($find);
			$name =" Sản Phẩm Có Giá Từ 100,000đ Đến 200,000đ ";
		}else if($id >= 200000 && $id <300000){
			$find = $this->Products->find('all')
			->where(['products.unit_price <=' =>300000, 'products.unit_price >' =>200000]);
			if($sort  == 'thấp'){
				$find->order(['products.promotion_price' => 'asc']);
			}else {
				$find->order(['products.promotion_price' => 'desc']);
			}
			$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,);
			$products = $this->paginate($find);
			$name =" Sản Phẩm Có Giá Từ 200,000đ Đến 300,000đ ";
		}else if($id >= 300000 ){
			$find = $this->Products->find('all')
			->where(['products.unit_price >' =>300000]);
			if($sort  == 'thấp'){
				$find->order(['products.promotion_price' => 'asc']);
			}else {
				$find->order(['products.promotion_price' => 'desc']);
			}
			$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,);
			$products = $this->paginate($find);
			$name =" Sản Phẩm Có Giá Lớn Hơn 300,000đ ";
		}
		$viewmoreproducts = $products->toArray();
		$this->set(compact('viewmoreproducts','name'));
	}
	public function getAddToCart($id){
		$product = $this->Products->get($id);
		$session = $this->request->session();
		if ($session->check('cart.'.$id)) {
			$items = $session->read('cart.'.$id);
			$items['quantity'] +=1;
		}else{
			$items = array(
				'id' => $product->id,
				'name' => $product->name,
				'image' => $product->image,
				'price' => $product->unit_price,
				'quantity'=> 1,
			);
		}
		$session->delete('payment.total2');
		$session->write('cart.'.$id, $items);
		$s= $session->read('cart');
		$total=0;
		foreach ($s as $value) {
			$total += $value['price'] * $value['quantity'];
		}
		$session->write('payment.total',$total);
		$this->Flash->success(__('Bạn đã chọn sản phẩm ' . $s[$product->id]['name']));
		$this->redirect($this->referer());
	}
	public function deleteItem($id)
	{
		$product = $this->Products->get($id);
		$session = $this->request->session();
		$session->delete('cart.'.$product->id);
		$s= $session->read('cart');
		$total=0;
		foreach ($s as $value) {
			$total += $value['price'] * $value['quantity'];
		}
		$session->write('payment.total2',$total);
		$this->redirect($this->referer());
	}
	public function updateQuantity()
	{
		$s= $this->request->data;
		$id = $s['id'];
		$b = $s['sl'];
		$session = $this->request->session();
		if ($session->check('cart.'.$id)) {
			$items = $session->read('cart.'.$id);
			$items['quantity'] = $b;
		}
		$session->delete('payment.total2');
		$session->write('cart.'.$id, $items);
		$s= $session->read('cart');
		$total=0;
		foreach ($s as $value) {
			$total += $value['price'] * $value['quantity'];
		}
		$session->write('payment.total',$total);die;
	}
	public function destroy()
	{    $session = $this->request->session();
		$session->destroy('cart');
		$this->redirect($this->referer());
	}
	public function order(){
		$this->readtypeproduct();
		$session = $this->request->session();
		$total =0;
		if($session->check('cart')){
			$oldCart = $session->read('cart');
			foreach ($oldCart as $value) {
				$items = array(
					$total =  $value['quantity'] * $value['price']);
			}
			if($total !=0 ){
				$totalPrice = $total;
			}else{
				$totalPrice = 0;
			}
			$session->write('order', $totalPrice);
			$s=$session->read('order');
		}
	}
	public function customerBill($id)
	{
		$this->readtypeproduct();
		$cus = TableRegistry::get('customer');
		$getcus= $cus->find('all')
		->where(['customer.id_user = ' => $id ])
		->order(['customer.id' => 'desc'])
		->toArray();
		$this->set('billcustomer',$getcus);
	}
	public function deleteCustomer($id)
	{   
		$customer = TableRegistry::get('customer');
		$bill = TableRegistry::get('bills');
		$bill_detail = TableRegistry::get('bill_detail');
		$cus = $customer->get($id);
		$b = $bill->find()
		->where(['bills.id_customer =' => $id])->toArray();
		$getidb = $bill->get($b['0']['id']);
		$bd = $bill_detail->find()
		->where(['bill_detail.id_bill =' => $getidb['id']])->toArray();
		$g = $bill_detail->get($bd['0']['id']);
		if ($bill->delete($getidb) && $customer->delete($cus) && $bill_detail->delete($g) ) {
			$this->Flash->success(__('Khách hàng đã được xóa.'));
			return $this->redirect($this->referer());
		}
	}
	public function listCustomer()
	{
		$this->readtypeproduct();
		$customer = TableRegistry::get('customer');
		$bill = TableRegistry::get('bills');
		$bill_detail = TableRegistry::get('bill_detail');
		$find = $customer->find('all')
		->order(['customer.id' =>'desc']);
		$this->paginate= array(
			'limit' => LIMIT_LISR_USER,
		);
		$customers = $this->paginate($find);
		$bills = $bill->find('all');
		$bill_details = $bill_detail->find('all');
		$this->set(compact('customers','typeproducts'));
	}
	public function updateStatus($id)
	{
		$customer = TableRegistry::get('customer');
		$cus = $customer->get($id);
		$status = $this->request->data();
		if($status['status'] ==1 ){
			$cus['status'] ='Đang chuyển đi';
		}else if($status['status'] == 2 ){
			$cus['status'] ='Đã thanh toán';
		}
		$customer->save($cus);
		$this->redirect($this->referer());
	}
	public function billDetail($id)
	{
		$this->readtypeproduct();
		$customer = TableRegistry::get('customer');
		$bill = TableRegistry::get('bills');
		$bill_detail = TableRegistry::get('bill_detail');
		$getid = $customer->get($id)->id;
		$customers = $customer->find('all');
		$bills = $bill->find('all')
		->where(['bills.id_customer =' => $getid])
		->toArray();
		$bill_details = $bill_detail->find('all');
		$listbills = $bill->find()
		->select(['c.id','c.name','c.email','c.address','c.phone_number','c.note','c.status','bills.total',
			'b.quantity','b.unit_price','b.created_at','p.name','p.image'
		])
		->where(['c.id =' => $getid])
		->hydrate(false)
		->join([
			'b' =>[
				'table' => 'bill_detail',
				'type' => 'LEFT',
				'conditions' => array(
					'bills.id = b.id_bill',
				)],
				'c' =>[
					'table' => 'customer', 
					'type' => 'LEFT',
					'conditions' => array(
						'c.id = bills.id_customer',
					)],
					'p' =>[
						'table' => 'products', 
						'type' => 'LEFT',
						'conditions' => array(
							'p.id = b.id_product',
						)],
					])->toArray();
		$this->set(compact('listbills','customers','bills','bill_details','typeproducts'));
	}
	public function getSearch(){
		$this->readtypeproduct();
		$key= $this->request->query;
		$findname = $this->Products->find("all")
		->where(['name LIKE' => '%'.$key['key'].'%']);
		$this->paginate= array(
			'order' => [
				'find.id' => 'asc'
			]
		);
		$products = $this->paginate($findname);
		if (count($products)== 0) {
			$findid = $this->Products->find("all")
			->where(['id =' => $key['key'].'%']);
			$this->paginate= array(
				'order' => [
					'find.id' => 'asc'
				]
			);
			$products = $this->paginate($findid);
		}
		$this->set(compact('products'));
	}
	public function postCheckout(){
		$session = $this->request->session();
		$cus = TableRegistry::get('customer');
		$getbill = TableRegistry::get('bills');
		$get_bill_detail = TableRegistry::get('bill_detail');
		$get_email = TableRegistry::get('get_email');
		$readuser = $session->read('Auth.User');
		$cart = $session->read('cart');
		$totalPrice = $session->read('payment.total');
		$req= $this->request->data();
		$readcustomer = $cus->find('all');
		$cusumer = $cus->newEntity();
		if($readuser['permission']==1 || $readuser['permission']== 2 ){
			$cusumer->id_user = $readuser['id'];
		}else {
			$cusumer->id_user = 0;
		}
		$cusumer->name = $req['full_name'];
		$cusumer->email = $req['email'];
		$cusumer->address = $req['address'];
		$cusumer->phone_number = $req['phone'];
		$cusumer->note = $req['notes'];
		$cus->save($cusumer);
		$customerid = $cus->find()
		->select(['id', 'name'])
		->where(['id !=' => 1])
		->last();
		$get = $get_email->newEntity();
		$get->email = $req['email'];
		$get_email->save($get);
		$bill = $getbill->newEntity();
		$bill->id_customer = $customerid->id;
		$bill->date_order = date('Y-m-d');
		$bill->total = $totalPrice;
		$bill->payment = $req['payment_method'];
		$bill->note = $req['notes'];
		$getbill->save($bill);
		$billid = $getbill->find()
		->select(['id'])
		->where(['id !=' => 1])
		->last();
		$arrayName = array();
		foreach ($cart as $key) {
			$bill_detail = $getbill->newEntity();
			$bill_detail->id_bill = $billid['id'];
			$bill_detail->id_product = $key['id'];//$value['item']['id'];
			$arr =  array_push($arrayName, array($key['name'],$key['quantity']));
			$bill_detail->quantity = $key['quantity'];
			$bill_detail->subtotal = $key['quantity'] *  $key['price'];
			$bill_detail->unit_price = $key['price'];
			$get_bill_detail->save($bill_detail);
			}
		$array  = array('name'=>$cusumer->name, 'address'=>$cusumer->address, 'phone'=>$cusumer->phone_number, 'notes'=> $cusumer->note,'totalpay'=>$bill->total, 'payment'=>$bill->payment, 'nameproduct'=>$arrayName);
		$this->Email->sendUserEmail($cusumer->email,'CakeFoody',$array,'order');
		$session->delete('cart');
		$session->delete('payment.total');
		$this->Flash->success(__('Cảm ơn bạn đã mua sản phẩm của chúng tôi. Đơn hàng đang được sử lý'));
		$this->redirect(URL_INDEX);
	}
	public function readTypeproduct()
	{
		$typeProducts = TableRegistry::get('typeproducts');
		$query = $typeProducts->find()
		->select(['typeproducts.name','typeproducts.id'])
		-> toArray();
		$this->set('typeproducts',$query);
	}
	public function typeProduct($id)
	{   
		$this->readtypeproduct();
		$typeProducts = TableRegistry::get('typeproducts');
		$gettype = $typeProducts->get($id)->id;
		$getpro = $this->Products->find("all")
		->hydrate(false)
		->join([
			'table' => 'typeProducts',
			'alias' => 'c',
			'type' => 'LEFT',
			'conditions' => array(
				'c.id = products.id_type',
			)     
		])
		->where(['products.id_type =' => $gettype ]);
		$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,
		);

		if($this->request->is('post')){
			$s = $this->request->data();
			$sort = $s['sort'];
			$getpro->order(['products.unit_price' => 'desc']);
		}else{
			$sort ='thấp';
			$getpro->order(['products.unit_price' => 'asc']);
		}
		$getproduct = $this->paginate($getpro);
		$this->set(compact("typeproducts", "getproduct"));
	}
	public function detailProduct($id)
	{
		$this->readtypeproduct();
		$product = $this->Products->get($id);
		$this->set('products', $product);

		$c = TableRegistry::get('comments');
		$comments = $c->find('all')
		->join([
			'table' => 'products',
			'alias' => 'c',
			'type' => 'LEFT',
			'conditions' => array(
				'c.id = comments.id',
			)     
		])
		->where(['comments.product_id = ' =>$product->id])
		->order(['comments.id' => 'desc'])
		-> toArray();
		$type = $this->Products->find("all")
		->where(['products.id_type >=' => $product->id_type ]
		);
		$this->paginate= array(
			'limit' => LIMIT_DETAIL_PRODUCT,
			'order' => [
				'products.id' =>' asc',
			]
		);
		$producttype = $this->paginate($type);
		$this->set('producttype',$producttype);
		$productnew = $this->Products->find("all")
		->limit('6')
		->where(['products.new >=' => 1 ]);
		$this->set(compact('productnew','comments'));
	}
	public function comment()
	{
		$c = TableRegistry::get('comments');
		$query = $c->find('all')
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
		$comment['product_id'] = $id;
		$comment['comment'] = $data['comment'];
		$comment['email'] = $email;
		$c->save($comment);
		$this->redirect($this->referer());
	}

	public function deleteComment($id)
	{	
		$c = TableRegistry::get('comments');
		$comment = $c->get($id);
		if ($c->delete($comment)) {
			$this->Flash->success(__('Bình luận id: {0} đã được xóa.', h($id)));
			return $this->redirect($this->referer());
		} 
	}

	public function addProduct()
	{   
		$this->readtypeproduct();
		$product = $this->Products->newEntity();
		$this->Products->patchEntity($product,$this->request->data);
		if($this->request->is('post')) {
			$data = $this->request->data();           
			$name=$data['image'];
			$dir = WWW_ROOT .'img\uploads\ '. $name['name'] ;
			$a = move_uploaded_file($data['image']['tmp_name'], $dir);
			$product['image'] = '/webroot/img/uploads/'.$name['name'];
			if ($this->Products->save($product)) 
			{       
				$this->Flash->success(__('Sản Phẩm đã được thêm.'));
				return $this->redirect(URL_INDEX);
			} else {
				$this->Flash->error(__('Sản phẩm chưa được lưu. Thử lại.'));
			}   
		}
		$this->set('product',$product);
	}
	public function editProduct($id)
	{   
		$this->readtypeproduct();
		$product = $this->Products->get($id);
		$get = $this->Products->find("all")
		->select(['c.name'])
		->hydrate(false)
		->join([
			'table' => 'typeProducts',
			'alias' => 'c',
			'type' => 'LEFT',
			'conditions' => array(
				'c.id = products.id_type',
			)     
		])
		->where(['products.id_type =' => $product->id_type ])
		->toArray();
		$getname = $get['0']['c']['name'];
		$image = $product->image;
		if ($this->request->is(['post', 'put']))
		{
			$data = $this->request->data();
			$this->Products->patchEntity($product, $this->request->data);
			$name=$data['image'];
			if ($name['error'] == 0) {
				$dir = WWW_ROOT .'img\uploads\ '. $name['name'] ;
				$a = move_uploaded_file($data['image']['tmp_name'], $dir);
				$product['image'] = '/img/uploads/'.$name['name'];
			}else { 
				$product['image'] = $image;
				pr( $product['image']);
			}
			if ($this->Products->save($product)) {
				$this->Flash->success(__('Thông tin của sản phẩm đã được cập nhật.')); 
				return $this-> redirect($this->referer());
			}
			$this->Flash->error(__('Không thể cập nhập thông tin cho sản phẩm. Thử lại .'));
		}
		$this->set(compact('product', 'getname'));    
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
		$product = $this->Products->get($id);
		if ($this->Products->delete($product)) {
			$this->Flash->success(__('Sản phẩm có id: {0} đã được xóa.', h($id)));
			return $this->redirect(URL_INDEX);
		}       
	}
}
?>

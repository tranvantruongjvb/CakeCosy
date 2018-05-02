<style type="text/css">
.error{
	display: inline-block;
	max-width: 100%;
	margin-bottom: 5px;
	color: red;
}
</style>
<div class="hiden">
	<?php $read = $this->request->session()->read('cart'); ?>
	<?php $check = $this->request->session()->check('cart') ?>
	<?php $readpayment1 = $this->request->session()->read('payment.total'); ?>
	<?php $checkpayment1 = $this->request->session()->check('payment.total') ?>
	<?php $readpayment2 = $this->request->session()->read('payment.total2'); ?>
	<?php $checkpayment2 = $this->request->session()->check('payment.total2') ?>
</div>
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đặt hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<?= $this->Html->link('Trang Chủ', ['controller' =>'products' ,'action' => 'index']) ?>/ <span>Checkout</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content">
		<form action="postCheckout" method="post" class="beta-form-checkout" id="myForm">
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin khách hàng</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-block">
						<label for="your_first_name">Họ tên*</label>
						<input type="text" id="full_name" name="full_name"  placeholder="Nhập họ và tên">
					</div>
					<div class="form-block">
						<label for="adress">Địa chỉ nhận hàng*</label>
						<input type="text" id="address" name="address" placeholder="Nhập địa chỉ nhận hàng" >
					</div>
					<div class="form-block">
						<label for="email">Địa chỉ email*</label>
						<input type="email" name="email" placeholder="example@gmail.com">
					</div>
					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" name="phone" placeholder="Nhập số điện thoại người nhận">
					</div>
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea name="notes" placeholder="Ghi chú thêm"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body ">
							<div class="your-order-item ">
								<div >
									<?php if ($check) { ?>
									<?php foreach($read as $cart): ?>
										<div class="media getkey1">
											<img width="35%" src="<?php echo '/cakecosy/'.$cart['image']?>" class="pull-left" style=" width: 100px;height: 100px;">
											<div class="media-body">
												<?php $total = $cart['quantity'] *  $cart['price'] ?>
												<p class="font-large"><?php print_r($cart['name'])?></p>
												<p type="text" class="hidden" id="getid"><?php echo $cart['id']?></p>
												<span class="color-black your-order-info">Số lượng:<input type="number" name="" class="getquan" style="color: black;" value="<?php echo $cart['quantity']?>" min='1' max='1000'> </span>
												<span class="color-black your-order-info" >Đơn giá: <p class="getprice"><?php echo $cart['price']?></p></span>
												<p type="text"  class="total123"> <?php echo  $cart['price'] * $cart['quantity']?></p>
											</div>
										</div>
									<?php endforeach; ?>
									<?php }elseif(!$check) {
										echo "Bạn chưa chọn mua sản phẩm";
									} ?>	
								</div>
								<div class="clearfix"></div>
								<div class="pull-left"><p class="your-order-f18">Tổng tiền: </p></div>
								<?php if ($checkpayment2 ) { ?>
								<p type="text" class="t" style="font-size: 20px;color: #FF0000"> <?php echo $readpayment2; ?> </p>
								<?php  } else { ?>
								<p type="text" class="t" style="font-size: 20px;color: #FF0000"> <?php echo $readpayment1; ?> </p>
								<?php } ?>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán trực tiếp</label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Giao hàng đến nhà rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>
								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản</label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chủ tài khoản: Tran Van Truong
										<br>STK: 0978172195
										<br>..............
									</div>						
								</li>
							</ul>
						</div>
						<div class="text-center">
							<button type="submit" class="beta-btn primary">Thanh Toán<i class="fa fa-chevron-right"></i>
							</button>
						</div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#myForm").validate(
		{
			rules: {
				full_name: "required",
				address: "required",
				phone: "required",
				email : "required", 
			},
			messages: {
				full_name: "Nhập họ và tên của bạn để nhận sản phẩm",
				address: "Nhập địa chỉ bạn có thể nhận hàng	",
				phone :"Số điện thoại của bạn để có thể liên lạc",
				email : "Địa chỉ email của bạn ",
			}
		}); 
	});   
	$(document).on('click', '.getquan', function () {
		var a = $(this).val();
		var b = $(this).parent().parent().find('.getprice').text();
		var id = $(this).parent().parent().find('#getid').text();
		var c = $(this).parent().parent().find('.total123').empty();
		c = $(this).parent().parent().find('.total123').append(a*b);
		$.ajax({
			type : 'post', 
			url : '\\cakecosy/updatequantity', 
			data : {sl :a,
				id: id,
			}, 
			success : function(data)  
			{ 
			}
		});
	});
	$(document).on('click', '.getkey1', function () {
		var re=$('.total123');
		var s = parseFloat(0);
		for (i=0;i<re.length;i++) {
			if($(re[i]).text() == null)
				$(re[i]).text() = 0;
			s= s+ parseFloat($(re[i]).text());
		};
		var result= $(this).parent().parent().parent().find('.t').empty();
		result= $(this).parent().parent().parent().find('.t').append(s);});
	</script>


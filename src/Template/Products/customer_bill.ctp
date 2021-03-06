<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Tìm kiếm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy <?php echo count($billcustomer) ?> Đơn hàng</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							<nav class="navbar navbar-default navbar-expand-lg navbar-light nav-item dropdown">
								<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
									<ul class="nav navbar-nav" style="width: 100%">
										<li class="nav-item active" style="width: 13%">Tên</li>
										<li class="nav-item active" style="width: 17%">Địa chỉ email</a></li>
										<li class="nav-item active" style="width: 15%">Số điện thoại</li>
										<li class="nav-item active" style="width: 27%">Địa chỉ người Nhận</li>
										<li class="nav-item active" style="width: 10%">Ngày mua</li>
										<li class="nav-item active" style="width: 10%">Trạng thái đơn hàng</li>
										<li class="nav-item active" style="width: 10%">Chi tiết</li>
									</ul>
								</div>
								<div class="space20">&nbsp;</div>
								<?php foreach($billcustomer as $cus): ?>
									<div id="navbarCollapse" class=" collapse navbar-collapse justify-content-start" style=" width: 100%; border: 1px solid #ff8d00;">
										<ul class="nav navbar-nav" style="width: 100%">
											<li class="nav-item active" style="width: 13%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['name'] ?></a></li>
											<li class="nav-item active" style="width: 17%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['email'] ?></a></li>
											<li class="nav-item active" style="width: 15%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['phone_number']?></a></li>
											<li class="nav-item active" style="width: 27%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['address'] ?></a></li>
											<li class="nav-item active" style="width: 10%;padding-top: 15px;padding-bottom: 10px;"><?php echo $cus['created_at'] ?></a></li>
											<li class="nav-item active" style=" width: 8%;"><?php echo $cus->status ?></li>
											<li class="nav-item active" style=" width: 10%;"><a href="\cakecosy/billDetail/<?php echo $cus['id'] ?>">Chi tiết</a></li>
										</ul>
									</div>
									<div  class="navbar-collapse justify-content-start visible-xs">
										<ul class="nav navbar-nav" style="width: 100%; text-align: left;padding-left: 20px;">
											<li class="nav-item active" style="width: 90%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['name'] ?></a></li>
											<li class="nav-item active" style="width: 90%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['email'] ?></a></li>
											<li class="nav-item active" style="width: 90%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['phone_number']?></a></li>
											<li class="nav-item active" style="width: 90%;padding-top: 15px;padding-bottom: 15px;"><?php echo $cus['address'] ?></a></li>
											<li class="nav-item active" style="width: 90%;padding-top: 15px;padding-bottom: 10px;"><?php echo $cus['created_at'] ?></a></li>
											<li class="nav-item active" style=" width: 9090%;"><?php echo $cus->status ?></li>
											<li class="nav-item active" style=" width: 90%; text-align: center;"><a href="\cakecosy/billDetail/<?php echo $cus['id'] ?>">Chi tiết</a></li>
										</ul>
									</div>
									<div class="space50">&nbsp;</div>
								<?php endforeach;?>
							</nav>	
						</div>
					</div> <!-- .beta-products-list -->
					<div class="space50">&nbsp;</div>
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> 
</div><!-- #content -->

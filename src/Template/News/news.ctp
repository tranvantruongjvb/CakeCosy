
<?php $permission = $this->request->session()->read('Auth.User')['permission'] ?>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60"></div>
			<div>
				<div class=" col-sm-12">
					<div class="col-sm-3 abcde" >
							<div class="space50">&nbsp;</div>
						<h4 style="color: #f90">Danh Mục bánh</h4>
						<ul class="aside-menu primary-nav">
							<?php foreach ($typeproducts as $type) { ?>
							<li>
								<a href="\cakecosy/typeProduct/<?php echo $type->id ?>"><?php echo $type->name ?></a>
							</li>
							<?php } ?>
						</ul>
						<div class="space60">&nbsp;</div>
						<h4 style="color:#f90">Sản phẩm Theo giá</h4>
						<ul class="aside-menu primary-nav">
							<li><a href="\cakecosy/viewMoreProduct/11">Sản phẩm khuyến mãi</a></li>
							<li><a href="\cakecosy/viewMoreProduct/80000">Bánh dưới 100,000đ</a></li>
							<li><a href="\cakecosy/viewMoreProduct/180000">Bánh từ 100,000đ- 200,000đ</a></li>
							<li><a href="\cakecosy/viewMoreProduct/280000">Bánh từ 200,000d - 300,000đ</a></li>
							<li><a href="\cakecosy/viewMoreProduct/310000">Bánh từ 300,000đ</a></li>
						</ul>
					</div>
					<div class="beta-products-list col-sm-6 ">
						<div class="clearfix"></div>
						<div class="space50">&nbsp;</div>
						<div class="beta-products-details">
							<h4 style="color: #f90; font-size: 22px">Tin tức CakeFood</h4>
							<div class="clearfix"></div>
						</div> 
						<div>
							<?php foreach($news as $new): {?>
								<div class=" col-sm-12">
									<div >
										<h3>
											<a href="\cakecosy/news/detailNews/<?php echo $new->id ?>"><?php echo $new->title ?></a>
										</h3>
										<p>
											<strong><?php echo $new->author ?></strong> viết bài lúc <time><?php echo date_format($new->created_at, 'd/m/Y H:i:s');?></time>
										</p>
									</div>
									<div class="article-content">
										<p class=""><?php echo $new->description ?></p>
										<p>
											<a href="http://www.banhsinhnhatdep.com.vn/2017/09/banh-sinh-nhat-in-anh.html">Đọc tiếp →</a>
										</p>
									</div>
								</div>
								<?php } ?>
								<div class="space30">&nbsp;</div>
								<div class="clearfix"></div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 aside  abcde" style="float: right;padding-top: 50px;">
						<div class="widget">
							<h3 class="widget-title" style="color: #f90">Sản Phẩm Nhiều Người Mua Nhất</h3>
							<div class="widget-body">
								<div class="beta-sales beta-lists">
									<?php foreach($product_sale as $new): ?> 
										<div class="media beta-sales-item">
											<a class="pull-left" href="\cakecosy/detailProduct/<?php echo $new['id']?>"><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px" ></a>
											<div class="media-body">
												<span class="beta-sales"><?php echo $new['name'] ?> </span>
												<br>
												<span class="flash-sale"><?php echo $new['unit_price'] ?> đồng</span>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div> <!-- best sellers widget -->
						<!-- best sellers widget -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 

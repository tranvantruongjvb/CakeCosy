
<?php $permission = $this->request->session()->read('Auth.User')['permission'] ?>
<style type="text/css">
	@media only screen and (max-width: 480px) and (min-width: 320px){
  .abcde{
      display: none;
  }
  @media only screen and (max-width: 480px) and (min-width: 320px){
  .abc{
      display: inline;
  }
}
</style>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60"></div>
			<div>
				<div class=" col-sm-12">
					<div class="beta-products-list col-sm-9 abcde">
						<div class="clearfix"></div>
						<div class="space50">&nbsp;</div>
						<div class="beta-products-details">
							<h4 style="color: #f90; font-size: 22px">Tin tức CakeFood</h4>
							<div class="clearfix"></div>
						</div> 
						<div>
							<?php foreach($news as $new): {?>
								<div class="col-sm-12">
									<div class="col-sm-5 ">
										<div >
											<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img style=" width:180px;border-radius: 10px;height: 180px;" src="<?php echo '/cakecosy/'.$new->image ?>" >
											</a>
										</div>
									</div>
									<div class="col-sm-7 " >
										<h4><a href="" ><?php echo $new->title ?></a></h4>
									</div>
								</div>
								<?php } ?>
								<div class="space50">&nbsp;</div>
								<div class="clearfix"></div>
							<?php endforeach; ?>
						</div>
					</div>
					
					<div class="beta-products-list col-sm-12 visible-xs">
						<div class="clearfix"></div>
						<div class="space50">&nbsp;</div>
						<div class="beta-products-details">
							<h4 style="color: #f90; font-size: 22px">Tin tức CakeFood</h4>
							<div class="clearfix"></div>
						</div> 
						<div>
							<?php foreach($news as $new): {?>
								<div class="col-xs-12">
									<div class="col-xs-4 ">
										<div >
											<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img style=" width:50px;border-radius: 10px;height: 50px;" src="<?php echo '/cakecosy/'.$new->image ?>" >
											</a>
										</div>
									</div>
									<div class="col-xs-8 " >
										<h6><a href="" ><?php echo $new->title ?></a></h6>
									</div>
								</div>
								<?php } ?>
								<div class="space50">&nbsp;</div>
								<div class="clearfix"></div>
							<?php endforeach; ?>
						</div>
					</div>


					<div class="col-xs-3 col-sm-3 aside  abcde" style="float: right;padding-top: 50px;">
						<div class="widget">
							<h3 class="widget-title">Sản Phẩm Nhiều Người Mua Nhất</h3>
							<div class="widget-body">
								<div class="beta-sales beta-lists">
									<?php foreach($product_sale as $new): ?> 
										<div class="media beta-sales-item">
											<a class="pull-left" href="<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px" ></a>
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

 

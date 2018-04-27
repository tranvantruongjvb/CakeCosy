<style type="text/css">
	.ribbon-wrapper {
		float: right;
	}
</style>

<?php $permission = $this->request->session()->read('Auth.User')['permission'] ?>
<div class="container">
	<div class="Collapse">
		 <?php 
        echo $this->element("slide");
   		 ?>
	</div>
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space40"></div>
			<div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
					<div class="beta-products-list">
						<div class="clearfix"></div>
						<div class="space50">&nbsp;</div>
						<div class="beta-products-details">
							<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i></i>  Sản Phẩm Mới</h4>
							<div class="clearfix"></div>
						</div> 
						<div>
							<?php foreach($productnew as $new): {?>
								<div class=" col-sm-3 col-md-3 col-lg-3" >
									<div class="single-item">
										<div class="single-item-header">
											<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" >
											</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo $new->name ?></p>
											<p class="single-item-price" style ="font-size: 16px">
												<?php if( $new->promotion_price ==0 ) { ?>
												<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
												<?php }else { ?>
												<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
												<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
												<?php } ?>
											</p>
										</div>
										<div class="single-item-caption">
											<div class="add-to-cart pull-left">
												<a href="\cakecosy/getAddToCart/<?php echo $new->id ?>">
													<i class="fa fa-shopping-cart"></i>
												</a>
											</div>
											<div class="beta-btn primary" style="width: 158px;">
												<i class="fa fa-phone" style="font-size: 16px;">: 0978172195</i>
											</div>
											<div class="beta-btn primary"><a href="\cakecosy/detailProduct/<?php echo $new->id ?>"> Chi Tiết</a>
											</div>
											<?php  if ($permission == 2 || $permission == 3) {?>
											<div class="beta-btn primary" "><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new->id])  ?></div>
											<div class="clearfix"></div>
											<div class="beta-btn primary ""><?= $this->Form->postLink(
												'Xóa sản phẩm',
												['action' => 'delete', $new->id],
												['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có id # {0}?',$new->id)])
												?>
											</div>
											<?php } ?>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php } ?>
							<?php endforeach; ?>
							<div class="clearfix"></div>
							<div>
								<ul class="pagination">
									<li> <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); //Shows the page numbers?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4 style="color: #f90; font-size: 22px">
						<i class="fa fa-mail-forward"></i>  Sản Phẩm Khuyến Mãi<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewMoreProduct/11" >Xem thêm...</a>
					</h4>
					<div class="space30">&nbsp;</div>
					<?php foreach($promotion_price as $new):?>
						<div class="col-sm-3 col-md-3 col-lg-3 ">
							<div class="single-item">
								<div class="single-item-header">
									<?php if ($new->promotion_price !=0) {?>
									<div class="ribbon-wrapper" >
										<div class="ribbon sale">Sale</div>
									</div>
									<?php } ?>
									<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title"><?php echo $new->name ?></p>
									<p class="single-item-price" style ="font-size: 16px">
										<?php if( $new->promotion_price ==0 ) { ?>
										<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
										<?php }else { ?>
										<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
										<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
										<?php } ?>
									</p>
								</div>
								<div class="single-item-caption">
									<div class="add-to-cart pull-left">
										<a href="\cakecosy/getAddToCart/<?php echo $new->id ?>">
											<i class="fa fa-shopping-cart"></i>
										</a>
									</div>
									<div class="beta-btn primary" style="width: 158px;">
										<i class="fa fa-phone" style="font-size: 16px;">: 0978172195</i>
									</div>
									<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'detailProduct',$new->id])  ?></div>
									<?php  if ($permission == 2 || $permission == 3){?>
									<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new->id])  ?></div>
									<div class="clearfix"></div>
									<div class="beta-btn primary"><?= $this->Form->postLink(
										'Xóa sản phẩm',
										['action' => 'delete', $new->id],
										['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có id # {0}?',$new->id)])
										?></div>
										<?php } ?>
									<div class="clearfix"></div>
									<div class="space50">&nbsp;</div>
								</div>
							</div>
						</div>							
					<?php endforeach; ?>						
				</div>
				<div class="clearfix"></div>
				<div class="beta-products-list">
					<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm Dưới 100,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewMoreProduct/80000">Xem thêm...</a></h4>
					<div class="space30">&nbsp;</div>				
					<?php foreach($price100 as $new): 
					?>
					<div class="col-sm-3 col-md-3 col-lg-3 ">
						<div class="single-item">
							<div class="single-item-header">
								<?php if ($new->promotion_price !=0) {?>
								<div class="ribbon-wrapper" >
									<div class="ribbon sale">Sale</div>
								</div>
								<?php } ?>
								<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
							</div>
							<div class="single-item-body">
								<p class="single-item-title"><?php echo $new->name ?></p>
								<p class="single-item-price" style ="font-size: 16px">
									<?php if( $new->promotion_price ==0 ) { ?>
									<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
									<?php }else { ?>
									<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
									<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
									<?php } ?>
								</p>
							</div>
							<div class="single-item-caption">
								<div class="add-to-cart pull-left">
									<a href="\cakecosy/getAddToCart/<?php echo $new->id ?>">
										<i class="fa fa-shopping-cart"></i>
									</a>
								</div>
								<div class="beta-btn primary" style="width: 156px;">
									<i class="fa fa-phone" style="font-size: 16px;">: 0978172195</i>
								</div>
								<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'detailProduct',$new->id])  ?></div>
								<?php if ($permission == 2 || $permission == 3) {?>
								<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new->id])  ?></div>
								<div class="clearfix"></div>
								<div class="beta-btn primary"><?= $this->Form->postLink(
									'Xóa sản phẩm',
									['action' => 'delete', $new->id],
									['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có id # {0}?',$new->id)])
									?></div>
									<?php } ?>
									<div class="clearfix"></div>
									<div class="space50">&nbsp;</div>
								</div>
							</div>
						</div>							
					<?php endforeach; ?>						
				</div>
				<div class="clearfix"></div>
				<div class="beta-products-list">
					<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm  100,000đ đến 200,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewMoreProduct/120000" >Xem thêm...</a></h4>
					<div class="space30">&nbsp;</div>						
					<?php foreach($price200 as $new): 
					?>
					<div class="col-sm-3 col-md-3 col-lg-3 ">
						<div class="single-item">
							<div class="single-item-header">
								<?php if ($new->promotion_price !=0) {?>
								<div class="ribbon-wrapper" >
									<div class="ribbon sale">Sale</div>
								</div>
								<?php } ?>
								<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
							</div>
							<div class="single-item-body">
								<p class="single-item-title"><?php echo $new->name ?></p>
								<p class="single-item-price" style ="font-size: 16px">
									<?php if( $new->promotion_price ==0 ) { ?>
									<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
									<?php }else { ?>
									<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
									<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
									<?php } ?>
								</p>
							</div>
							<div class="single-item-caption">
								<div class="add-to-cart pull-left">
									<a href="\cakecosy/getAddToCart/<?php echo $new->id ?>">
										<i class="fa fa-shopping-cart"></i></a>
									</div>
									<div class="beta-btn primary" style="width: 156px;">
										<i class="fa fa-phone" style="font-size: 16px;">: 0978172195</i>
									</div>
									<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'detailProduct',$new->id])  ?></div>
									<?php  if ($permission == 2 || $permission == 3) {?>
									<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new->id])  ?></div>
									<div class="clearfix"></div>
									<div class="beta-btn primary"><?= $this->Form->postLink(
										'Xóa sản phẩm',
										['action' => 'delete', $new->id],
										['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có id # {0}?',$new->id)])
										?></div>
										<?php } ?>
										<div class="clearfix"></div>
										<div class="space50">&nbsp;</div>
									</div>
								</div>
							</div>							
						<?php endforeach; ?>						
					</div>
					<div class="clearfix"></div>
					<div class="beta-products-list">
						<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm Giá Từ 200,000đ - 300,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewMoreProduct/220000" >Xem thêm...</a></h4>	
						<div class="space30">&nbsp;</div>						
						<?php foreach($price300 as $new): 
						?>
						<div class="col-sm-3 col-md-3 col-lg-3 ">
							<div class="single-item">
								<div class="single-item-header">
									<?php if ($new->promotion_price !=0) {?>
									<div class="ribbon-wrapper" >
										<div class="ribbon sale">Sale</div>
									</div>
									<?php } ?>
									<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title"><?php echo $new->name ?></p>
									<p class="single-item-price" style ="font-size: 16px">
										<?php if( $new->promotion_price ==0 ) { ?>
										<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
										<?php }else { ?>
										<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
										<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
										<?php } ?>
									</p>
								</div>
								<div class="single-item-caption">
									<div class="add-to-cart pull-left">
										<a href="\cakecosy/getAddToCart/<?php echo $new->id ?>">
											<i class="fa fa-shopping-cart"></i></a>
										</div>
										<div class="beta-btn primary" style="width: 156px;">
											<i class="fa fa-phone" style="font-size: 16px;">: 0978172195</i>
										</div>
										<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'detailProduct',$new->id])  ?></div>
										<?php  if ($permission == 2 || $permission == 3) {?>
										<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new->id])  ?></div>
										<div class="clearfix"></div>
										<div class="beta-btn primary"><?= $this->Form->postLink(
											'Xóa sản phẩm',
											['action' => 'delete', $new->id],
											['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có # {0}?',$new->id)])
											?></div>
											<?php } ?>
										<div class="clearfix"></div>
										<div class="space50">&nbsp;</div>
									</div>
								</div>
							</div>							
						<?php endforeach; ?>						
					</div>
					<div class="clearfix"></div>
					<div class="beta-products-list">	
						<h4 style="color: #f90; font-size: 22px"><i class="fa fa-mail-forward"></i>  Sản Phẩm Giá Trên 300,000đ<a style="font-size: 15px" class="pull-right" href="\cakecosy/viewMoreProduct/300000" >Xem thêm...</a></h4>	
						<div class="space30">&nbsp;</div>
						<?php foreach($price400 as $new): 
						?>
						<div class="col-sm-3 col-md-3 col-lg-3 ">
							<div class="single-item">
								<div class="single-item-header">
									<?php if ($new->promotion_price !=0) {?>
									<div class="ribbon-wrapper" >
										<div class="ribbon sale">Sale</div>
									</div>
									<?php } ?>
									<a href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new->image ?>" ></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title"><?php echo $new->name ?></p>
									<p class="single-item-price" style ="font-size: 16px">
										<?php if( $new->promotion_price ==0 ) { ?>
										<span class="flash-sale"><?php echo $new->unit_price ?>đồng</span>
										<?php }else { ?>
										<span class="flash-del"><?php echo $new->unit_price ?>đồng</span>
										<span class="flash-sale"><?php echo $new->promotion_price ?> đồng</span>
										<?php } ?>
									</p>
								</div>
								<div class="single-item-caption">
									<div class="add-to-cart pull-left">
										<a href="\cakecosy/products/getAddToCart/<?php echo $new->id ?>">
											<i class="fa fa-shopping-cart"></i></a>
										</div>
										<div class="beta-btn primary" style="width: 156px;">
											<i class="fa fa-phone" style="font-size: 16px;">: 0978172195</i>
										</div>
										<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'detailProduct',$new->id])  ?></div>
										<?php  if ($permission == 2 || $permission == 3) {?>
										<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new->id])  ?></div>
										<div class="clearfix"></div>
										<div class="beta-btn primary"><?= $this->Form->postLink(
											'Xóa sản phẩm',
											['action' => 'delete', $new->id],
											['confirm' => __('Bạn có chắc chắn muốn xóa sản phẩm có id # {0}?',$new->id)])
											?></div>
											<?php } ?>
										<div class="clearfix"></div>
										<div class="space50">&nbsp;</div>
									</div>
								</div>
							</div>							
						<?php endforeach; ?>						
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

 

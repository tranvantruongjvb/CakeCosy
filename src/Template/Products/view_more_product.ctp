<style type="text/css">
img{
	border-radius: 5px;
}
</style>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3" >
						<div class="space60">&nbsp;</div>
						<h4>Sản phẩm Theo giá</h4>
						<ul class="aside-menu primary-nav">
							<li><a href="\cakecosy/viewMoreProduct/11">Sản phẩm khuyến mãi</a></li>
							<li><a href="\cakecosy/viewMoreProduct/80000">Bánh dưới 100,000đ</a></li>
							<li><a href="\cakecosy/viewMoreProduct/180000">Bánh từ 100,000đ- 200,000đ</a></li>
							<li><a href="\cakecosy/viewMoreProduct/280000">Bánh từ 200,000d - 300,000đ</a></li>
							<li><a href="\cakecosy/viewMoreProduct/310000">Bánh từ 300,000đ</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<div class="beta-products-list">
							<div class="row"></div>
							<?php foreach($viewmoreproducts as $new): 
							?>
							<div class="col-xs-10 col-sm-6 col-md-4 col-lg-4">
								<div class="single-item">
									<div class="single-item-header">
										<?php if ($new['promotion_price'] !=0) {?>
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										<?php } ?>
										<a href="\cakecosy/detailProduct/<?php print_r($new['id']) ?>"><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px" ></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title"><?php echo $new['name'] ?></p>
										<p class="single-item-price" style ="font-size: 16px">
											<?php if ($new['promotion_price'] == 0) { ?>
											<span class="flash-sale"><?php echo $new["unit_price"] ?>đồng</span>
											<?php } else {?>
											<span class="flash-del"><?php echo $new["unit_price"] ?>đồng</span>
											<span class="flash-sale"><?php echo $new['promotion_price'] ?>đồng</span>
											<?php } ?>
										</p>
									</div>
									<div class="single-item-caption">
										<div class="add-to-cart pull-left">
											<a href="\cakecosy/getAddToCart/<?php print_r($new['id']) ?>">
												<i class="fa fa-shopping-cart"></i>
											</a>
											</div>
											<div class="beta-btn primary">
												<i class="fa fa-phone" style="font-size: 16px;"> Hotline: 0978172195</i>
											</div>
											<div class="beta-btn primary"><?php echo $this->Html->link('Chi tiết',['action'=>'detailProduct',$new['id']])  ?></div>
											<?php  if ($this->request->session()->read('Auth.User')['permission'] >= 2) {?>
											<div class="beta-btn primary"><?php echo $this->Html->link('Chỉnh sửa',['action'=>'editProduct',$new['id']])  ?></div>
											<div class="clearfix"></div>
											<div class="beta-btn primary"><?= $this->Form->postLink(
												'Xóa sản phẩm',
												['action' => 'delete', $new['id']],
												['confirm' => __('Bạn chắc chắn muốn xóa sản phẩm có id # {0}?',$new['id'])])
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
						<div>
							<ul class="pagination">
								<li> <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); //Shows the page numbers?></li>
							</ul>
						</div>
						</div>

					</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> 
</div><!-- #content -->

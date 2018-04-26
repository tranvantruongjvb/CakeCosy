
<?php $readuser = $this->request->session()->read('Auth.User')?>
<style type="text/css">
	@media only screen and (max-width: 480px) and (min-width: 320px){
  .abcde{
      display: none;
  }
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
					<div class="col-sm-3 abcde" >
							<div class="space50">&nbsp;</div>
						<h4>Danh Mục bánh</h4>
						<ul class="aside-menu primary-nav">
							<?php foreach ($typeproducts as $type) { ?>
							<li>
								<a href="\cakecosy/typeProduct/<?php echo $type->id ?>"><?php echo $type->name ?></a>
							</li>
							<?php } ?>
						</ul>
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
					<div class="beta-products-list col-sm-6 ">
						<form action="\cakecosy/news/addNews" method="post">
							<div class="clearfix"></div>
							<div class="space50">&nbsp;</div>
							<div class="beta-products-details">
								<h4 style="color: #f90; font-size: 22px">Viết bài cho CakeFood</h4>
								<div class="clearfix"></div>
							</div> 
							<div>
								<div class=" col-sm-12">
									<div >
										<label>Nhập tiêu đề cho bài viết</label>
										<input type="text" name="title" placeholder="Nhập tiêu đề cho bài viết">
									</div>
									<div >
										<label> Bài được viết bởi </label><p><?php echo $readuser['name'] ?></p>
									</div>
									<div>
										<label>Miêu tả ngắn về bài viết</label>
										<textarea name="description" placeholder="Nội dung của bài viết"></textarea>
									</div>
									<div>
										<label>Nhập nội dung của bài viết</label>
										<textarea name="content" placeholder="Nội dung của bài viết"></textarea>
									</div>

									<div class="form-group">
						                <label>Chọn hình ảnh</label>
						                <input type="file" class="form-control" accept="image/*" name="img_up[]" multiple="true" id="img_up" onchange="preUpImg();">
						            </div>
						            <div class="form-group box-pre-img hidden">
						                <p><strong>Ảnh xem trước</strong></p>
						            </div>
						            <div class="form-group hidden box-progress-bar">
						                <div class="progress">
						                    <div class="progress-bar" role="progressbar"></div>
						                </div>
						            </div>
								</div>
								<div class="pull-right" style="padding-right: 15px;">
									<button class="flash-sale" type="submit" style="background-color: white; border-color: #ff9900; border-radius: 10px; width: 100px; font-size: 18px;">Lưu bài <i class="fa fa-chevron-right"></i></button>
								</div>
								<div class="space60">&nbsp;</div>
								<div class="clearfix"></div>
							</div>
							
						</form>
					</div>	
					<div class="col-xs-3 col-sm-3 aside  abcde" style="float: right;padding-top: 50px;">
						<div class="widget">
							<h3 class="widget-title">Sản Phẩm Nhiều Người Mua Nhất</h3>
							<div class="widget-body">
								<div class="beta-sales beta-lists">
									<?php foreach($product_sale as $new): ?> 
										<div class="media beta-sales-item">
											<a class="pull-left" href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px" ></a>
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

<script type="text/javascript">
	function preUpImg() {
    img_up = $('#img_up').val();
    count_img_up = $('#img_up').get(0).files.length;
    $('.box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
    $('.box-pre-img').removeClass('hidden');

    if (img_up != '')
    {
        $('.box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
        $('.box-pre-img').removeClass('hidden');
        for (i = 0; i <= count_img_up - 1; i++)
        {
            $('.box-pre-img').append('<img src="' + URL.createObjectURL(event.target.files[i]) + '" style="border: 1px solid #ddd; width: 150px; height: 150px; margin-right: 5px; margin-bottom: 5px;"/>');
        }
    } 
    else
    {
        $('.box-pre-img').html('');
        $('.box-pre-img').addClass('hidden');
    }
}
</script> 

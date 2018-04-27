<style type="text/css">
span{
	font-size: 16px; 
	font-family: 'times new roman', times, serif;"
}
ul{
	list-style-type: square;"
}
ul li{
	padding-left: 30px; 
	text-align: justify;
}
</style>
<div class="container">
	<div id="primary" class="content-area col-xs-12 col-md-9">
			<article id="post-6" class="post-6 page type-page status-publish hentry">
				<header class="entry-header">
					<h1 class="entry-title">Giới thiệu</h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<h3>
						<span >
							<strong>
								<em>I. Đôi nét về CakeFood.com.vn</em>
							</strong>
						</span>
					</h3>
					<p style="text-align: justify;">
						<span >
							<strong>
								<em>CakeFood.com.vn</em>
							</strong> chính thức hoạt động từ ngày 18/07/2016. Chúng tôi chuyên cung cấp các loại bánh sinh nhật, bánh kỷ niệm, bánh cưới, bánh sự kiện công ty.
						</span>
					</p>
					<p style="text-align: justify;">
						<span>Thương hiệu 
							<strong>
								<em>CakeFood.com.</em>
							</strong>
							<strong>
								<em>.vn</em>
							</strong> được chúng tôi đăng kí và sử dụng từ ngày 18/07/2016. Quý khách hàng lưu ý rằng 
							<strong>
								<em>CakeFood.com.</em>
							</strong>
							<strong>
								<em>vn</em>
							</strong> hiện nay hoạt động độc lập và không có mối liên quan nào đến thương hiệu cùng tên này trong thời gian trước đây.
						</span>
					</p>
					<h3>
						<span>
							<strong>
								<em>II. Chúng tôi có những sản phẩm gì?</em>
							</strong>
						</span>
					</h3>
					<p>
						<span>Hiện tại chúng tôi tập trung cung cấp cho Quý khách hàng các loại sản phẩm sau đây:
						</span>
					</p>
					<ul >
						<li >
							<span>
								<strong>
									<em>Bánh sinh nhật:&nbsp;</em>
								</strong>sinh nhật là ngày không thể quên của mỗi chúng ta
							</span>
						</li>
						<li>
							<span>
								<strong>
									<em>Bánh kỷ niệm</em>
								</strong>:&nbsp;kỷ niệm ngày quen nhau, ngày cưới, đầy tháng….
							</span>
						</li>
						<li >
							<span >
								<strong>
									<em>Bánh sự kiện</em>
								</strong>:&nbsp;Các loại bánh tổ chức đầy tháng, đầy năm, sinh nhật công ty, kỷ niệm thành lập, bánh ngày cưới
							</span>
						</li>
					</ul>
					<p style="text-align: justify;">
						<p>
							<strong>
								<em>III. Nhiên liệu&nbsp;xuất xứ ra sao?</em>
							</strong>
						</span>
					</p>
					<p style="text-align: justify;">
						<span >Chúng tôi cam kết 100% nhiên liệu&nbsp;do chúng tôi cung cấp đều được nhập khẩu&nbsp;và tất cả đều qua kiểm định và có xuất xứ rõ ràng. Chúng tôi nói <strong>
							<em>KHÔNG</em>
						</strong> với tất cả các loại nhiên liệu&nbsp;không rõ nguồn gốc, xuất xứ và chất lượng kém.
					</span>
				</p>
				<h3><span ><strong><em>IV. Chúng tôi cam kết những gì?</em></strong></span></h3>
				<p style="text-align: justify;">
					<span >Sau đây là những cam kết mà
						<strong>
							<em>CakeFood.com.</em>
						</strong>
						<strong>
							<em>vn</em>
						</strong> cố gắng, nỗ lực hết mình để mang lại giá trị quý báu và lợi ích lớn nhất cho mỗi Quý khách hàng của chúng tôi:
					</span>
				</p>
				<ul>
					<li style="text-align: justify;">
						<span >
							<strong>
								<em>Về sản phẩm:</em>
							</strong> Chúng tôi luôn cố gắng làm việc chăm chỉ để đem đến cho Quý khách hàng những sản phẩm đẹp nhất, ngon nhất và tốt nhất.
						</span>
					</li>
					<li >
						<span >
							<strong>
								<em>Về giá cả:</em>
							</strong> Chúng tôi luôn cố gắng tối ưu hóa chi phí và đặt lợi ích của Quý khách hàng lên hàng đầu, chúng tôi luôn cố gắng cung cấp sản phẩm đến tay Quý khách hàng các sản phẩm tốt nhất với giá hợp lý nhất có thể.
						</span>
					</li>
					<li >
						<span >
							<strong>
								<em>Chất lượng dịch vụ, chăm sóc khách hàng</em>
							</strong>: Chúng tôi luôn luôn lắng nghe ý kiến đóng góp của Quý khách hàng, phát triển hệ thống bán hàng, kỹ năng chăm sóc khách hàng của chúng tôi nhằm mang lại tính tiện lợi, thoải mái, dễ chịu khi Quý khách hàng sử dụng sản phẩm và dịch vụ do chúng tôi cung cấp.
						</span>
					</li>
				</ul>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	</div>
	<div class=" col-xs-12 col-sm-3" style="float: right">
		<div class="space20">&nbsp;</div>
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
</div>

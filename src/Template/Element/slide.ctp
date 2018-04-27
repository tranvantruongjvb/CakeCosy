<?= $this->Html->css('slide')?>
<style type="text/css">
img{
    border-radius: 10px;
}
@media screen and (min-width: 1025px){
  .li{
    height: 165px;
    width: 170px;
  }
}
@media only screen and (max-width: 1024px) and (min-width: 769px){
  .li{
        max-width: 95%
      height: 200px;
  }

}
@media only screen and (max-width: 768px) and (min-width: 480px){
  .li{
        max-width: 95%
      height: 236px;
  }

}

</style>
<div class="container">
    <div class="col-sm-12 ">
        <div class="space30">&nbsp;</div>
        <div class="col-sm-4 pull-left ">
            <div class="space50">&nbsp;</div>
            <div class="slideshow-container">
                <?php foreach ($slides as $key) { ?>
                <div class="mySlides fade">
                    <img src="<?php echo '/cakecosy/'.$key->image ?>" style="width:100%; height: 300px;">
                    <p style="text-align: center;"><?php echo $key->description?></p>
                </div>
                <?php } ?>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(0)"></span> 
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(2)"></span> 
            </div> 
        </div>
       <div id="feature-right" class="col-sm-4 abcde" style="padding-top: 40px;">
            <div id="most-read" >
                <p style="color: #fb6108;font-size: 18px;"><span>Sản phẩm nhiều khách hàng chọn</span></p>
                <ul class="col-sm-12">
                    <?php foreach ($product_sale as $key) { ?>
                    <li class="single-item1 col-sm-5 li" >
                        <span>
                             <a href="\cakecosy/detailProduct/<?php echo $key['id'] ?>">
                                 <img style=" width: 100px; height: 100px;" src="<?php echo '/cakecosy/'.$key['image'] ?>" >
                             </a>
                        </span>
                        <div class="space10">&nbsp;</div>
                        <span >
                             <p><?php echo $key['name'] ?></p>
                        </span>
                        
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
            <div class="category-item col-sm-4 " style="padding-top: 40px;" >
                    <div class="row clear-fix1 ">
                            <div class=" col-sm-6 col-xs-6" >
                            <h3 >Danh mục sản phẩm</h3>
                            <ul style="color: #767676; list-style: none;" >
                              <?php foreach ($typeproducts as $type) { ?>
                            <li>
                                <a href="\cakecosy/typeProduct/<?php echo $type->id ?>"><?php echo $type->name ?></a>
                            </li>
                            <?php } ?>
                            </ul>
                            </div>

                            <div class=" col-sm-6 col-xs-6">
                            <h3 >Sản phẩm theo giá</h3>
                            <ul style="color: #767676; list-style: none;"  >
                                <li><a href="\cakecosy/viewMoreProduct/11">Sản phẩm khuyến mãi</a></li>
                                <li><a href="\cakecosy/viewMoreProduct/80000">Bánh dưới 100,000đ</a></li>
                                <li><a href="\cakecosy/viewMoreProduct/180000">Bánh từ 100,000đ- 200,000đ</a></li>
                                <li><a href="\cakecosy/viewMoreProduct/280000">Bánh từ 200,000d - 300,000đ</a></li>
                                <li><a href="\cakecosy/viewMoreProduct/310000">Bánh từ 300,000đ</a></li>
                            </ul>
                            </div>
                    </div>
        </div>  
</div>
<script>
    var slideIndex;
    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex].style.display = "block";  
        dots[slideIndex].className += " active";
//chuyển đến slide tiếp theo
slideIndex++;
//nếu đang ở slide cuối cùng thì chuyển về slide đầu
if (slideIndex > slides.length - 1) {
    slideIndex = 0
}    
//tự động chuyển đổi slide sau 5s
setTimeout(showSlides, 6000);
}
//mặc định hiển thị slide đầu tiên 
showSlides(slideIndex = 0);
function currentSlide(n) {
    showSlides(slideIndex = n);
}
</script>

<?= $this->Html->css('slide')?>
<style type="text/css">
    <style type="text/css">
    .category-item{

}

.category-item h3 {
    color: #f90;
    text-align: left;
    font-size: 16px;
    font-weight: 450;
    background-position: bottom 5px;
    margin-bottom: 10px;
    margin-top: 0;
}

.category-item h3 a{
    text-decoration: none;
}
.category-item li a {
    color: #767676;
    font-size: 14px;
    text-decoration: none;
}
 img{
    border-radius: 10px;
    max-width: 95%;
    max-height: 200px;
}
.category-item li a i{
 color: #f90;
}
   
.category-item .article{
    float: left;
    width: 25%;
    padding: 1px
    border-radius:20px;
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
                    <li class="single-item1 col-sm-6 " style="display: block">
                        <span class="" style="text-align: center;">
                             <a href="\cakecosy/detailProduct/<?php echo $key['id'] ?>">
                                 <img style=" width: 100px; height: 100px;" src="<?php echo '/cakecosy/'.$key['image'] ?>" >
                             </a>
                        </span>
                        <div class="space10">&nbsp;</div>
                        <span style="text-align: center;">
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

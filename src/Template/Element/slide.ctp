<?= $this->Html->css('slide')?>
<div class="container">
    <div class="col-sm-12 ">
        <div class="space40">&nbsp;</div>
        <div class="col-sm-6 pull-left ">
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
       <div id="feature-right" class="col-sm-6 abcde">
            <div id="most-read" >
                <p style="color: #fb6108;font-size: 18px;"><span>Sản phẩm nhiều khách hàng chọn</span></p>
                <ul class="col-sm-12">
                    <?php foreach ($product_sale as $key) { ?>
                    <li class="single-item1 col-sm-4" style="display: inline-block;">
                        <span class="col-md-12" style="text-align: center;">
                             <img style=" width: 100px; height: 100px;" src="<?php echo '/cakecosy/'.$key['image'] ?>" >
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

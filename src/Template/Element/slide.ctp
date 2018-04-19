<div class="container">
  <div class="col-sm-12">
    <div class="space20">&nbsp;</div>
    <div class="col-sm-6 pull-left">
      <div class="slideshow-container">
        <?php foreach ($slides as $key) { ?>
          <div class="mySlides fade">
                <img src="<?php echo '/cakecosy/'.$key->image ?>" style="width:100%; height: 300px;">
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
    <div class="col-sm-6 pull-right " >
      <p>Nội dung khuyến mãi</p>
    </div>
  </div>
</div>

<style>
          {
            box-sizing:border-box
          }
          h2 {
            text-align: center;
          }
         
          .slideshow-container {
            max-width: 500px;
            position: relative;
            margin: auto;
          }
         
          .mySlides {
              display: none;
          }
      
          .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
          }

          .dot {
            cursor:pointer;
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
          }
         
          .active, .dot:hover {
            background-color: #717171;
          }

          .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 3s;
            animation-name: fade;
            animation-duration: 3s;
          }

          @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
          }

          @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
          }
        </style>
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
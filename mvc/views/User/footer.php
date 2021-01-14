<footer>
<div class="footer1">
<a title="<?php echo $data['info'][0]->mota; ?>" href="<?php echo $data['info'][0]->linkweb; ?>" style="background-image:url(<?php echo $data['info'][0]->logo; ?>)"></a>
<ul>
<li><a href="#">Bản quyền và trách nhiệm nội dung</a></li>
<li><a href="#">Nguyên tắc Cộng Đồng</a></li>
<li><a href="#">Liên hệ Quảng Cáo</a></li>
</ul>
<div>Copyright ©2021 BomTanHD.net. Created & Design by <a href="//facebook.com" style="color:orange">LTWNC Team</a>.</div>
</div>
</footer>
<!-- Swiper JS -->
  <script src="https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Bongngotv_config/swipermin.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('#abcde', {
      spaceBetween: 20,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '#abcde .swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '#abcde .swiper-button-next',
        prevEl: '#abcde .swiper-button-prev',
      },
    });
  </script>
  <script>
    if(window.innerWidth>=992){
    var swiper = new Swiper('#hieuab', {
      slidesPerView: 5,
      spaceBetween: 30,
      slidesPerGroup: 1,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuab .swiper-button-next',
        prevEl: '#hieuab .swiper-button-prev',
      },
    });
    }
    if(window.innerWidth<=991 && window.innerWidth>=654){
    var swiper = new Swiper('#hieuab', {
      slidesPerView: 4,
      spaceBetween: 30,
      slidesPerGroup: 1,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuab .swiper-button-next',
        prevEl: '#hieuab .swiper-button-prev',
      },
    });
    }
    if(window.innerWidth<=653 && window.innerWidth>=500){
    var swiper = new Swiper('#hieuab', {
      slidesPerView: 3,
      spaceBetween: 20,
      slidesPerGroup: 1,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuab .swiper-button-next',
        prevEl: '#hieuab .swiper-button-prev',
      },
    });
    }
    if(window.innerWidth<=499){
    var swiper = new Swiper('#hieuab', {
      slidesPerView: 2,
      spaceBetween: 25,
      slidesPerGroup: 1,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuab .swiper-button-next',
        prevEl: '#hieuab .swiper-button-prev',
      },
    });
    }
  </script>

<script>
    if(window.innerWidth>=992){
    var swiper = new Swiper('#hieuabb', {
      slidesPerView: 5,
      spaceBetween: 30,
      slidesPerGroup: 5,
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuabb .swiper-button-next',
        prevEl: '#hieuabb .swiper-button-prev',
      },
    });
    }
    if(window.innerWidth<=991 && window.innerWidth>=654){
    var swiper = new Swiper('#hieuabb', {
      slidesPerView: 4,
      spaceBetween: 30,
      slidesPerGroup: 4,
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuabb .swiper-button-next',
        prevEl: '#hieuabb .swiper-button-prev',
      },
    });
    }
    if(window.innerWidth<=653 && window.innerWidth>=500){
    var swiper = new Swiper('#hieuabb', {
      slidesPerView: 3,
      spaceBetween: 20,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuabb .swiper-button-next',
        prevEl: '#hieuabb .swiper-button-prev',
      },
    });
    }
    if(window.innerWidth<=499){
    var swiper = new Swiper('#hieuabb', {
      slidesPerView: 2,
      spaceBetween: 25,
      slidesPerGroup: 2,
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: '#hieuabb .swiper-button-next',
        prevEl: '#hieuabb .swiper-button-prev',
      },
    });
    }
  </script>
</div></div>
<?php
  $conn=null;
?>
<!-- menu dropdow-->
<script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
<script>

  function openCity(evt, link) {
  var i, tablinks;
  
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  
  evt.currentTarget.className += " active";
    document.getElementById('myVideo').src=link;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script> 

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="<?php echo $data['info'][0]->linkweb.'/public/js/'.$data['js_name'].'.js'; ?>"></script>



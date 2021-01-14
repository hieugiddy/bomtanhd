<div class="slider top-slider slick-initialized slick-slider slick-dotted" role="toolbar">
 <!-- Swiper -->
  <div class="swiper-container" id="abcde">
    <div class="swiper-wrapper" id="slide-item">
       <!-- Slide item -->
        <script>
          showSlide(<?php echo $data['slide'];?>,"slide-item",'<?php echo $data['info'][0]->linkweb; ?>');
        </script> 
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</div>


<!-- Phim lẻ -->
<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2><a title="Phim lẻ mới" href="<?php echo $data['info'][0]->linkweb; ?>/Phim/PhimLe/1">Phim lẻ mới<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
<a href="<?php echo $data['info'][0]->linkweb; ?>/Phim/PhimLe/1" class="more" style="font-size:27px"><i class="fa fa-plus-square"></i></a> <span class="line-ngang"></span>
<div class="group-film-small" id="p-phimle">
<script>
  showPhim(<?php echo $data['phimle'];?>,"p-phimle",'<?php echo $data['info'][0]->linkweb; ?>');
</script>
</div>
</div>

<!-- Phim bộ -->
<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2><a title="Phim bộ mới" href="<?php echo $data['info'][0]->linkweb; ?>/Phim/PhimBo/1">Phim bộ mới<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
<a href="<?php echo $data['info'][0]->linkweb; ?>/Phim/PhimBo/1" class="more" style="font-size:27px"><i class="fa fa-plus-square"></i></a> <span class="line-ngang"></span>
<div class="group-film-small" id="p-phimbo">
<script>
  showPhim(<?php echo $data['phimbo'];?>,"p-phimbo",'<?php echo $data['info'][0]->linkweb; ?>');
</script>
</div>
</div>


<!-- Phim Việt Nam -->
<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2><a title="Phim Việt Nam" href="<?php echo $data['info'][0]->linkweb; ?>/QuocGia/DanhSach/viet-nam/1">Phim Việt Nam<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
<a href="<?php echo $data['info'][0]->linkweb; ?>/QuocGia/DanhSach/viet-nam/1" class="more" style="font-size:27px"><i class="fa fa-plus-square"></i></a> <span class="line-ngang"></span>
<div class="group-film-small" id="p-phimvietnam">
<script>
  showPhim(<?php echo $data['phimvietnam'];?>,"p-phimvietnam",'<?php echo $data['info'][0]->linkweb; ?>');
</script>
</div>
</div>
  
<div class="quangcao">
</div>
</div>
<div class="slider top-slider slick-initialized slick-slider slick-dotted" role="toolbar">
 <!-- Swiper -->
  <div class="swiper-container" id="abcde">
    <div class="swiper-wrapper">
      $lists : { e | 
      $if (e.DownloadUrl)$
      <div class="swiper-slide"><a class="lazy" href="$e.Url$" title="$e.Title$" tabindex="-1"><img src="$e.DownloadUrl$" alt="" style="object-fit: cover;background-repeat:no-repeat;width: 100%;height: 100%;"/></a></div>

      $endif$
      
    }$
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</div>
</div>

$categories : { c | 
<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2><a title="$c.Title$" href="$c.Url$">$c.Title$<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
<a href="$c.Url$" class="more" style="font-size:27px"><i class="fa fa-plus-square"></i></a> <span class="line-ngang"></span>
<div class="group-film-small">
$c.Entries : { e |
<a title="$e.Title$" href="$e.Url$" class="film-small lazy"> 
	<div class="poster-film-small " style="background-image:url(&#39;$e.LargeThumb$&#39;)"> 
		<ul class="tag-film"> 
			<li><div class="hd">HD</div></li> 
		</ul> 
		<div class="play"></div> </div> 
		<div class="title-film-small"> <b class="title-film" id="tenphim">$e.Title$</b> <p>$e.Description$</p> 
	</div> 
</a>
 }$
</div>
</div>

}$

  
<div class="quangcao">
</div>

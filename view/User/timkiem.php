
<style>
.phantrang{
  width:99%;
  margin:20px auto
}
  .phantrang span, .phantrang a{
   padding: 7px 10px;
    border-radius:4px
  }
  .phantrang span{
   background:#eee;
    border:1px solid #999; 
  }
  .phantrang a{
    background:#333;
    border:1px solid #222; 
    color:#fff
  }
  .phantrang a:hover{
     background:#eee;
    color:#000
  }
 #tenphim b{display:none !important}
</style>


<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2>Có $count$ kết quả tìm kiếm cho "<strong>$term$</strong>" trong $time$ giây</h2>
<span class="line-ngang"></span>
<div class="group-film-small">

<a title="$e.Title$" href="$e.Url$" class="film-small lazy"> 
  <div class="poster-film-small " style="background-image:url(&#39;$e.Image$&#39;)"> 
    <ul class="tag-film"> 
      <li><div class="hd">HD</div></li> 
    </ul> 
    <div class="play"></div> </div> 
    <div class="title-film-small"> <b class="title-film" id="tenphim">$e.Title$</b> <p>$e.Date$</p> 
  </div> 
</a>
  
  
</div>
</div>
<div class="phantrang"><center>$paging$</center></div>


  
</div>

<div class="quangcao">
</div>

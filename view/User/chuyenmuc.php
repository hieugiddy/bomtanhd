
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
</style>


</div>

<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2>$category.Title$</h2>
<a href="$category.Url$" class="more" style="font-size:27px"><i class="fa fa-plus-square"></i></a> <span class="line-ngang"></span>
<div class="group-film-small">
$lists : { e | 
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
<div class="phantrang"><center>$category.Paging$</center></div>


<div class="quangcao">
</div>



			
					



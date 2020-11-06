<?php
include('./Theme/baiviet/thongtinsanpham.php');
?>

<?php

//tính lượt truy cập
$luotxembv=$conn->prepare('select soluong from chitietsanpham where maSP="'.$_GET['id'].'"');
$luotxembv->execute();
$lx_c=$luotxembv->fetchcolumn();
$lx_n=(int)($lx_c+1);

$tanglx=$conn->prepare('update chitietsanpham set soluong='.$lx_n.' where maSP="'.$_GET['id'].'"');
$tanglx->execute();
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  @media(min-width: 993px){iframe{height:450px;}}
  @media(max-width: 992px){iframe{height:320px;}}
  @media(max-width:640px){.thongtinbv .post-headline{margin: -35px -10px 0 -17px !important;    position: relative;
    top: -15px;} .haha{margin: 0 -10px !important;}}
  .thongtinbv .post-headline{margin-top: -20px !important;}
  #binhluan iframe{
    height:100% !important; 
    width:1100px !important;
    max-width:100%;             
  }
  
  #like iframe {
    height 200px !important                                                                                                                         
  }
  #data-phim,.resize_video{display:none !important}
  card-body a,.card-body a,#dsserver a{
  padding:5px 7px;
  font-size:14px;
  color:#fff !important;
  background:green;
  margin:5px 3px
  }
  .card-body a.active,#dsserver a.active{
   background:orange 
  }
  .xem .card-header,.tai card-header{
   color:#fff !important;
   font-weight:700;
   margin:25px 5px 15px 5px;
   font-size:20px !important
  }
  .xem .card-header:before{
   content: "\f26c";
    font-family: FontAwesome;
    color: #fff;
    margin-right: 5px;
    font-style: normal;
    display: inline-block;
    width: 15px;
    margin-right:20px
  }
  
</style>
<script>
	function getPhimLe(json) {
      var overview = json.overview;
      var trangthai='',theloai='',quocgia='',congty='';
      if(json.status=='Released') trangthai='Đã phát hành';
      else trangthai='Chưa phát hành';
      for(var i=0;i<json.genres.length;++i){
      	theloai+=json.genres[i].name+', ';
      }
      if(json.production_countries.length==0)
      	quocgia='Đang cập nhật';
      else
	      for(var i=0;i<json.production_countries.length;++i){
	      	quocgia+=json.production_countries[i].name+', ';
	      }
	  if(json.production_companies.length==0)
      	congty='Đang cập nhật';
      else
	      for(var i=0;i<json.production_companies.length;++i){
	      	congty+=json.production_companies[i].name+', ';
	      }
      var item='<p id="tmbd">'+json.vote_average+'</p><p id="v_tmbd">'+json.vote_count+'</p><div id="content-gioithieu">'+overview+'</div><div class="tttt"><p><strong>Trạng thái:</strong> &nbsp;'+trangthai+'</p><p><strong>Ngày phát hành:</strong> &nbsp;'+json.release_date+'</p><p><strong>Thể loại:</strong> &nbsp;'+theloai+'</p><p><strong>Quốc Gia:</strong> &nbsp;'+quocgia+'</p><p><strong>Công ty SX:</strong> &nbsp;'+congty+'</p><p><strong>Thời lượng:</strong> &nbsp;'+json.runtime+' phút</p><p><strong>Tagline:</strong> &nbsp;'+json.tagline+'</p></div>';
      document.write(item);
    }
  function getPhimBo(json) {
      var overview = json.overview;
      var theloai='',quocgia='',congty='',netw='',created_by='',runtime='';
      for(var i=0;i<json.genres.length;++i){
      	theloai+=json.genres[i].name+', ';
      }
      if(json.created_by.length==0)
      	created_by='Đang cập nhật';
      else
	      for(var i=0;i<json.created_by.length;++i){
	      	created_by+=json.created_by[i].name+', ';
	      }
      if(json.origin_country.length==0)
      	quocgia='Đang cập nhật';
      else
	      for(var i=0;i<json.origin_country.length;++i){
	      	quocgia+=json.origin_country[i]+', ';
	      }
	   if(json.production_companies.length==0)
      	congty='Đang cập nhật';
      else
	      for(var i=0;i<json.production_companies.length;++i){
	      	congty+=json.production_companies[i].name+', ';
	      }
	  if(json.networks.length==0)
      	netw='Đang cập nhật';
      else
	      for(var i=0;i<json.networks.length;++i){
	      	netw+=json.networks[i].name+', ';
	      }
	   if(json.seasons.length==0)
      	runtime='Đang cập nhật';
      else
	      for(var i=0;i<json.seasons.length;++i){
	      	runtime+=json.seasons[i].name+'('+json.seasons[i].episode_count+' tập), ';
	      }
      var item='<p id="tmbd">'+json.vote_average+'</p><p id="v_tmbd">'+json.vote_count+'</p><div id="content-gioithieu">'+overview+'</div><div class="tttt"><p><strong>Trạng thái:</strong> &nbsp;'+json.status+'</p><p><strong>Ngày phát hành:</strong> &nbsp;'+json.first_air_date+'</p><p><strong>Cập nhật lần cuối:</strong> &nbsp;'+json.last_air_date+'</p><p><strong>Thể loại:</strong> &nbsp;'+theloai+'</p><p><strong>Quốc Gia:</strong> &nbsp;'+quocgia+'</p><p><strong>Công ty SX:</strong> &nbsp;'+congty+'</p><p><strong>Network:</strong> &nbsp;'+netw+'</p><p><strong>Thời lượng:</strong> &nbsp;'+runtime+'</p><p><strong>Tên Gốc:</strong> &nbsp;'+json.original_name+'</p><p><strong>Created by:</strong> &nbsp;'+created_by+'</p></div>';
      document.write(item);
    }
  function getDienVien(json) {
    var hinhdv;
    if(json.profile_path!=null) hinhdv='https://image.tmdb.org/t/p/w500/'+json.profile_path; else hinhdv='https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Bongngotv_config/no_picture_available.png';
    var item='<div class="swiper-slide dvc"><div class="item slick-slide slick-cloned" style="width: 192px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="-5" aria-hidden="true"><a target="_blank" title="'+json.biography+'" href="https://www.themoviedb.org/person/'+json.id+'" style="background-image:url('+hinhdv+')" tabindex="-1"> <div class="black-gradient"> <b class="title-film">'+json.name+'</b> <p>'+json.biography+'</p> </div> </a></div></div>';
      document.write(item);
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
    document.getElementById('myVideo').src="https://tailen.ml/bomtanhd/getphim.php?link="+link;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<div class="group-detail" itemscope="" itemtype="https://schema.org/Movie">
<div style="display: none">
<div itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating"> <span itemprop="ratingValue">5</span>
<meta itemprop="bestRating" content="5">
<meta itemprop="worstRating" content="1"> <span itemprop="ratingCount">69</span> </div> <img itemprop="image" src="$entry.Image$" alt="$entry.Title$"> <img itemprop="thumbnailUrl" src="$entry.DownloadUrl$" alt="$entry.Title$">
<meta itemprop="name" content="$entry.Title$"> </div>
<div id="video-player">
<a href="javascript:void(0)" class="big-img-film-detail" onclick="trailer()" style="background: url($entry.Image$); background-repeat:no-repeat; background-size:contain; background-position:center;">
<div><i class="fa fa-play-circle" aria-hidden="true"></i></div>
</a>
</div>
  <div id="contentmain">
<div id="dsserver" style="display:none;margin:15px 0 50px 0">
  Danh sách tập phim
</div>
  </div>
<h1 class="title-film-detail-1" itemprop="name">$entry.Title$</h1>
<h2 class="title-film-detail-2">$entry.Description$</h2>
<div class="fb-gg">
<div id="like">                                   
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=476759459479922&autoLogAppEvents=1"></script>
    <div class="fb-like" data-href="$entry.Url$" data-width="100px" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>               
  </div>
</div>
<div class="imdb">IMDB N/A</div>
<ul class="rated-star"><i id="star" style="white-space: nowrap; cursor: pointer;"><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 2px;"><defs><linearGradient id="star_grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="100%" stop-color="#77C282"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad1);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 2px;"><defs><linearGradient id="star_grad2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="100%" stop-color="rgba(119,194,130,1)"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad2);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 2px;"><defs><linearGradient id="star_grad3" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="100%" stop-color="rgba(119,194,130,1)"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad3);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 2px;"><defs><linearGradient id="star_grad4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="100%" stop-color="rgba(119,194,130,1)"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad4);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 2px;"><defs><linearGradient id="star_grad5" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="30%" stop-color="rgba(119,194,130,1)"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad5);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star_grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad1);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star_grad2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad2);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star_grad3" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad3);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star_grad4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad4);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star_grad5" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star_grad5);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg></i></ul> <span class="rated-text">(1991 Voted)</span> <span class="hd">HD</span>
<br> <a href="javascript:void(0)" title="$entry.Title$" onclick="xemphim(this)" class="play-film" style="background:#77c282;color:#fff;font-weight: bold;">Xem Phim<i class="fa fa-caret-right" aria-hidden="true"></i></a>
  <a href="javascript:void(0)" title="$entry.Title$" class="play-film" style="background:#911;color:#fff;font-weight: bold;" onclick="taiphim()" class="w3-button w3-black">Tải Phim<i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>
<p class="custom-error" style="display:none;"></p>
<ul class="infomation-film">
<li class="title">Thông tin:</li>
<li id="tthongtin">Chưa có thông tin về phim này</li>
<li class="tags"><span>TAGS: </span> $tags: { t |<a href="/tags?q=$t$">$t$</a>,}$ </li>
</ul>
</div>


<div class="group-vote-detail">
<h2>Xếp Hạng Phim Này</h2>
<ul>
  
<li class="star" id="star-vote" style="white-space: nowrap; cursor: pointer;"><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad1);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad2);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad3" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad3);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad4);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad5" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad5);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad1);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad2);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad3" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad3);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad4);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad5" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad5);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg></li>
</ul>
</div>
$if(entry.DownloadUrl)$
<div class="group-film group-film-category" id="cat-phim-sap-chieu" data-page="1" data-slug="" style="margin-top:0">
<div class="phimdecu-slider slick-initialized slick-slider">

<div aria-live="polite" class="slick-list draggable">
<div class="swiper-container" id="hieuabb">
    <div class="swiper-wrapper" id="dienvien">
      
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  
</div>
  </div>
</div>
$endif$
<div class="group-ndfilm-detail" itemprop="description">
<h2 class="ndf">Nội dung phim</h2>
<p class="content-film">
  
Tổng hợp hay, phim chiếu rạp mới nhất, mọt phim Trung - Hàn, Doctor Who, Trò Chơi Vương Quyền, Phim chiếu rạp Việt Nam cập nhật lên tục - hằng ngày.
</p>
</div>
<div class="fbchat" style="background:#fff;padding:10px 7px;">
 <div id="binhluan">
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=476759459479922&autoLogAppEvents=1" nonce="8ywAJqG6"></script>
  <div class="fb-comments" data-href="$entry.Url$" data-numposts="10" data-width="900"></div>
</div>
  
</div>

<div class="group-film group-film-category" id="cat-phim-sap-chieu" data-page="1" data-slug="">
<h2><a title="Phim Đang Chiếu Rạp" href="javascript:void(0)">Phim Liên Quan<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
<span class="line-ngang"></span>
<div class="phimdecu-slider slick-initialized slick-slider">

<div aria-live="polite" class="slick-list draggable">
<div class="swiper-container" id="hieuab">
    <div class="swiper-wrapper">
      $relates : { e |
    	<div class="swiper-slide">
      	<div class="item slick-slide slick-cloned" style="width: 192px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="-5" aria-hidden="true">
      		<a title="$e.Title$" href="$e.Url$" style="background-image:url($e.Image$)" tabindex="-1"> <div class="black-gradient"> <b class="title-film">$e.Title$</b> <p>$e.Description$</p> <ul class="tag-film"> <li><div class="hd">HD</div></li> </ul> </div> <div class="play"></div> </a>
      </div>
  	</div>
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
</div>

<div class="group-tag-detail" style="color:#fff">
	<a class="label-name" href="/new-serie"><span class="label-title">Doctor Who</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-le"><span class="label-title">Phim Chiếu Rạp</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-bo"><span class="label-title">Phim Bộ Hot</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-khac"><span class="label-title">Phim Việt Nam</span></a>,
  &nbsp;&nbsp;<a class="label-name" href="/search?q=Harry+Potter"><span class="label-title">Harry Poster</span></a>,
  &nbsp;&nbsp;<a class="label-name" href="/search?q=chúa+tể+những+chiếc+nhẫn"><span class="label-title">Chúa tể những chiếc nhẫn</span></a>,
  &nbsp;&nbsp;<a class="label-name" href="/search?q=vuot+nguc"><span class="label-title">Vượt Ngục</span></a>,
  &nbsp;&nbsp;<a class="label-name" href="/qua-nhanh-qua-nguy-hiem"><span class="label-title">Quá Nhanh Quá Nguy Hiểm</span></a>,
  &nbsp;&nbsp;<a class="label-name" href="/search?q=Friday+13th"><span class="label-title">Friday The 13th</span></a>,
  &nbsp;&nbsp;<a class="label-name" href="/search?q=star"><span class="label-title">Chiến Tranh Giữa Các Vì Sao</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phieu-luu"><span class="label-title">Phiêu Lưu</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/classic-serie"><span class="label-title">Classic Serie</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tap-ky-niem"><span class="label-title">Tập kỷ niệm</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tap-giang-sinh"><span class="label-title">Tập giáng sinh</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tap-nam-moi"><span class="label-title">Tập năm mới</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tieu-thuyet"><span class="label-title">Tiểu thuyết</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/dien-anh-trung-hoa"><span class="label-title">Võ Thuật </span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-dang-hot"><span class="label-title">Hài Hước</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/chung-cu-tinh-yeu"><span class="label-title">Chung Cư Tình Yêu </span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/xuyen-khong"><span class="label-title">Xuyên Không</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tien-hiep"><span class="label-title">Tiên Hiệp</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/ngon-tinh"><span class="label-title">Ngôn Tình</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/hoat-hinh"><span class="label-title">Anime</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/hanh-dong"><span class="label-title">Hành Động</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/hinh-su"><span class="label-title">Hình Sự</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/cuong-thi"><span class="label-title">Cương Thi</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/kinh-di"><span class="label-title">Kinh Dị</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tam-ly"><span class="label-title">Tâm Lý </span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/xa-hoi-den"><span class="label-title">Xã Hội Đen</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/than-bai"><span class="label-title">Thần Bài</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/co-trang"><span class="label-title">Cổ Trang </span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/than-thoai"><span class="label-title">Thần Thoại</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/vien-tuong"><span class="label-title">Viễn Tưởng</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/au-my"><span class="label-title">Âu Mỹ</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/trung-quoc"><span class="label-title">Trung Quốc</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/han-quoc"><span class="label-title">Hàn Quốc</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/nhat-ban"><span class="label-title">Nhật Bản </span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/hong-kong"><span class="label-title">Hồng Kông</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/thai-lan"><span class="label-title">Thái Lan</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-cap-ba"><span class="label-title">Phim Cấp Ba</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/chau-tinh-tri"><span class="label-title">Châu Tinh Trì</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/ly-lien-kiet"><span class="label-title">Lý Liên Kiệt</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/chung-tu-dan"><span class="label-title">Chung Tử Đan</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/ngo-kinh"><span class="label-title">Ngô Kinh</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/luong-trieu-vy"><span class="label-title">Lương Triều Vỹ</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/chau-nhuan-phat"><span class="label-title">Châu Nhuận Phát</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/canh-diem"><span class="label-title">Cảnh Điềm</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/co-thien-lac"><span class="label-title">Cổ Thiên Lạc</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/duong-mich"><span class="label-title">Dương Mịch</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/hoang-phi-hong"><span class="label-title">Hoàng Phi Hồng</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/hong-kim-bao"><span class="label-title">Hồng Kim Bảo</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/luong-gia-huy"><span class="label-title">Lương Gia Huy</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/luu-duc-hoa"><span class="label-title">Lưu Đức Hoa</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/thanh-long"><span class="label-title">Thành Long</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/truong-ve-kien"><span class="label-title">Trương Vệ Kiện</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tvb"><span class="label-title">TVB</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/temp"><span class="label-title">Temp</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/vu-tru-mavel"><span class="label-title">Vũ trụ Mavel</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/tro-choi-vuong-quyen"><span class="label-title">Game Of Throne</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/huynh-hieu-minh"><span class="label-title">Huỳnh Hiểu Minh</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-an-do"><span class="label-title">Phim Ấn Độ</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/phim-tren-netflix"><span class="label-title">Phim Trên Netflix</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/chien-tranh"><span class="label-title">Chiến Tranh</span></a>,
    &nbsp;&nbsp;<a class="label-name" href="/ke-huy-diet"><span class="label-title">Kẻ Hủy Diệt </span></a>
</div>

   <div id="data-phim">
     $entry.Content$
</div>
<div id="id01" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content w3-card-4">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('id01').style.display='none'" 
            class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Tải Phim $entry.Title$</h2>
    </header>
    <div class="w3-container" id="dstai">
      
    </div>
    <footer class="w3-container w3-teal">
      <p>Hiếu Giddy</p>
    </footer>
  </div>
</div>


<script>
var dsserver=document.getElementById("dsserver");
  var xem=document.getElementsByClassName("xem");
  var cardbody=document.getElementsByClassName("card-body");
  var s="";
  if(xem.length==1 || !xem)
    s+=cardbody[0].innerHTML;
  else
    for(var i=0;i<xem.length;i++){
      s+="<div class=\"card xem\">"+xem[i].innerHTML+"</div>";
    }
  dsserver.innerHTML=s;
  
var thongtin=document.getElementsByClassName("tttt");
var nhantt=document.getElementById("tthongtin");
var mota=document.getElementById("content-gioithieu");
var ttmota=document.getElementsByClassName("content-film");
ttmota[0].innerHTML=mota.innerHTML;
nhantt.innerHTML=thongtin[0].innerHTML;
var tmbd=document.getElementById("tmbd");
var imdb=document.getElementsByClassName("imdb");
var v_tmbd=document.getElementById("v_tmbd");
var rate=document.getElementsByClassName("rated-text");
imdb[0].innerHTML="TMDB "+tmbd.innerHTML;
rate[0].innerHTML="("+v_tmbd.innerHTML+" Voted)";
var dienvien=document.getElementById("dienvien");
var dvc=document.getElementsByClassName("dvc");
var dsdv='';
for(var i=0;i<dvc.length;++i){
  dsdv+='<div class="swiper-slide">'+dvc[i].innerHTML+'</div>';
}
dienvien.innerHTML=dsdv;

 function xemphim(obj){
   var play=document.getElementById('video-player');
    var videoembed=document.getElementsByClassName('embed-responsive-item');
   play.innerHTML='<div class="embed-responsive embed-responsive-16by9 mx-auto"><iframe width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" id="myVideo" src=""></iframe></div>';
   obj.style.display="none";
   document.getElementById("dsserver").style.display="block";
   document.getElementById("defaultOpen").click();
}
function taiphim(){
  document.getElementById('id01').style.display='block';
 var dstai=document.getElementById("dstai");
  var tai=document.getElementsByClassName("tai");
  var s="";
  dstai.innerHTML=s;
  for(var i=0;i<tai.length;i++){
    s+="<div class=\"card tai\" style=\"margin-top:15px\">"+tai[i].innerHTML+"</div>";
  }
  dstai.innerHTML=s; 
}
  function trailer(){
    var play=document.getElementById('video-player');
    var trail=document.getElementsByClassName('embed-responsive-item');
    play.innerHTML='<div class="embed-responsive embed-responsive-16by9 mx-auto"><iframe width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" id="myVideo" src="https://tailen.ml/bomtanhd/getphim.php?link='+trail[0].src+'"></iframe></div>';
  }
</script>

</div>
<div class="group-detail" itemscope="" itemtype="https://schema.org/Movie">
<div style="display: none">
<div itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating"> <span itemprop="ratingValue">5</span>
<meta itemprop="bestRating" content="5">
<meta itemprop="worstRating" content="1"> <span itemprop="ratingCount">69</span> </div> <img itemprop="image" src="<?php echo $data['phim']->anhbia; ?>" alt="<?php echo $data['phim']->tenPhim; ?>"> <img itemprop="thumbnailUrl" src="<?php echo $data['phim']->anhbia; ?>" alt="<?php echo $data['phim']->tenPhim; ?>">
<meta itemprop="name" content="<?php echo $data['phim']->tenPhim; ?>"> </div>
<div id="video-player">
<a href="javascript:void(0)" class="big-img-film-detail" id="btn-trailer" style="background: url(<?php echo $data['phim']->anhbia; ?>); background-repeat:no-repeat; background-size:contain; background-position:center;">
<div><i class="fa fa-play-circle" aria-hidden="true"></i></div>
</a>
</div>
  <div id="contentmain">
<div id="dsserver" style="display:none;margin:5px 0 50px 0">
      <?php
        foreach($data['linkxem'] as $server){
          foreach($server as $key=>$value){
            echo '
            <div class="card xem">
              <div class="card-header">'.$key.'</div>
              <div class="card-body">';
            $d=1;
            foreach($value as $linkxem){
              if($d){
                echo '<a class="btn mr-2 mt-2 tablinks active" id="defaultOpen" onclick="openCity(event,\''.$linkxem->link.'\')">'.$linkxem->tenhienthi.'</a>';
                $d=0;
                continue;
              }
              echo '<a class="btn mr-2 mt-2 tablinks" id="defaultOpen" onclick="openCity(event,\''.$linkxem->link.'\')">'.$linkxem->tenhienthi.'</a>';
            }
            echo ' 
              </div>
            </div>';
          }
        }
      ?>
  
</div>
  </div>
<h1 class="title-film-detail-1" itemprop="name"><?php echo $data['phim']->tenPhim; ?></h1>
<h2 class="title-film-detail-2"><?php echo $data['phim']->tengoc; ?></h2>
<div class="fb-gg">
<div id="like">                                   
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=476759459479922&autoLogAppEvents=1"></script>
    <div class="fb-like" data-href="<?php echo '//'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URL']; ?>" data-width="100px" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>               
  </div>
</div>
<div class="imdb">TMDB <?php echo $data['phim']->imdb; ?></div>
<span class="rated-text">(<?php echo $data['phim']->vote; ?> Voted)</span> <span class="hd">HD</span>
<br> 
<a href="javascript:void(0)" onclick="xemphim(this)" class="play-film" style="background:#77c282;color:#fff;font-weight: bold;">Xem Phim<i class="fa fa-caret-right" aria-hidden="true"></i></a>
<a href="javascript:void(0)" class="play-film" style="background:#911;color:#fff;font-weight: bold;" onclick="taiphim()" class="w3-button w3-black">Tải Phim<i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>
<a href="<?php echo $data['info'][0]->linkweb.'/ThanhVien/themVaoTuPhim/'.$data['idphim'];?>" class="play-film" style="background:orange;color:#fff;font-weight: bold;">Thêm vào tủ phim</a>  
<p class="custom-error" style="display:none;"></p>
<ul class="infomation-film">
<li class="title">Thông tin:</li>
<li id="tthongtin">
<p><strong>Trạng thái:</strong> &nbsp;<?php echo $data['phim']->status; ?></p>
<p><strong>Lượt xem:</strong> &nbsp;<?php echo $data['phim']->luotxem.' lượt'; ?> </p>
<p><strong>Công ty SX:</strong> &nbsp;<?php echo $data['phim']->congtysx; ?></p>
<p><strong>Thể loại:</strong> &nbsp;
<?php 
  foreach($data['phim_tl'] as $value){
    echo '<a href="'.$data['info'][0]->linkweb.'/TheLoai/DanhSach/'.$value->slug.'/1">'.$value->tenTL.'</a>,&nbsp;';
  } 
?>
</p>
<p><strong>Quốc Gia:</strong> &nbsp;
<?php 
  foreach($data['phim_qg'] as $value){
    echo '<a href="'.$data['info'][0]->linkweb.'/QuocGia/DanhSach/'.$value->slug.'/1">'.$value->ten.'</a>,&nbsp;';
  } 
?>
</p>
<p><strong>Đạo diễn:</strong> &nbsp;
<?php 
if($data['phim_dd']!=false)
  foreach($data['phim_dd'] as $value){
    echo '<a href="'.$data['info'][0]->linkweb.'/Actor/ThongTin/'.$value->slug.'/1">'.$value->ten.'</a>,&nbsp;';
  } 
?>
</p>
<p><strong>Năm:</strong> &nbsp;<?php echo $data['phim']->nam; ?></p>
<p><strong>Tagline:</strong> &nbsp;<?php echo $data['phim']->tagline; ?></p>

</li>
<li class="tags"><span>TAGS: </span> 
  <?php
    $arr=explode(',',$data['phim']->tukhoa);
    for($i=0;$i<count($arr);$i++){
      echo '<a href="'.$data['info'][0]->linkweb.'/Phim/TimKiem/'.$arr[$i].'/1"><em>'.$arr[$i].'</em></a>, &nbsp;';
    }
  ?>
  
</li>
</ul>
</div>


<div class="group-vote-detail">
<h2>Xếp Hạng Phim Này</h2>
<ul>
  
<li class="star" id="star-vote" style="white-space: nowrap; cursor: pointer;"><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad1);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad2);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad3" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad3);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad4);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59" style="margin-right: 10px;"><defs><linearGradient id="star-vote_grad5" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad5);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad1);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad2);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad3" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad3);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad4);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg><svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 12.705 512 486.59"><defs><linearGradient id="star-vote_grad5" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#888888"></stop><stop offset="0%" stop-color="#888888"></stop></linearGradient></defs><polygon style="fill: url(#star-vote_grad5);stroke:black;fill-opacity:1;stroke-width:2px; " points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon></svg></li>
</ul>
</div>

<div class="group-film group-film-category" id="cat-phim-sap-chieu" data-page="1" data-slug="" style="margin-top:0">
<div class="phimdecu-slider slick-initialized slick-slider">

<div aria-live="polite" class="slick-list draggable">
<div class="swiper-container" id="hieuabb">
    <div class="swiper-wrapper" id="dienvien">
    <?php
      foreach($data['phim_dv'] as $value){
        echo '
        <div class="swiper-slide">
          <div class="item slick-slide slick-cloned" style="width: 192px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="-5" aria-hidden="true">
            <a title="'.$value->ten.'" href="'.$data['info'][0]->linkweb.'/Actor/ThongTin/'.$value->slug.'/1" style="background-image:url('.$value->avatar.')" tabindex="-1"> <div class="black-gradient"> <b class="title-film">'.$value->ten.'</b> </div>  </a>
          </div>
        </div>
        ';
      }
    
    ?>
          
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

<div class="group-ndfilm-detail" itemprop="description">
<h2 class="ndf">Nội dung phim</h2>
<p class="content-film">
<?php echo $data['phim']->gioithieu; ?>
</p>
</div>
<div style="clear:both"></div>
<div style="background:#fff;padding:10px 7px;">
 <div id="binhluan">
      <!-- Form nhập bình luận mới -->
      <?php if(isset($_COOKIE['username']))
        echo '
      <div id="form-binhluan" style="display:flex;width:97%;margin:auto">
          <div style="float:left;margin-right:10px">
            <img src="'.$_COOKIE['avatar'].'" width="30px"/>
          </div>
          <div id="binhluan" style="display:inline;width:90%">
            <form action="'.$data['info'][0]->linkweb.'/BinhLuan/themBinhLuan" method="post">
              <input type="hidden" name="idPhim" value="'.$data['idphim'].'"/>
              <textarea name="noidung" id="message" rows="3" placeholder="Nhập nội dung bình luận..." style="width:100%;margin:0 auto;display:block"></textarea>
              <button name="btn-binhluan" class="btn btn-success" style="float:right;margin:10px">Bình luận</button>
            </form>
          </div>
      </div>
      <!-- End Form nhập bình luận mới -->
      <strong style="margin-left:20px">Có '.$data['sobl'].' bình luận</strong>
      <hr>';?>
      
      <!-- Danh sách bình luận -->
      <!-- Bình luận chính -->
      <?php
      if($data['binhluan']!=false && isset($_COOKIE['username']))
          foreach($data['binhluan'] as $value){
            $sotl=count(explode(',',$value->traloi))-1;
            echo '
            <div class="binhluan-item" style="display:flex;width:97%;margin: 20px auto;clear:both">
              <div class="avt-item" style="float:left;margin-right:10px">
                <img src="'.$value->avatar.'" width="30px"/>
              </div>
              <div id="noidung-item" style="display:inline;width:90%">
                <strong>'.$value->ten.'</strong> (<small><em>'.$value->thoiGian.'</em></small>) 
                <br>
                <blockquote style="font-size:15px;margin:0">'.$value->noidung.'</blockquote>
                <p id="chucnang-item" style="margin:0 0 0 15px">
                  <span id="like'.$value->idBinhLuan.'" style="cursor:pointer" onclick="thich(\''.$value->idBinhLuan.'\',\'like'.$value->idBinhLuan.'\',\''.$data['info'][0]->linkweb.'\')">'.$value->thich.' <i class="fa fa-heart"></i></span>
                  <span onclick="getTraLoi(\''.$value->idBinhLuan.'\',\'traloi'.$value->idBinhLuan.'\',\''.$data['info'][0]->linkweb.'\')" style="margin-left:10px;color:blue;cursor:pointer">'.$sotl.' Trả lời</span>
                </p>
                <!-- Danh sách trả lời bình luận -->
                    <blockquote id="traloi'.$value->idBinhLuan.'" style="margin: 0 auto 20px 70px;display:none">
                                    
                    </blockquote>
              </div>
            </div>
            ';
          }
      else
          if(!isset($_COOKIE['username']))
              echo 'Vui lòng đăng nhập để có thể xem và bình luận.';
          else
              echo 'Chưa có bình luận nào.';

      ?>
      
      <!-- End bình luận chính -->


                        
  </div>
  
</div>

<div class="group-film group-film-category" id="cat-phim-sap-chieu" data-page="1" data-slug="">
<h2><a title="Phim Đang Chiếu Rạp" href="javascript:void(0)">Phim Liên Quan<i class="fa fa-caret-right" aria-hidden="true"></i></a></h2>
<span class="line-ngang"></span>
<div class="phimdecu-slider slick-initialized slick-slider">

<div aria-live="polite" class="slick-list draggable">
<div class="swiper-container" id="hieuab">
    <div class="swiper-wrapper">
      <!-- phim liên quan -->
    	<?php
        foreach($data['phimlienquan'] as $value){
            echo '<div class="swiper-slide">
            <div class="item slick-slide slick-cloned" style="width: 192px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="-5" aria-hidden="true">
              <a title="'.$value->tenPhim.'" href="'.$data['info'][0]->linkweb.'/Phim/XemPhim/'.$value->slug.'" style="background-image:url('.$value->poster.')" tabindex="-1"> <div class="black-gradient"> <b class="title-film">'.$value->tenPhim.'</b> <p>'.$value->tengoc.'</p> <ul class="tag-film"> <li><div class="hd" style="width:auto !important;height:auto !important;padding:2px 4px;font-size: 13px !important;line-height: 20px !important;">'.$value->status.'</div></li> </ul> </div> <div class="play"></div> </a>
          </div>
        </div>';
        }
      ?>
      
      <!-- end phim liên quan -->
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
<?php
$arr=explode(',',$data['info'][0]->tukhoa);
for($i=0;$i<count($arr);$i++){
  echo '<a class="label-name" target="_blank" href="https://www.google.com/search?q='.$arr[$i].'"><span class="label-title">'.$arr[$i].'</span></a>, &nbsp;';
}
?>
	
</div>

   <div id="data-phim">
     <!-- entry -->
     <p id="data-trailer"><iframe width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" src="<?php echo $data['phim']->trailer; ?>"></iframe></p>


      
        
      

      

      <!-- end -->
</div>
<div id="id01" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content w3-card-4">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('id01').style.display='none'" 
            class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Tải Phim <?php echo $data['phim']->tenPhim; ?></h2>
    </header>
    <div class="w3-container" id="dstai">
    <?php
        foreach($data['linktai'] as $server){
          foreach($server as $key=>$value){
            echo '
            <div class="card mt-0 tai">
              <div class="card-header">'.$key.'</div>
              <div class="card-body">';
            foreach($value as $linktai){
              echo '<a class="btn mr-3 mt-2" href="'.$linktai->link.'" target="_blank">'.$linktai->tenhienthi.'</a>';
            }
            echo ' 
              </div>
            </div>';
          }
        }
      ?>
    </div>
    <footer class="w3-container w3-teal">
      <p></p>
    </footer>
  </div>
</div>


<script>

</script>

</div>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

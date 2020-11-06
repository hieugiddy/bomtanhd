
<?php 

  $thongtinsp=$conn->prepare('select tenSP,ngaydang,tukhoa,hinhanh,username,soluong,motangan,mota,theloai.maTL,maTLC,tenTL,kieu from sanpham,chitietsanpham,theloai where chitietsanpham.maSP=sanpham.maSP and sanpham.maTL=theloai.maTL and sanpham.maSP="'.$_GET['id'].'"');
  $thongtinsp->execute();
  $info=$thongtinsp->fetch(PDO::FETCH_ASSOC);
        $dstheloai='<i class="fa fa-angle-right"></i>
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="?Layout=chuyenmuc&maTL='.$info['maTL'].'" itemprop="url" title="'.$info['tenTL'].'"><span itemprop="title">'.$info['tenTL'].'</span></a></span>';

        if($info['maTLC']!=""){
        $theloaicc=$conn->prepare('select * from chitiettheloai where maTL='.$info['maTL'].' and maTLC='.$info['maTLC']);
        $theloaicc->execute();
        if($theloaicc->rowCount()>0){
           while($row=$theloaicc->fetch(PDO::FETCH_ASSOC)){
              $dstheloai.='<i class="fa fa-angle-right"></i>
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="?Layout=chuyenmuc&maTLC='.$row['maTLC'].'&maTL='.$info['maTL'].'" itemprop="url" title="'.$row['tenTLC'].'"><span itemprop="title">'.$row['tenTLC'].'</span></a></span>';
              
           }
        }}
?>
<!--<a class='filling' href='#' id='back-to-top'><i class='fa fa-arrow-up'/></a>-->
<!-- Back -->
<div class="row" id="content-wrapper">
<div class="clear"></div>
<div id="main-content">
<div class="ads-home no-items section" id="ads-home"></div>
<div class="main section" id="main"><div class="widget Blog" data-version="1" id="Blog1">
<div class="blog-posts hfeed">
<div class="breadcrumbs">
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url" title="Home"><span itemprop="title">Home</span></a></span>
<?php echo $dstheloai;?>
<i class="fa fa-angle-right"></i>
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo $linkweb;?>?Layout=baiviet&id=<?php echo $_GET['id'].'';?>" itemprop="url" title="<?php echo $info['tenSP'];?>"><span itemprop="title"><?php echo $info['tenSP'];?></span></a></span>
</div>
<!--Can't find substitution for tag [defaultAdStart]-->

          <div class="date-outer">
        

          <div class="date-posts">
        
<div class="post-item">
<div class="clear"></div>
<div class="clear"></div>
<article class="post ty-article" style="padding:5px 15px">
<header class="entry-header-single">
<h1 class="post-title entry-title" itemprop="name headline" style="font-size: 1.5rem;">
<?php echo $info['tenSP'];?>
</h1>
</header>
<div class="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
<div itemprop="image" itemscope="itemscope" itemtype="https://schema.org/ImageObject" style="display:none;">
<meta content="https://1.bp.blogspot.com/-mevyvjDPpKk/X0PAafAJpbI/AAAAAAAAEeU/QaJT_NmQYJke7YfpGkslBnTOWNRMyyacACLcBGAsYHQ/s0/Untitled-1-2-1-590x353.jpg" itemprop="url">
<meta content="700" itemprop="width height">
</div>
<div class="post-inner">
<div class="post-body entry-content" id="post-body-6199173657106791906" itemprop="articleBody">
<meta content="<?php echo $info['tenSP'];?>" itemprop="headline">
<meta content="" name="twitter:description">
<div class="post-meta ty-meta">
<span class="post-timestamp">
<i class="fa fa-calendar-check-o"></i> Đăng Ngày: 
  <meta content="<?php echo $linkweb.'?Layout=baiviet&id='.$_GET['id'];?>" itemprop="url mainEntityOfPage">
<a class="timestamp-link" href="#" rel="bookmark" title="permanent link"><abbr class="published" itemprop="datePublished dateModified" title="<?php echo $info['ngaydang'];?>">
<?php echo $info['ngaydang'];?></abbr></a>
</span><br>
<span class="post-labels">
<i class="fa fa-folder-open"></i> Chuyên Mục:
<a href="<?php echo '?Layout=chuyenmuc&maTL='.$info['maTL']; ?>" rel="tag">
<?php echo $info['tenTL']; ?></a>
</span><br>
<span class="post-author vcard">
<span class="fn" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
  <i class="fa fa-user"></i> Người đăng:
<a class="g-profile" href="?Layout=chuyenmuc&username=<?php echo $info['username'].'';?>" rel="author" title="<?php echo $info['username'].'';?>">
<span itemprop="name"><?php echo $info['username'].'';?></span></a>
</span>
</span><br>

<?php 
if(isset($_GET['xem'])){
 echo '<p id="motangan" class="mt-2"></p>
       <script>document.getElementById("motangan").innerText="'.$info['motangan'].'"</script>';
}
else {
if($info['kieu']=='phimanh')
    echo '
          <a href="?Layout=baiviet&id='.$_GET['id'].'&xem#contentmain"><button class="btn btn-success mt-3"><i class="fa fa-film text-light"></i>&nbsp;Xem phim</button></a>  
          <button data-toggle="modal" data-target="#xemphim" class="btn btn-danger mt-3"  onclick="taiphim(\''.$_GET['id'].'\')"><i class="fa fa-download text-light"></i>&nbsp;Tải phim</button>
            ';
else
  echo '<div id="like" class="mt-2"> 
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=476759459479922&autoLogAppEvents=1" nonce="13tdmHTD"></script>
<div class="fb-like" data-href="'.$linkweb.'?Layout=baiviet&id='.$_GET['id'].'" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div><br>
</div>';
}
?>
</div>

<?php 
if(isset($_GET['xem'])){
 include('xemphim.php');
}
else{     
          $trailer=$conn->prepare('select tenhienthi,link from linkphim where maSP='.$_GET['id'].' and loai="trailer" order by ngaythem DESC limit 1');
          $trailer->execute();
          $linktrailer=$trailer->fetch(PDO::FETCH_ASSOC);
          if($trailer->rowCount()>0){
          echo ' <center>
                <div class="resize_video">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" id="myVideo" src="'.$linktrailer['link'].'"></iframe></div>
                </div>
                </center>';
                echo '<div class="mt-2"></div>';
           }
           if($info['kieu']=='phimanh'){
            echo '<div id="like" class="mb-3" style="float:right"> 
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=476759459479922&autoLogAppEvents=1" nonce="13tdmHTD"></script>
                <div class="fb-like" data-href="'.$linkweb.'?Layout=baiviet&id='.$_GET['id'].'" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div><br>
                </div>
                <div style="clear:both"></div>
                ';}
           $trailer=$conn->prepare('select tenhienthi,link from linkphim where maSP='.$_GET['id'].' and loai="trailer" order by ngaythem DESC');
          $trailer->execute();
           if($trailer->rowCount()>1){
               echo '<div id="dsvideo">';
               $i=1;
               while($row=$trailer->fetch(PDO::FETCH_ASSOC)){
                   if($i==1){
                     echo '<a class="tablinks active" id="defaultOpen" onclick="openCity(event,\''.$row['link'].'\')"><i class="fa fa-caret-right mr-2"></i>'.$row['tenhienthi'].'</a>';
                     $i=0;
                   }
                  else  echo '<a class="tablinks" onclick="openCity(event,\''.$row['link'].'\')"><i class="fa fa-caret-right mr-2"></i>'.$row['tenhienthi'].'</a>';
               }
               echo '</div>';
           }
        
        
        $noidung = explode('<div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>', $info['mota']);
        $arr_nd = count($noidung);
        if(!isset($_GET['page']))
         echo '<div id="noidung">'.$noidung[0].'</div>';  
        else
          if($_GET['page']==1)
            echo '<div id="noidung">'.$noidung[0].'</div>';
          else
            echo '<div id="noidung">'.$noidung[$_GET['page']-1].'</div>';
         if($arr_nd>1){
         echo '<br/><br/><center>';
            if(!isset($_GET['page'])) $tmp=1;
            else $tmp=$_GET['page'];
            for($i=1;$i<=$arr_nd;$i++){
               if($tmp==$i)
                echo '<span style="padding:4px 6px;margin:5px 3px;color:#fff;background:#99CCCC;border:1px solid #99CCCC">'.$i.'</span>';
               else
                echo '<a style="padding:4px 6px;margin:5px 3px;color:#000;background:#fff;border:1px solid #000" href="?Layout=baiviet&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a>';
            }
           echo '</center>';
         }
            
          echo '<br/>';
          $dinhkem=$conn->prepare('select tenhienthi,link from linkphim where maSP='.$_GET['id'].' and loai="dinhkem"');
          $dinhkem->execute();
          if($dinhkem->rowCount()>0){
          echo '<div id="dinhkem" style="border:2px solid #f3f3f3;padding:10px"><h4><i class="fa fa-link"></i>&nbsp;File đính kèm:</h4>';
          while($row=$dinhkem->fetch(PDO::FETCH_ASSOC)){
            echo '<a href="'.$row['link'].'" target="_blank" class="d-block p-1 mb-1 bg-light text-dark">'.$row['tenhienthi'].'</a>';
          }
          echo '</div>';}
}
  ?>

</div>
</div>
<div class="clear"></div>
<style>
.post-category, .post-tags{display:block}
.post-category,.post-tags{display:block}
.post-category ul,.post-tags ul{display:inline-block;padding:0;margin:0}
.post-category i,.post-tags i{width:15px;margin-right:15px}
.post-category li,.post-tags li{display:inline-block;margin-right:10px}
</style>
<style>
  .gbld-author-bio{margin-top:20px}
.gbld-author-bio .author-avatar{padding:60px 0 0;margin-right:-50px}
.gbld-author-bio .avatar-image{overflow:hidden;background-color:#eee;border-radius:50%;width:100px;height:100px}
.gbld-author-bio .avatar-image img{width:inherit;height:inherit;margin:0}
.gbld-author-bio header{margin-top:0;margin-bottom:5px;padding:0;border:0}
.gbld-author-bio footer{padding:0;border:0}
.gbld-author-bio footer .social-media{margin:9px 0 7px}
.gbld-author-bio footer .social-media a{color:#777677;display:inline-block;margin-left:14px}
.gbld-author-bio footer .social-media a:first-child{margin-left:0}
.gbld-author-bio h4{font-weight:700!important;text-transform:uppercase;font-size:16px;margin-top:10px;margin-bottom:10px;font-style:italic}
.gbld-author-bio h4 span{color:#666}
.gbld-author-bio h4 small{font-size:16px;text-transform:none;display:inline-block;margin-left:10px;color:#13afec;font-weight:400!important}
.gbld-author-bio .author-description{font-size:14px;border:1px solid #ececec;padding:25px 25px 25px 75px;min-height:135px}
.gbld-author-bio .author-description a.cta{display:inline-block;padding:2px 6px 0;font-size:12px;color:#fff;outline:0;cursor:pointer;text-shadow:0 1px 1px rgba(0,0,0,0.2);font-weight:700;background-color:#efcc6d;text-transform:uppercase}
.gbld-author-bio .media-body,.gbld-author-bio .media-left,.gbld-author-bio .media-right{display:table-cell;vertical-align:top;width:10000px;overflow:hidden;zoom:1}
@media screen and (max-width: 468px) {
.gbld-read-more{width:100%}
}
@media screen and (max-width: 1024px) {
.gbld-author-bio{text-align:center}
.gbld-author-bio .author-avatar{float:none!important;margin:0 0 10px;padding:0}
.gbld-author-bio .avatar-image{width:100px;margin:0 auto}
.gbld-author-bio h4>small{display:block;margin:5px 0}
.gbld-author-bio .author-description{padding:15px 20px;margin-bottom:15px;text-align:justify}
}
</style>
<div class="post-footer mt-5">
<div class="post-category">
<i class="fa fa-folder-o"></i>
</div>
<div class="post-tags">
<?php
$tag = explode(',', $info['tukhoa']);
$leng = count($tag);
echo '<i class="fa fa-hashtag mr-0"></i>';
for($i = $leng -1; $i >= 0; $i--)
{
    echo '<span class="label-head">
<a href="?Layout=timkiem&q='.$tag[$i].'" rel="tag">'.$tag[$i].'</a>
</span>,&nbsp;';
}

?>

</div>
<style>
.td-post-sharing-top{margin:20px 0}
.td-ps-notext .td-social-network .td-social-but-icon,.td-ps-notext .td-social-handler .td-social-but-icon{border-top-right-radius:2px;border-bottom-right-radius:2px}
.td-social-network{color:#000;overflow:hidden}
.td-social-network .td-social-but-icon{border-top-left-radius:2px;border-bottom-left-radius:2px}
.td-social-but-icon,.td-social-but-text{font-size:13px}
.td-social-network .td-social-but-text{border-top-right-radius:2px;border-bottom-right-radius:2px}
.td-social-network:hover{opacity:.8!important}
.td-social-handler{color:#444;border:1px solid #e9e9e9;border-radius:2px}
.td-social-handler .td-social-but-text{font-weight:700}
.td-social-handler .td-social-but-text:before{background-color:#000;opacity:.08;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity= 8 );filter:alpha(opacity=8)}
.td-social-share-text{margin-right:18px}
.td-social-share-text:before,.td-social-share-text:after{content:'';position:absolute;top:50%;transform:translateY(-50%);-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);left:100%;width:0;height:0;border-style:solid}
.td-social-share-text:before{border-width:9px 0 9px 11px;border-color:transparent transparent transparent #e9e9e9}
.td-social-share-text:after{border-width:8px 0 8px 10px;border-color:transparent transparent transparent #fff}
.td-social-but-text,.td-social-but-icon{display:inline-block;position:relative}
.td-social-but-icon{padding-left:13px;padding-right:13px;line-height:40px;z-index:1}
.td-social-but-icon i{position:relative;top:-1px;margin-right:0!important}
.td-social-but-text{margin-left:-6px;padding-left:12px;padding-right:17px;line-height:40px}
.td-social-but-text:before{content:'';position:absolute;top:12px;left:0;width:1px;height:16px;background-color:#fff;opacity:.2;z-index:1}
.td-ps-bg .td-social-network{color:#fff}
.td-ps-border .td-social-network .td-social-but-icon,.td-ps-border .td-social-network .td-social-but-text{line-height:38px;border-width:1px;border-style:solid}
.td-ps-border .td-social-network .td-social-but-text{border-left-width:0}
.td-ps-border .td-social-network .td-social-but-text:before{background-color:#000;opacity:.08;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity= 8 );filter:alpha(opacity=8)}
.td-ps-border.td-ps-padding .td-social-network .td-social-but-icon{border-right-width:0}
.td-ps-border.td-ps-padding .td-social-network.td-social-expand-tabs .td-social-but-icon{border-right-width:1px}
.td-ps-border-grey .td-social-but-icon,.td-ps-border-grey .td-social-but-text{border-color:#e9e9e9}
.td-ps-border-colored .td-social-facebook .td-social-but-icon,.td-ps-border-colored .td-social-facebook .td-social-but-text{border-color:#516eab}
.td-ps-border-colored .td-social-twitter .td-social-but-icon,.td-ps-border-colored .td-social-twitter .td-social-but-text{border-color:#29c5f6}
.td-ps-border-colored .td-social-googleplus .td-social-but-icon,.td-ps-border-colored .td-social-googleplus .td-social-but-text{border-color:#eb4026}
.td-ps-icon-arrow .td-social-network .td-social-but-icon:after{content:'';position:absolute;top:50%;transform:translateY(-50%);-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);left:calc(100% + 1px);width:0;height:0;border-style:solid;border-width:9px 0 9px 11px;border-color:transparent transparent transparent #000}
.td-ps-icon-color .td-social-facebook .td-social-but-icon{color:#516eab}
.td-ps-icon-color .td-social-twitter .td-social-but-icon{color:#29c5f6}
.td-ps-icon-color .td-social-googleplus .td-social-but-icon{color:#eb4026}
.td-ps-padding .td-social-network .td-social-but-icon{padding-left:17px;padding-right:17px}
.td-ps-padding .td-social-handler .td-social-but-icon{width:40px}
.td-ps-padding .td-social-reddit .td-social-but-icon,.td-ps-padding .td-social-telegram .td-social-but-icon{padding-right:16px}
.td-ps-padding .td-social-stumbleupon .td-social-but-icon,.td-ps-padding .td-social-digg .td-social-but-icon,.td-ps-padding .td-social-expand-tabs .td-social-but-icon{padding-right:13px}
.td-ps-padding .td-social-googleplus .td-social-but-icon{padding-right:15px}
.td-ps-padding .td-social-vk .td-social-but-icon{padding-right:14px}
.td-ps-padding .td-social-expand-tabs .td-social-but-icon{padding-left:13px}
.td-ps-rounded .td-social-network .td-social-but-icon{border-top-left-radius:100px;border-bottom-left-radius:100px}
.td-ps-rounded .td-social-network .td-social-but-text{border-top-right-radius:100px;border-bottom-right-radius:100px}
.td-ps-rounded.td-ps-notext .td-social-network .td-social-but-icon{border-top-right-radius:100px;border-bottom-right-radius:100px}
.td-ps-rounded .td-social-expand-tabs{border-radius:100px}
@media screen and (max-width:440px) {
.td-social-but-text{display:none!important}
.td-ps-border.td-ps-padding .td-social-network .td-social-but-icon,.td-ps-border.td-ps-padding .td-social-network .td-social-but-icon{border:1px solid #e9e9e9!important;width:40px;height:40px;line-height:40px}
.td-ps-rounded .td-social-network .td-social-but-icon{border-radius:100px!important}
.td-social-but-icon i.fa-facebook{right:2px}
.td-social-but-icon i.fa-twitter{right:3.5px}
.td-social-but-icon i.fa-google-plus{right:5px}
}
</style>
<div class="td-post-sharing-top"><div class="td-post-sharing td-ps-border td-ps-border-grey td-ps-rounded td-ps-padding td-ps-icon-color td-post-sharing-style18 " id="td_social_sharing_article_top"><div class="td-post-sharing-visible"><a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-facebook" href="#" onclick="window.open(this.href, &#39;windowName&#39;, &#39;width=600, height=400, left=24, top=24, scrollbars, resizable&#39;); return false;" rel="nofollow" target="_blank" title="Facebook">
<div class="td-social-but-icon"><i class="fa fa-facebook"></i></div>
<div class="td-social-but-text">Facebook</div>
</a><a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-twitter" href="#" onclick="window.open(this.href, &#39;windowName&#39;, &#39;width=600, height=400, left=24, top=24, scrollbars, resizable&#39;); return false;" rel="nofollow" target="_blank" title="Twitter">
<div class="td-social-but-icon"><i class="fa fa-twitter"></i></div>
<div class="td-social-but-text">Twitter</div>
</a><a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-googleplus" href="#" onclick="window.open(this.href, &#39;windowName&#39;, &#39;width=600, height=400, left=24, top=24, scrollbars, resizable&#39;); return false;" rel="nofollow" target="_blank" title="Google Plus">
<div class="td-social-but-icon"><i class="fa fa-google-plus"></i></div>
<div class="td-social-but-text">Google+</div>
</a></div>
</div></div>
<hr>
<div id="related-posts">
  <?php include('lienquan.php'); ?>
</div>

</div>
<hr>
<div class="gbld-author-bio mt-5" id="info-ngdien" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
<div class="media d-block">
<div class="pull-left author-avatar">
<div class="avatar-image img-circle" itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
<img alt="" class="avatar avatar-100 photo" height="100" src="https://1.bp.blogspot.com/-M-W5BLC0e74/X0MfDVNS18I/AAAAAAAAEdM/ILin0_fuRE0bc10ypA9_-RRjDkug4l5fwCLcBGAsYHQ/s1024/doctorwho.png" width="100">
<meta content="https://1.bp.blogspot.com/-M-W5BLC0e74/X0MfDVNS18I/AAAAAAAAEdM/ILin0_fuRE0bc10ypA9_-RRjDkug4l5fwCLcBGAsYHQ/s1024/doctorwho.png" itemprop="url">
<meta content="100" itemprop="width">
<meta content="100" itemprop="height">
</div>
</div>
<div class="media-body">
<header class="author-bio-header media-heading">
<h4 class="third-color"><span itemprop="name">Whovians Việt Nam</span>
<small class="first-color"><i>Cộng đồng, Fandom</i></small></h4>
</header>
<div class="author-description">
Doctor Who là một series phim truyền hình khoa học viễn tưởng của Vương quốc Anh do đài BBC sản xuất, bắt đầu phát sóng từ năm 1963. Bộ phim có nội dung chính kể về những cuộc phiêu lưu của một Time Lord tự xưng mình là The Doctor, một chủng loài ngoài hành tinh đến từ Gallifrey. 
  <br>
</div>
<footer class="author-bio-footer">
<div class="social-media">
<a class="external" data-original-title="Facebook" data-placement="top" data-toggle="tooltip" href="https://www.facebook.com/doctorwhovietnam" rel="nofollow" target="_blank" title=""><i class="fa fa-facebook"></i></a>
<a data-original-title="Twitter" data-placement="top" data-toggle="tooltip" href="#" rel="nofollow" style="pointer-events: none;" target="_blank" title=""><i class="fa fa-twitter"></i></a>
<a data-original-title="Youtube" data-placement="top" data-toggle="tooltip" href="#" rel="nofollow" style="pointer-events: none;" target="_blank" title=""><i class="fa fa-youtube"></i></a>
</div>
</footer>
</div>
</div>
</div>
<div class="clear"></div>
<style>
  /* Navigasi Blogger dengan Judul by igniel.com */
  #blog-pager a.home-link {display:none}
  #blog-pager {margin:20px 0px; display:inline-block; width:100%;}
  #blog-pager a.blog-pager-newer-link, #blog-pager a.blog-pager-older-link {font-weight:600; font-size:16px; padding:0px; overflow:hidden; line-height:initial; display:block; width:100%; border:0px; background:transparent;}
  #blog-pager a.blog-pager-newer-link {padding-right:5px;}
  #blog-pager a.blog-pager-older-link {padding-left:5px;}
  .blog-pager-newer-link span:first-child, .blog-pager-older-link span:first-child {font-size:20px; color:#000; text-transform:uppercase;}
  .blog-pager-newer-link span:last-child, .blog-pager-older-link span:last-child{display:block; line-height:24px; font-weight:400; text-transform:none;}
  #blog-pager a.blog-pager-newer-link:hover, #blog-pager a.blog-pager-older-link:hover{color:#ff5722; background:transparent;}
  #blog-pager-newer-link {float:left; text-align:left; width:50%;}
  #blog-pager-older-link {float:right; text-align:right; width:50%;}
  #blog-pager-older-link span:first-child::after {margin-right:-10px; width:35px; height:35px; vertical-align:-10px; display:inline-block; transition:all .3s ease; background:url("data:image/svg+xml,<svg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z' fill='%231d2129'></path></svg>") no-repeat; content:''}
  #blog-pager-newer-link span:first-child:before {margin-left:-10px; width:35px; height:35px; vertical-align:-10px; display:inline-block; transition:all .3s ease; background: url("data:image/svg+xml,<svg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z' fill='%231d2129'></path></svg>") no-repeat; content:''}
  @media only screen and (max-width:640px){
    #blog-pager {display:block;}
    #blog-pager-newer-link, #blog-pager-older-link {float: none; width: 100%; display: block; text-align:left;}
    #blog-pager-older-link {margin-top:20px;}
  }
</style>
<style>
#posturl {
    padding: 5px 0 5px 10px;
    border: 1px solid #e1e1e1;
    margin-bottom: 4px;
    margin-top: 10px;
    font-size: 15px;
    color: #000;
}
#posturl{padding: 5px 0 5px 10px;border:1px solid #e1e1e1;margin-bottom:4px;margin-top:10px;font-size:15px;color:#000}
#posturl i{font-size: 14px}
#post-url{user-select:all;-webkit-user-select:all;-moz-user-select:all;-o-user-select:all}
</style>
<div class="clear"></div><br/>
<div class="post-action">
<i class="fa fa-folder-open"></i>
<span style="font-size:15px;font-weight:bold"> URL : </span>
<a class="copy-text" data-clipboard-target="#post-url"><i class="fa fa-clone"></i> Copy</a>
</div><div class="clear" id="posturl"><i class="fa fa-link"></i> | <span id="post-url"><?php echo $linkweb.'?Layout=baiviet&id='.$_GET['id'];?></span>
</div>
</div>
<div style="clear: both;"></div>
<div class="post-footer">
<div class="post-footer-line post-footer-line-1"></div>
<div class="post-footer-line post-footer-line-2"></div>
<div class="post-footer-line post-footer-line-3"></div>
</div>
</article>
<div class="comments" id="comments">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=476759459479922&autoLogAppEvents=1" nonce="2XfyttPI"></script>
<div class="fb-comments" data-href="<?php echo $linkweb;?>?Layout=baiviet&id=<?php echo $_GET['id'].'';?>" data-numposts="10" data-width="750"></div>
</div>
</div>

        </div></div>
      
<!--Can't find substitution for tag [adEnd]-->
</div>

<div class="modal" id="xemphim">
 <div class="modal-dialog">
    <div class="modal-content" style="max-width: 100%">
       <!-- Modal Header -->
       <div class="modal-header">
          <h4 class="modal-title hanhdongxp"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <!-- Modal body -->
       <div class="modal-body">
    <iframe src="" frameborder="0" id="hienthixp" width="100%" height="280px"></iframe>
       </div>
    </div>
 </div></div>
<style>
.tablinks{
 display:block;
 cursor:pointer;
 padding:5px 7px;
 margin:5px 0
}
.tablinks.active{
background:#999;
color:#fff !important
}
#dsvideo{
 max-height:250px;
 overflow:auto;
 background:#ddd;
 padding:0;
 margin-bottom:20px;
 
}
#dsvideo::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
} 
#dsvideo::-webkit-scrollbar-thumb {
    background-color: #777;
}
#dsvideo::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}
#noidung img{
width:auto !important;
height:auto !important;
margin: auto !important;
max-width:100% !important;
text-align:center !important;
margin: 10px 0;
border-radius: 8px;
box-shadow: 0 5px 15px -8px rgba(0,0,0,.24), 0 8px 10px -5px rgba(0,0,0,.2);
box-sizing: border-box;
cursor: pointer;
transition: 0.3s;
}
#noidung img:hover {opacity: 0.7;}

</style>

<script>

function taiphim(id){
        var tieude=document.getElementsByClassName('hanhdongxp');
        var ds=document.getElementById('hienthixp');
        tieude[0].innerText="Tải phim";
        ds.src="./Theme/baiviet/taiphim.php?id="+id;
}
</script>
<script>
	var hinh=document.getElementsByTagName('img');
for(var i=0;i<hinh.length;i++){
	hinh[i].classList.toggle('hinhdb');
}
</script>



<script>
// Get the modal
var slide= document.getElementsByClassName("pa-gallery-player-widget");
slide[0].style.margin="10px 0 190px 0";
</script>
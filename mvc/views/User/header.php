<?php 
$link=$data['info'][0]->linkweb;
?>
<div class="body-page ">

<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid navbar-top">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
<a title="Phim Mới, Phim Hay, Phim HD, Phim Rạp, Phim Miễn Phí" class="navbar-brand" href="<?php echo $data['info'][0]->linkweb; ?>"><img src="<?php echo $data['info'][0]->logo; ?>" alt="BomTanHD" style="width:125px !important;margin-top:5px"> </a>
</div>

<div class="collapse navbar-collapse col-md-9" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li> <a title="Trang chủ" href="<?php echo $data['info'][0]->linkweb; ?>">Home</a></li>
<li class="dropdown"> <a href="javascript:void(0)">Thể Loại <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" id="mn-theloai">
<script>
    showTheloai(<?php echo $data["theloai"] ;?>,'mn-theloai','<?php echo $data['info'][0]->linkweb; ?>');
</script>
 </ul>
</li>
<li class="dropdown"> <a href="javascript:void(0)">Quốc Gia <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" id="mn-quocgia">
<script>
    showQuocGia(<?php echo $data["quocgia"] ;?>,'mn-quocgia','<?php echo $data['info'][0]->linkweb; ?>');
</script>
</ul>
</li>   
<li class="dropdown"> <a href="javascript:void(0)">Năm <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" id="mn-nam">
<script>
    showNam(<?php echo $data["nam"] ;?>,'mn-nam','<?php echo $data['info'][0]->linkweb; ?>');
</script>
</ul>
</li>   
<li> <a title="Phim Lẻ" href="<?php echo $data['info'][0]->linkweb; ?>/Phim/PhimLe/1">Phim Lẻ</a></li>
<li> <a title="Phim Bộ" href="<?php echo $data['info'][0]->linkweb; ?>/Phim/PhimBo/1">Phim Bộ</a></li>
<li> <a href="<?php echo $data['info'][0]->linkweb; ?>/QuocGia/DanhSach/viet-nam/1" title="Phim Việt Nam">Phim Việt Nam</a></li>
<li> <a href="<?php echo $data['info'][0]->linkweb; ?>/Phim/TopIMDB/1" title="Phim TOP IMDb" class="napvip">TOP IMDb</a> </li>
</ul>
</div>

<ul class="nav navbar-nav navbar-right custom-search">
<li>

<form class="navbar-form" enctype="application/x-www-form-urlencoded" role="search" id="search-block" method="post" action="<?php echo $link;?>/Phim/XuLiTK">
<div class="form-group search-form-group" id="timkiem">
<input type="text" class="form-control" id="query_search" placeholder="Search" name="q" maxlength="100" autocomplete="off">
<button type="submit" class="btn btn-default" id="btn-search"> <i class="fa fa-search"></i> </button>
</div>
<div class="search-hint" id="search-hint"> </div>
</form>

<div id="profile">
    <?php
        if(isset($_COOKIE['username']))
            echo '<img src="'.$_COOKIE['avatar'].'" id="icon-user"/>';
        else
            echo '<img src="'.$data['info'][0]->linkweb.'/public/img/user.png" id="icon-user"/>';
    ?>
    <div id="profile-menu">
        <ul>
            <?php
            if(isset($_COOKIE['username']))
                echo '
                <li>'.$_COOKIE['ten'].'</li>
                <li><a href="'.$data['info'][0]->linkweb.'/Account/EditProfile">Edit Profile</a></li>
                <li><a href="'.$data['info'][0]->linkweb.'/ThanhVien/TuPhim/1">Tủ phim</a></li>
                <li><a href="">Danh sách phát</a></li>
                <li><a href="'.$data['info'][0]->linkweb.'/Account/DoiMK">Đổi mật khẩu</a></li>
                <li><a href="'.$data['info'][0]->linkweb.'/ThanhVien/dangXuat">Đăng xuất</a></li>
                ';
            else
                echo '
                <li>Vui lòng đăng nhập</li>
                <li><a href="'.$data['info'][0]->linkweb.'/Account">Đăng nhập</a></li>
                <li><a href="'.$data['info'][0]->linkweb.'/Account/DangKy">Đăng ký</a></li>
                ';
            ?>
            
            
            
        </ul>
    </div>
</div>





</li>
</ul>
</div>

</nav>

<div class="container khoi-body">
<div class="khoi-trai" style="overflow:hidden">
  
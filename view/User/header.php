<div class="body-page ">

<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid navbar-top">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
<a title="Phim Mới, Phim Hay, Phim HD, Phim Rạp, Phim Miễn Phí" class="navbar-brand" href="/bomtanhd"><img src="https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Bongngotv_config/bomtanhd.png" alt="BomTanHD" style="width:125px !important;margin-top:5px"> </a>
</div>

<div class="collapse navbar-collapse col-md-9" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li> <a title="Trang chủ" href="/bomtanhd">Home</a></li>
<li class="dropdown"> <a href="javascript:void(0)">Thể Loại <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php hienThiTheLoai(); ?>
</ul>
</li>
<li class="dropdown"> <a href="javascript:void(0)">Quốc Gia <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php hienThiQuocGia(); ?>
</ul>
</li>   
<li class="dropdown"> <a href="javascript:void(0)">Năm <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php hienThiNam(); ?>
</ul>
</li>   
<li> <a title="Phim Lẻ" href="?layout=chuyenmuc&phimle">Phim Lẻ</a></li>
<li> <a title="Phim Bộ" href="?layout=chuyenmuc&phimbo">Phim Bộ</a></li>
<li> <a href="?layout=chuyenmuc&quocgia=viet-nam" title="Phim Việt Nam">Phim Việt Nam</a></li>
<li> <a href="?layout=chuyenmuc&topimdb" title="Phim TOP IMDb" class="napvip">TOP IMDb</a> </li>
</ul>
</div>

<ul class="nav navbar-nav navbar-right custom-search">
<li>
<form class="navbar-form" enctype="application/x-www-form-urlencoded" role="search" id="search-block" method="get" action="view/User/xuly_tk.php">
<div class="form-group search-form-group">
<input type="text" class="form-control" id="query_search" placeholder="Search" name="q" maxlength="100" autocomplete="off">
<button type="submit" class="btn btn-default" id="btn-search"> <i class="fa fa-search"></i> </button>
</div>
<div class="search-hint" id="search-hint"> </div>
</form>


<button type="button" class="nut-dangnhap" onclick="javascript:window.location=&#39;https://bomtanhd.net/thanh-vien/dang-nhap.html&#39;"> Đăng nhập </button>
</li>
</ul>
</div>

</nav>

<div class="container khoi-body">
<div class="khoi-trai" style="overflow:hidden">
  
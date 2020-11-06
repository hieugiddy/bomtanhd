<div class="body-page ">

<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid navbar-top">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
<a title="Phim Mới, Phim Hay, Phim HD, Phim Rạp, Phim Miễn Phí" class="navbar-brand" href="/"><img src="https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Bongngotv_config/bomtanhd.png" alt="BomTanHD" style="width:125px !important;margin-top:5px"> </a>
</div>

<div class="collapse navbar-collapse col-md-9" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="dropdown"> <a href="javascript:void(0)">Thể Loại <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php
include('controler/TheLoaiController.php');
hienThiTheLoai();
?>
</ul>
</li>
<li class="dropdown"> <a href="javascript:void(0)">Quốc Gia <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li> <a class="label-name" href="/au-my">Âu Mỹ</a> </li>
<li> <a class="label-name" href="/trung-quoc">Trung Quốc</a> </li>
<li> <a class="label-name" href="/han-quoc">Hàn Quốc</a> </li>
<li> <a class="label-name" href="/nhat-ban">Nhật Bản</a> </li>
<li> <a class="label-name" href="/hong-kong">Hồng Kông</a> </li>
<li> <a class="label-name" href="/thai-lan">Thái Lan</a> </li>
<li> <a class="label-name" href="/phim-an-do">Phim Ấn Độ</a> </li>
</ul>
</li>
<li class="dropdown"> <a href="javascript:void(0)">Diễn Viên <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li> <a class="label-name" href="/chau-tinh-tri">Châu Tinh Trì</a> </li>
<li> <a class="label-name" href="/ly-lien-kiet">Lý Liên Kiệt</a> </li>
<li> <a class="label-name" href="/chung-tu-dan">Chung Tử Đan</a> </li>
<li> <a class="label-name" href="/ngo-kinh">Ngô Kinh</a> </li>
<li> <a class="label-name" href="/luong-trieu-vy">Lương Triều Vỹ</a> </li>
<li> <a class="label-name" href="/chau-nhuan-phat">Châu Nhuận Phát</a> </li>
<li> <a class="label-name" href="/canh-diem">Cảnh Điềm</a> </li>
<li> <a class="label-name" href="/co-thien-lac">Cổ Thiên Lạc</a> </li>
<li> <a class="label-name" href="/duong-mich">Dương Mịch</a> </li>
<li> <a class="label-name" href="/hoang-phi-hong">Hoàng Phi Hồng</a> </li>
<li> <a class="label-name" href="/hong-kim-bao">Hồng Kim Bảo</a> </li>
<li> <a class="label-name" href="/luong-gia-huy">Lương Gia Huy</a> </li>
<li> <a class="label-name" href="/luu-duc-hoa">Lưu Đức Hoa</a> </li>
<li> <a class="label-name" href="/thanh-long">Thành Long</a> </li>
<li> <a class="label-name" href="/truong-ve-kien">Trương Vệ Kiện</a> </li>
<li> <a class="label-name" href="/huynh-hieu-minh">Huỳnh Hiểu Minh</a> </li>
</ul>
</li>
<li> <a title="Phim Lẻ" href="/phim-le/">Phim Lẻ</a></li>
<li> <a title="Phim Bộ" href="/phim-bo/">Phim Bộ</a></li>
<li> <a href="/phim-khac" title="Phim Việt Nam">Phim Việt Nam</a></li>
<li> <a href="/phim-le" title="TV Show">TV Show</a></li>
<li> <a href="#" title="Phim TOP IMDb" class="napvip">TOP IMDb</a> </li>
</ul>
</div>

<ul class="nav navbar-nav navbar-right custom-search">
<li>
<form class="navbar-form" enctype="application/x-www-form-urlencoded" role="search" id="search-block" method="get" action="/search">
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
  
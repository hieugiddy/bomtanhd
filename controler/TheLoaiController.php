<?php
function hienThiTheLoai(){
    $dstheloai= new TheLoai();
    foreach ($dstheloai->getTatCaTheLoai() as $value) {
        $ten=$value->getTenTL();
        $slug=$value->getSlug();
        echo '<li> <a class="label-name" href="?layout=chuyenmuc&maTL='.$slug.'">'.$ten.'</a> </li>';
    } 
}
function hienThiChiTietTheLoai($slug){
    $dstheloai= new TheLoai();
    $theloai=$dstheloai->getChiTietTheLoai($slug);
    return $theloai;
}
?>
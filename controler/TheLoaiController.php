<?php
function hienThiTheLoai(){
    include('model/theloai.php');
    $dstheloai= new TheLoai();
    foreach ($dstheloai->getTheLoai() as $value) {
        $ten=$value->getTenTL();
        $slug=$value->getSlug();
        echo '<li> <a class="label-name" href="?layout=chuyenmuc&maTL='.$slug.'">'.$ten.'</a> </li>';
    } 
}

?>
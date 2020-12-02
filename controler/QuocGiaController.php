<?php
function hienThiQuocGia(){
    include('model/quocgia.php');
    $dsquocgia= new QuocGia();
    foreach ($dsquocgia->getTatCaQuocGia() as $value) {
        $ten=$value->getTen();
        $slug=$value->getSlug();
        echo '<li> <a class="label-name" href="?layout=chuyenmuc&quocgia='.$slug.'">'.$ten.'</a> </li>';
    } 
    $conn=null;
}
function hienThiChiTietQuocGia($slug){
    $cmdquocgia= new QuocGia();
    $quocgia=$cmdquocgia->getChiTietQuocGia($slug);
    return $quocgia;
}
?>
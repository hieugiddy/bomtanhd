<?php
function hienThiQuocGia(){
    include('model/quocgia.php');
    $dsquocgia= new QuocGia();
    foreach ($dsquocgia->getQuocGia() as $value) {
        $ten=$value->getTen();
        $slug=$value->getSlug();
        echo '<li> <a class="label-name" href="?layout=chuyenmuc&quocgia='.$slug.'">'.$ten.'</a> </li>';
    } 
}
?>
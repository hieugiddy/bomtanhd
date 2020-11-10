<?php
function hienThiNam(){
    include('model/year.php');
    $nam= new Year();
    foreach ($nam->getYears() as $value) {
        $year=$value->getYear();
        echo '<li> <a class="label-name" href="?layout=chuyenmuc&year='.$year.'">'.$year.'</a> </li>';
    } 
}

?>
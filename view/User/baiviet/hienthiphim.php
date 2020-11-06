<?php
include('../connect.php');
echo '<div class="card xem">
        <div class="card-body">';
$linkxem=$conn->prepare('select tenhienthi,link from linkphim where maSP='.$_GET['id'].' and loai="xem" and server="'.$_GET['server'].'" order by ngaythem ASC');
$linkxem->execute();
$i=1;
while($row1=$linkxem->fetch(PDO::FETCH_ASSOC)){
  if($i==1){
     echo '<a class="btn mr-2 mt-2 tablinks active" id="defaultOpen" onclick="openCity(event,\''.$row1['link'].'\')">'.$row1['tenhienthi'].'</a>';
     $i=0;
   }
  else  echo '<a class="btn mr-2 mt-2 tablinks" onclick="openCity(event,\''.$row1['link'].'\')">'.$row1['tenhienthi'].'</a>';
}
 echo '</div>
</div><br/>';
$conn=null;
?>
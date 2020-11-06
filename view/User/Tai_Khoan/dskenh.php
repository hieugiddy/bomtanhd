<?php
include('./Theme/connect.php');
$listkenh=$conn->prepare('select * from youtubechanel where username="'.$_COOKIE['user'].'" order by id DESC');
$listkenh->execute();
if($listkenh->rowCount()>0){
    echo '<div class="table-responsive-sm"><table class="table table-striped table-sm">
   <thead>
      <tr>
         <th>ID Kênh</th>
         <th></th>
      </tr>
   </thead>
   <tbody>';
   		while ($row=$listkenh->fetch(PDO::FETCH_ASSOC)) {
   			echo '
				<tr>
			         <td><a href="https://youtube.com/channel/'.$row['link'].'" target="_blank">'.$row['link'].'</a></td>
			         <td>
			         	<button onclick="xoa(\''.$row['id'].'\')" class="btn btn-primary"><i class="fa fa-trash mr-1"></i>Xóa</button>
			         </td>
			      </tr>
   			';
   		}

      
echo '</tbody>
</table></div>';
}
else
    echo 'Bạn chưa từng thêm kênh Youtube nào - Vui thêm ngay';
?>

<script>
  function xoa(id){
      $('#listkenh').html("Đang xóa...");
      $.ajax({
          url : "/Theme/Tai_Khoan/xoakenh.php",
          type : "get",
          dataType:"text",
          data : {
               id : id
          },
          success : function (result){
              $('#listkenh').html(result);
          }
      });
  }

</script>
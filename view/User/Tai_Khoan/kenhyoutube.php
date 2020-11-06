<?php
if(isset($_COOKIE['user'])){
   echo ' <div id="listkenh" style="height:230px;overflow:auto" class="style-1">
        ';
    include('./Theme/Tai_Khoan/dskenh.php');
    echo '</div><br/>';
    echo '<input type="text" id="linkkenh" placeholder="Nhập ID Kênh Của Bạn..." style="font-size:14px;padding:5px;width:100%"/><br/><small>VD: https://www.youtube.com/channel/<font color="red">UCWbB1LAy3A5h7YbWuxcN6ow</font> (<em>với UCWbB1LAy3A5h7YbWuxcN6ow là ID của kênh</em>)</small><button class="btn btn-success mx-auto d-block mt-3" onclick="themkenh()">(+) Thêm kênh</button>';
}
else{
    echo '<script>location.href="/"</script>';
}
?>

<script>
  function themkenh(){
    var id=document.getElementById('linkkenh');
    $('#listkenh').html("Đang thêm...");
      $.ajax({
          url : "/Theme/Tai_Khoan/themkenh.php",
          type : "get",
          dataType:"text",
          data : {
               id : id.value
          },
          success : function (result){
              $('#listkenh').html(result);
          }
      });
  }

</script>
<?php
if(isset($_COOKIE['user'])){
   echo ' <div id="dslist" style="height:230px;overflow:auto" class="style-1">
        ';
    include('./Theme/Tai_Khoan/dsplay.php');
    echo '</div><br/>';
    echo '<input type="text" id="linkplaylist" placeholder="Nhập ID Playlist Của Bạn..." style="font-size:14px;padding:5px;width:100%"/><br/><small>VD: https://youtube.com/playlist?list=<font color="red">PLhw7sFhmbou4w5QBenPz2tpP5mTJfJum3</font> (<em>với PLhw7sFhmbou4w5QBenPz2tpP5mTJfJum3 là ID của Playlist</em>)</small><button class="btn btn-success mx-auto d-block mt-3" onclick="themlist()">(+) Thêm Playlist</button>';
}
else{
    echo '<script>location.href="/"</script>';
}
?>

<script>
  function themlist(){
    var id=document.getElementById('linkplaylist');
     $('#dslist').html("Đang thêm...");
      $.ajax({
          url : "/Theme/Tai_Khoan/themlist.php",
          type : "get",
          dataType:"text",
          data : {
               id : id.value
          },
          success : function (result){
              $('#dslist').html(result);
          }
      });
  }

</script>
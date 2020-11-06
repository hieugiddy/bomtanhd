<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style>
    body::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
    } 
    body::-webkit-scrollbar-thumb {
        background-color: #777;
    }
    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }
    #theloaiccon td button,#theloaichinh .xoa{
      border: 1px solid #f1f1f1;
      background: #fff;
      padding: 5px 7px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.5s
    }
    #theloaicon td button:hover{
      background: #900;
      color: #fff
    }
	</style>
</head>
<body>
<div id="kq"></div>
	<table class="table table-striped" id="theloaiccon">
   <thead>
      <tr>
         <th>Tên Server</th>
         <th>Tập phim</th>
         <th>Link Nhúng</th>
         <th>Loại</th>
         <th></th>
      </tr>
   </thead>
  <?php
  include('../connect.php');
	 $xuattlc = $conn->prepare("select * from linkphim where maSP='".$_GET['id']."' order by ngaythem DESC");
           $xuattlc->execute();
           $i=1;
	 while($rs = $xuattlc->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
      		echo "<td id='server_a".$i."'>".$rs["server"]."</td>";
                echo "<td id='tenhienthi_a".$i."'>".$rs["tenhienthi"]."</td>";
                echo "<td id='link_a".$i."'>".$rs["link"]."</td>";
                echo "<td id='loai_a".$i."'>".$rs["loai"]."</td>";
  ?>

      	<td>

	         <button id='luua<?php echo $i;?>' onclick="luu(<?php echo '\'a'.$i.'\',\''.$_GET['id'].'\'';?>)" style="display:none;background:green;color:#fff"><i class="fa fa-edit mr-1"></i>Lưu</button>
                 <button id='suaa<?php echo $i;?>' onclick="sua('a<?php echo $i;?>')"><i class="fa fa-edit mr-1"></i>Sửa</button>
	         <button><a class="xoa" href="xoalink.php?<?php echo 'maSP='.$_GET['id'].'&server='.$rs['server'].'&tenhienthi='.$rs['tenhienthi'].'&loai='.$rs['loai'];?>"><i class="fa fa-trash mr-1"></i>Xóa</a></button>

         </td>
         <?php
      	echo "</tr>";
        $i++;
	}?>
</table>
</body>
<script>
  function sua(id){
    var link=document.getElementById("link_"+id);
    var lk=link.innerHTML;
    link.innerHTML="<input type='text' id='iplink_"+id+"' size='40' value='"+lk+"'/>";
    var nutsua=document.getElementById("sua"+id);
    var nutluu=document.getElementById("luu"+id);
    nutsua.style.display="none";
    nutluu.style.display="inline";
  }
  function luu(id,ma){
    var server=document.getElementById("server_"+id);
    var tenhienthi=document.getElementById("tenhienthi_"+id);
    var loai=document.getElementById("loai_"+id);
    var link=document.getElementById("iplink_"+id);
      $.ajax({
          url : "/Admin/chucnang/sanpham/sualink.php",
          type : "get",
          dataType:"text",
          data : {
               maSP : ma,
               server: server.innerHTML,
               tenhienthi: tenhienthi.innerHTML,
               link: link.value,
               loai: loai.innerHTML
          },
          success : function (result){
              $('#kq').html(result);
              location.href="/Admin/chucnang/sanpham/xemlink.php?id="+ma;
          }
      });
  }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script language="javascript" src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</html>

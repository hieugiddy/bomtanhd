<?php
	include('./chucnang/connect.php');
        if($_COOKIE['quyenhan']!=1){
                if(isset($_GET['tim'])){
                        $cmd1='select count(maSP) from sanpham where tenSP like "%'.$_GET['tim'].'%" and username="'.$_COOKIE['user'].'"';
                        $cmd2='select chitietsanpham.maSP,tenSP,tenTL,uutien,soluong,hot,kieu from chitietsanpham,sanpham,theloai where chitietsanpham.maSP=sanpham.maSP and sanpham.maTL=theloai.maTL and username="'.$_COOKIE['user'].'" and tenSP like "%'.$_GET['tim'].'%" order by chitietsanpham.maSP DESC ';
                }
                else{
                        $cmd1='select count(maSP) from sanpham where username="'.$_COOKIE['user'].'"';
                        $cmd2='select chitietsanpham.maSP,tenSP,tenTL,uutien,soluong,hot,kieu from chitietsanpham,sanpham,theloai where chitietsanpham.maSP=sanpham.maSP and sanpham.maTL=theloai.maTL and username="'.$_COOKIE['user'].'" order by chitietsanpham.maSP DESC ';
                }
        }
        else{
                if(isset($_GET['tim'])){
                        $cmd1='select count(maSP) from sanpham where tenSP like "%'.$_GET['tim'].'%"';
                        $cmd2='select chitietsanpham.maSP,tenSP,tenTL,uutien,soluong,hot,kieu from chitietsanpham,sanpham,theloai where chitietsanpham.maSP=sanpham.maSP and sanpham.maTL=theloai.maTL and tenSP like "%'.$_GET['tim'].'%" order by chitietsanpham.maSP DESC ';
                }
                else{
                        $cmd1='select count(maSP) from sanpham';
                        $cmd2='select chitietsanpham.maSP,tenSP,tenTL,uutien,soluong,hot,kieu from chitietsanpham,sanpham,theloai where chitietsanpham.maSP=sanpham.maSP and sanpham.maTL=theloai.maTL order by chitietsanpham.maSP DESC ';
                }
        }
	
	/* tìm tổng số sản phẩm*/
	$tongso_sp=$conn->prepare($cmd1);
	$tongso_sp->execute();
	$soSP=$tongso_sp->fetchcolumn();
	/*tính số trang*/
	$limit=12;/*số lượng sản phẩm sẽ hiển thị trên 1 trang*/
	$tongsotrang=ceil($soSP/$limit);
	if(isset($_GET['page']))
		$start=(((int) $_GET['page'])-1)*$limit;/*tính vị trí của sản phẩm đầu tiên sẽ hiển thị trong trang thứ X*/
	else
		$start=0;/*th trang x=1 - trang 1 nên hiển thị từ sản phẩm thứ 0*/
	
	$sanpham=$conn->prepare($cmd2.' limit '.$start.','.$limit);/*tiến hành lấy danh sách sản phẩm với số lương đc limit theo số trang*/
	$sanpham->execute();
?>
<h4><i class="fa fa-list mr-2 my-3"></i>Danh sách bài viết</h4>
<div id="theloaichinh" class="col-12">
<button class="btn my-3 bg-dark text-light" onclick="themsanpham()">(+) Thêm bài viết</button>
<form action="./chucnang/sanpham/tim.php" style="float: right">
	<input type="text" placeholder="Nhập tên bài viết cần tìm..." value="<?php if(isset($_GET['tim'])) echo $_GET['tim']; ?>" size="60" name="tim" />
</form>
<div class="table-responsive">
<table class="table table-striped table-light">
   <thead>
      <tr>
         <th>Tên bài viết</th>
         <th>Thể loại</th>
         <th>Độ ưu tiên</th>
         <th>Lượt xem</th>
         <th>Nổi bật</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
   	<?php
   		while ($row=$sanpham->fetch(PDO::FETCH_ASSOC)) {
   			($row['hot']==1)?($noibat='Có'):($noibat='Không');
   			echo '
				<tr>
			      	 <td><a href="/?Layout=baiviet&id='.$row['maSP'].'" target="_blank">'.$row['tenSP'].'</a></td>
			         <td>'.$row['tenTL'].'</td>
					 <td>'.$row['uutien'].'</td>
					 <td>'.$row['soluong'].'</td>
					 <td>'.$noibat.'</td>
			         <td>';
                                        echo '<button data-toggle="modal" data-target="#Model_phim" onclick="listphim(\''.$row['maSP'].'\',\''.$row['kieu'].'\')"><i class="fa fa-list mr-1"></i>List Link</button>&nbsp;';
                                        echo '<button onclick="sua(\''.$row['maSP'].'\')"><i class="fa fa-edit mr-1"></i>Sửa</button>
			         	<button onclick="xoa(\''.$row['maSP'].'\')"><i class="fa fa-trash mr-1"></i>Xóa</button>
			         </td>
			      </tr>
   			';
   		}
   	?>
      
   </tbody>
</table></div>
</div><br>

<?php
	if($tongsotrang!=1){/*nếu có hơn 1 trang thì mới hiển thị phân trang*/
		echo '<center><div class="phantrang mt-5">';
		for($i=1;$i<=$tongsotrang;++$i){
			if(!isset($_GET['page']))
				$tmp=1;/*nếu ko tồn tại tham số $_GET['page'] thì tức ta đang ở trang 1*/
			else
				$tmp=$_GET['page'];/*nếu tồn tại thì gán = số trang ta đang tham chiếu*/

			if($i==$tmp){/*nếu $i = số trang đang tham chiếu đến*/
				echo '<span>'.$tmp.'</span>';/*thì hiển thị số trang theo thẻ span*/
			}
			else/*ngược lại hiển thị số trang theo thẻ a*/
				if(isset($_GET['tim']))
					echo '<a href="?menu=sanpham&tim='.$_GET['tim'].'&page='.$i.'">'.$i.'</a>'; 
				else
					echo '<a href="?menu=sanpham&page='.$i.'">'.$i.'</a>'; 
		}						
		echo '</div></center><br/><br/>';
	}
?>
<div class="modal" id="Model_phim">
 <div class="modal-dialog">
    <div class="modal-content" style="width: 1100px;margin: auto;max-width: 100%">
       <!-- Modal Header -->
       <div class="modal-header">
          <h4 class="modal-title">Danh sách tập phim</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <!-- Modal body -->
       <div class="modal-body">
       		<input type="hidden" id="maSP" value="">
		<input type="hidden" id="tensv" size="15" value="" placeholder="Tên Server..." />
                <input type="text" id="tapphim" size="15" value="" placeholder="Tập Phim..." />
                <input type="text" id="linktapp" size="15" value="" placeholder="Link Embed..." />
                <select id="loai" onchange="doiloai(this)">
                   <option value="trailer">Trailer/Video Clip</option>
                   <option value="dinhkem">File đính kèm</option>
                </select>
		<button class="btn btn-primary ml-3" onclick="themtap();">Thêm</button>
                <div id="te"></div>
	</br>
		<iframe src="" frameborder="0" id="danhsach-link" width="100%" height="300px"></iframe>
       </div>
       <!-- Modal footer -->
       <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
    </div>
 </div>
</div>
<script>
	function themsanpham(){
		location.href='?menu=sanpham&them';
	}
	function xoa(id){
		location.href='/Admin/chucnang/sanpham/xoa.php?maSP='+id;	
	}
	function sua(id){
		location.href='?menu=sanpham&sua&maSP='+id;
	}
        function listphim(id,kieu){
		var ds=document.getElementById('danhsach-link');
		var maSP=document.getElementById('maSP');
                var loai=document.getElementById('loai');
                if(kieu=="phimanh")
                 loai.innerHTML="<option value=\"trailer\">Trailer/Video Clip</option><option value=\"xem\">Link xem</option><option value=\"tai\">Link tải</option><option value=\"dinhkem\">File đính kèm</option>";
                else
                 loai.innerHTML="<option value=\"trailer\">Trailer/Video Clip</option><option value=\"dinhkem\">File đính kèm</option>";
                maSP.value=id;
		ds.src="./chucnang/sanpham/xemlink.php?id="+id;
	}
        function doiloai(obj){
           var loai=obj.value;
            var server=document.getElementById("tensv");
            var tenhienthi=document.getElementById("tapphim");
            var link=document.getElementById("linktapp");
            server.value="";
            tenhienthi.value="";
            link.value="";
           
           if(loai=="trailer"){
              server.type="hidden";
              tenhienthi.placeholder="Tên video...";
              link.placeholder="Link Embed";
           }
           else{
              if(loai=="dinhkem"){
                server.type="hidden";
              tenhienthi.type="text";
                tenhienthi.placeholder="Tên File";
                link.placeholder="Link File";
               }
               else{
               tenhienthi.placeholder="Tập phim";
                link.placeholder="Link...";
              server.type="text";
              tenhienthi.type="text";     
}
}
        }
        function themtap(){
            var maSP=document.getElementById("maSP");
            var server=document.getElementById("tensv");
            var tenhienthi=document.getElementById("tapphim");
            var link=document.getElementById("linktapp");
            var loai=document.getElementById("loai");
              $.ajax({
                  url : "/Admin/chucnang/sanpham/themlink.php",
                  type : "get",
                  dataType:"text",
                  data : {
                       maSP: maSP.value,
                       server: server.value,
                       tenhienthi: tenhienthi.value,
                       link: link.value,
                       loai: loai.value
                  },
                  success : function (result){
                       document.getElementById('danhsach-link').src="./chucnang/sanpham/xemlink.php?id="+maSP.value;
                  }
              });
          }
</script>
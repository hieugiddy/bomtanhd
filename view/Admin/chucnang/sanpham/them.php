<?php
	include('./chucnang/connect.php');
	$theloai=$conn->prepare('select * from theloai');
	$theloai->execute();
?>
<h4><i class="fa fa-edit mr-2 my-3"></i>Thêm bài viết mới</h4>
<form action="chucnang/sanpham/xulythem.php" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-9">
			<label>Tiêu đề:</label>
			 <input type="text" value="" name="tensp" size="60" required/>
			 
			 <label class="ml-3 mr-2">Chuyên mục:</label>
			 <select name="chontl" id="theloai" onchange="load_tlc(this)">
			 	<option value="">---Chọn chuyên mục---</option>
			 	<?php 
			 		while($row=$theloai->fetch(PDO::FETCH_ASSOC)){
			 			echo '<option value="'.$row['maTL'].'">'.$row['tenTL'].'</option>';
			 		}
			 	?>
			 </select><br>
			 
			 <label>Ảnh bài viết (Tải lên):</label>
			 <input type="file" name="image" accept="image/jpeg,image/png"/><br/>
                         <label>Hoặc Dán link:</label>
                         <input type="text" name="linkhinh" value="" size="50"/><br>
			 <input type="hidden" value="0" name="soluong" required/>
                         <br>
			 <label>Mô tả ngắn:</label><br/>
			 <textarea placeholder="Tóm tắt..." style="height:230px;width:100%" name="motangan" cols="" rows="" required></textarea><br/><br/>
                         
			 <label>Từ khóa:</label>
			 <input type="text" placeholder="Từ khóa cách nhau bởi dấu phẩy" name="tukhoa" style="width:100% !important" size="" required/><br/>
                         
                         <input type="checkbox" name="phimanh" class="mt-4"/>Đây là 1 bộ phim
			 <br><br/>
			 <h5>Nội dung bài viết:</h5>
			 <textarea name="mota" cols="" rows="" required></textarea>
				<script>
				        
                                        CKEDITOR.replace('mota',{
                                             filebrowserImageBrowseUrl: '/Admin/chucnang/sanpham/upload/index.php'
                                
                                        });
				</script>
				
		</div>
		<div class="col-md-3">
			<h4>Chuyên mục con</h4>
			<p id="chitiettheloai"> </p>
			<hr>
                        <?php 
                        if($_COOKIE['quyenhan']==1)
                        echo '
			<input type="checkbox" name="noibat" value="1"/>Hiển thị ở Sản Phẩm Nổi Bật<br>
			<label>- Độ ưu tiên:</label>
			<input type="number" name="uutien" value="0" style="width: 55px" min="0" max="100" required/>
			<br><em>(Độ ưu tiên càng cao thì càng được hiển thị lên đầu tiên)</em>';
                        

                        ?>
		</div>
	</div>
        <br/>
                <p><span><img src="https://1.bp.blogspot.com/-OdX0s-jjQGs/X0stTyrpVDI/AAAAAAAABJw/45eq0EGxzHgxdw-zQxXDi2B0s938fAVLQCNcBGAsYHQ/s23/full.png"/> Toàn màn hình</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-Q5az4sbJ1Gg/X0suTl9xV6I/AAAAAAAABJ8/0XbotlZ_dc8CIX5ZHhjeB1t-8wvn5Il4ACNcBGAsYHQ/s26/lk.png"/> Chèn link</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-V42l-fRUYPc/X0su_HwlkVI/AAAAAAAABKE/Qx0rd9iMbxcJ33Q2qCUeSahcIZ1iGf2qACNcBGAsYHQ/s38/mauchu.png"/> Màu chữ</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-_S2BDpfZXG0/X0svFTEMaVI/AAAAAAAABKI/82bgeLvD-WIfJ7GY4NSQmEQ2Bpxu1Xc2ACNcBGAsYHQ/s320/phantrang.png"/> Ngắt trang, phân trang</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-sj-0Vyv5qIk/X0svMUSoBvI/AAAAAAAABKM/8sAOtpCOtCcM5sTa3m0MTU7E-aR88-fVACNcBGAsYHQ/s25/saochpdd.png"/> Sao chép định dạng</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-5F1bpguAA30/X0svSn5Q78I/AAAAAAAABKU/oJ3qwDxuIlwFx_NpJ-k5GLab5-hjIkQZQCNcBGAsYHQ/s24/tad.png"/> Thụt lề</span></p>
	<br><br>
	<input type="submit" value="Đăng bài viết" class="btn bg-dark text-light" />
</form>

<script>
  function load_tlc(obj){
    var tl=obj.value;
      $.ajax({
          url : "/Admin/chucnang/sanpham/gettlc.php",
          type : "get",
          dataType:"text",
          data : {
               maTL : tl
          },
          success : function (result){
              $('#chitiettheloai').html(result);
          }
      });
  }
  </script>
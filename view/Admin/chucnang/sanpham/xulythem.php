<?php
        function thaythe($chuoi){
                $chuoi = str_replace('"', '&quot;', $chuoi);
                $chuoi = str_replace('\'', '&apos;', $chuoi);
                $chuoi = str_replace('∼', '\∼', $chuoi);
                $chuoi = str_replace('$', '\$', $chuoi);
                $chuoi = str_replace('{', '\{', $chuoi);
                $chuoi = str_replace('}', '\}', $chuoi);
                $chuoi = str_replace('!', '\!', $chuoi);
                $chuoi = str_replace(';', '\;', $chuoi);
                $chuoi = str_replace('|', '\|', $chuoi);
                $chuoi = str_replace('scontent-b-pao.xx.fbcdn.net', '&nbsp;', $chuoi);
                $chuoi = str_replace('000webhostapp', '&nbsp;', $chuoi);
                return $chuoi;
        }
        function thaythe1($chuoi){
                $chuoi = str_replace('\'', '&apos;', $chuoi);
                $chuoi = str_replace('scontent-b-pao.xx.fbcdn.net', '&nbsp;', $chuoi);
                $chuoi = str_replace('000webhostapp', '&nbsp;', $chuoi);
                return $chuoi;
        }
	if($_POST['chontl']=="")
		echo '
		<script>
			alert("Bạn chưa chọn Thể loại");
			history.back();
		</script>
		';
	else{
		include('../connect.php');
		// upload hinh anh
                

                $icon=$_FILES['image']['name'];//lấy tên file ảnh, để lấy được $_FILES thì form phải có  enctype="multipart/form-data"
                if ($icon!="") {
                if($_FILES["image"]["name"]!=NULL)
                {
                
                if($_FILES["image"]["type"]=="image/jpeg"
                ||$_FILES["image"]["type"]=="image/png"
                ||$_FILES["image"]["type"]=="image/gif"
                )
                {
                
                
                // kiem tra su ton tai cua file
                if (file_exists("img/" . $_FILES["image"]["name"])) 
                {
                echo $_FILES["image"]["name"]." file da ton tai. ";
                }
                
                else{
                
                $path = "img/"; // file luu vào thu muc chua file upload
                $tmp_name = $_FILES["image"]["tmp_name"];
                $name = date('dmYHis').str_replace(" ", "", basename($_FILES["image"]["name"]));
                $type = $_FILES['image']['type']; 
                $size = $_FILES['image']['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
                echo "File uploaded! <br />";
                echo "Tên file : ".$name."<br />";
                echo "Kieu file : ".$type."<br />";
                echo "File size : ".$size;
                $hinhanh='/Admin/chucnang/sanpham/img/'.$name;
                }
                }
                else {
                echo "file duoc chon khong hop le";
                }
                }
                else 
                {
                echo "vui long chon file";
                }
                    
                }
                else{
                        $hinhanh=$_POST['linkhinh'];
                 }


		$tensp=thaythe($_POST['tensp']);
		$maTL=$_POST['chontl'];
		$soluong=$_POST['soluong'];
		$mota=thaythe1($_POST['mota']);
                $tukhoa=thaythe($_POST['tukhoa']);
                $motangan=thaythe($_POST['motangan']);
		(isset($_POST['noibat']))?($hot=1):($hot=0);
		(isset($_POST['uutien']))?($uutien=$_POST['uutien']):($uutien=0);
                (isset($_POST['phimanh']))?($kieu='phimanh'):($kieu='baiviet');
		
		if(isset($_POST['maTLC']))
			$cmd='insert into sanpham(tenSP,maTL,maTLC,username,kieu) values("'.$tensp.'",'.$maTL.','.$_POST['maTLC'].',"'.$_COOKIE['user'].'","'.$kieu.'")';
		else
			$cmd='insert into sanpham(tenSP,maTL,username,kieu) values("'.$tensp.'",'.$maTL.',"'.$_COOKIE['user'].'","'.$kieu.'")';
		//chèn 1 dóng vào bảng sanpham
		$sanpham=$conn->prepare($cmd);
		$sanpham->execute();

		//lấy maSP của sản phẩm vừa chèn
		$run=$conn->prepare('select maSP from sanpham order by maSP DESC limit 1');
		$run->execute();
		$maSP=$run->fetchcolumn();

		//chèn 1 dòng vào bảng chitietsanpham
		$chitietsanpham=$conn->prepare('insert into chitietsanpham values('.$maSP.',\''.$mota.'\','.$soluong.',"'.$hinhanh.'",'.$hot.','.$uutien.',"'.$tukhoa.'","'.$motangan.'")');
		$chitietsanpham->execute();

		echo '<script>
				alert("Đăng bài thành công"); 
				location.href=\'/Admin/?menu=sanpham\';
			</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý thêm sản phẩm</title>
</head>
<body>
	
</body>
</html>
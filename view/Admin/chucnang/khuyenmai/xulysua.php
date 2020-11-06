<?php
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
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type']; 
        $size = $_FILES['image']['size']; 
        // Upload file
        move_uploaded_file($tmp_name,$path.$name);
        echo "File uploaded! <br />";
        echo "Tên file : ".$name."<br />";
        echo "Kieu file : ".$type."<br />";
        echo "File size : ".$size;
        $hinhanh='/Admin/chucnang/khuyenmai/img/'.$name;
        $khuyenmai=$conn->prepare('update khuyenmai set tenkm="'.$_POST['tenkm'].'",hinhanh="'.$hinhanh.'",noidung=\''.$_POST['mota'].'\' where stt='.$_POST['maKM']);
	$khuyenmai->execute();
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
                $khuyenmai=$conn->prepare('update khuyenmai set tenkm="'.$_POST['tenkm'].'",hinhanh="'.$hinhanh.'",noidung=\''.$_POST['mota'].'\' where stt='.$_POST['maKM']);
                $khuyenmai->execute();
         }

	

	echo '<script> 
			location.href=\'/Admin/?menu=khuyenmai\';
		</script>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý sửa khuyến mãi</title>
</head>
<body>
	
</body>
</html>
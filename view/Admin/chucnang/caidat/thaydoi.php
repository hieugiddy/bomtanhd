<?php
	include('../connect.php');
	// upload hinh anh favicon	
        $favicon_i=$_FILES['favicon']['name'];
        $logo_i=$_FILES['logo']['name'];
	if ($favicon_i!="") {
        if($_FILES["favicon"]["name"]!=NULL)
        {
        
        if($_FILES["favicon"]["type"]=="image/jpeg"
        ||$_FILES["favicon"]["type"]=="image/png"
        ||$_FILES["favicon"]["type"]=="image/gif"
        )
        {
        // kiem tra su ton tai cua file
        if (file_exists("img/" . $_FILES["favicon"]["name"])) 
        {
        echo $_FILES["favicon"]["name"]." file da ton tai. ";
        }
        
        else{
        
        $path = "img/"; // file luu vào thu muc chua file upload
        $tmp_name = $_FILES['favicon']['tmp_name'];
        $name = $_FILES['favicon']['name'];
        $type = $_FILES['favicon']['type']; 
        $size = $_FILES['favicon']['size']; 
        // Upload file
        move_uploaded_file($tmp_name,$path.$name);
        $favicon='/Admin/chucnang/caidat/img/'.$name;
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
		$favicon=$_POST['favicon_c'];
         }
         
         if ($logo_i!="") {
        if($_FILES["logo"]["name"]!=NULL)
        {
        
        if($_FILES["logo"]["type"]=="image/jpeg"
        ||$_FILES["logo"]["type"]=="image/png"
        ||$_FILES["logo"]["type"]=="image/gif"
        )
        {
        // kiem tra su ton tai cua file
        if (file_exists("img/" . $_FILES["logo"]["name"])) 
        {
        echo $_FILES["logo"]["name"]." file da ton tai. ";
        }
        
        else{
        
        $path = "img/"; // file luu vào thu muc chua file upload
        $tmp_name = $_FILES['logo']['tmp_name'];
        $name = $_FILES['logo']['name'];
        $type = $_FILES['logo']['type']; 
        $size = $_FILES['logo']['size']; 
        // Upload file
        move_uploaded_file($tmp_name,$path.$name);
        $logo='/Admin/chucnang/caidat/img/'.$name;
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
		$logo=$_POST['logo_c'];
         }
	

	
	$cmd='update info set tieude="'.$_POST['tieude'].'",mota="'.$_POST['mota'].'",tukhoa="'.$_POST['tukhoa'].'",favicon="'.$favicon.'",logo="'.$logo.'"';
	//update 1 dóng vào bảng sanpham
	$info=$conn->prepare($cmd);
	$info->execute();

         echo '<script>
			alert("Cập nhật thông tin thành công"); 
			location.href=\'/Admin/?menu=caidat\';
		</script>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xử lý sửa</title>
</head>
<body>
	
</body>
</html>
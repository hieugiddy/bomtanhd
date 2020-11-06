<?php
	include('../connect.php');
	// upload hinh anh	
	
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
	$cmd='insert into khuyenmai(tenkm,hinhanh,noidung) values("'.$_POST['tenkm'].'","'.$hinhanh.'",\''.$_POST['mota'].'\')';
	$sanpham=$conn->prepare($cmd);
	$sanpham->execute();
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
        

	echo '<script>
			location.href=\'/Admin/?menu=khuyenmai\';
		</script>';
?>
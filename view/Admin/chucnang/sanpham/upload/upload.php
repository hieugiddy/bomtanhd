<?php
if($_FILES["file"]["name"]!=NULL)
{

if($_FILES["file"]["type"]=="image/jpeg"
||$_FILES["file"]["type"]=="image/png"
||$_FILES["file"]["type"]=="image/gif"
)
{

// kiem tra su ton tai cua file
if (file_exists("../img/" . $_FILES["file"]["name"])) 
{
echo $_FILES["file"]["name"]." file da ton tai. ";
}

else{

$path = "../img/"; // file luu vào thu muc chua file upload
$tmp_name = $_FILES["file"]["tmp_name"];
$name = date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
$type = $_FILES['file']['type']; 
$size = $_FILES['file']['size']; 
// Upload file
move_uploaded_file($tmp_name,$path.$name);
$hinhanh='http://yeudw.com/Admin/chucnang/sanpham/img/'.$name;
echo '<script>location.href="/Admin/chucnang/sanpham/upload/?link='.$hinhanh.'";</script>';
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
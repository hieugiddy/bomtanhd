<?php
ob_start();
session_start();
include('model/database.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"/>
	<meta name="description" content="Phim hay"/>
	
	<meta name="keywords" content="phimmoi">
	<link rel="shortcut icon" type="image/png" href=""/>
	<title>BomTanHD</title>
	<?php include('view/User/head.php');?>
</head>
<body>
	<?php 
		include('view/User/header.php');
		include('view/User/routes.php');
	?>
<?php include('view/User/footer.php'); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php echo $data['page_name'];?></title>
	<meta name="description" content="<?php echo $data['info'][0]->mota; ?>">
	<meta name="author" content="<?php echo $data['info'][0]->tacgia; ?>">
	<meta name="keyword" content="<?php echo $data['info'][0]->tukhoa; ?>">
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	<?php require_once './mvc/views/Account/head.php';?>
		
		
</head>

<body>
	
	<?php 
		require_once './mvc/views/Account/'.$data['page'].'.php';
	?>
	<!-- end: JavaScript-->
	<?php require_once './mvc/views/Account/footer.php';?>
</body>
</html>

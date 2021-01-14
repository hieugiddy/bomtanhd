<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $data['info'][0]->tieude; ?></title>
	<meta name="description" content="<?php echo $data['info'][0]->mota; ?>">
	<meta name="author" content="<?php echo $data['info'][0]->tacgia; ?>">
	<meta name="keyword" content="<?php echo $data['info'][0]->tukhoa; ?>">
	<link rel="shortcut icon" href="<?php echo $data['info'][0]->favicon; ?>">
	<?php require_once './mvc/views/User/head.php';?>
</head>
<body>

	<?php 
		require_once './mvc/views/User/header.php';
		require_once './mvc/views/User/'.$data["page"].'.php';
		require_once './mvc/views/User/cotphai.php';
	?>
<?php require_once './mvc/views/User/footer.php'; ?>
</body>
</html>

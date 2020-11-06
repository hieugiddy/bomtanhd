<?php
$layout=$_GET['layout'];
switch ($layout) {
	case 'chuyenmuc':
		include('view/User/chuyenmuc.php');
		break;
	case 'xemphim':
		include('view/User/xemphim.php');
		break;
	case 'timkiem':
		include('view/User/timkiem.php');
		break;
	default:
		include('view/User/home.php');
		break;
}
?>
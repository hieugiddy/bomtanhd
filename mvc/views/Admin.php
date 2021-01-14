<!DOCTYPE html>
<html lang="vi">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php echo $data['info'][0]->tenweb; ?></title>
	<meta name="description" content="<?php echo $data['info'][0]->mota; ?>">
	<meta name="author" content="<?php echo $data['info'][0]->tacgia; ?>">
	<meta name="keyword" content="<?php echo $data['info'][0]->tukhoa; ?>">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	<?php require_once './mvc/views/Admin/head.php';?>


</head>

<body>
		<!-- start: Header -->
	<?php require_once './mvc/views/Admin/header.php';?>

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<?php require_once './mvc/views/'.$data['quyen'].'/Menu.php' ?>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<!-- start: Content -->
			<div id="content" class="span10">


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo $data['info'][0]->linkweb; ?>/Admin">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php echo $data['page_name']; ?></a></li>
			</ul>

			<?php 
				if(isset($_COOKIE['username'])){
					if($_COOKIE['quyen']==1)
						require_once './mvc/views/Admin/'.$data['page'].'.php';
					else
						echo '<script>location.href="'.$data['info'][0]->linkweb.'";</script>';
				}
				else
					echo '<script>location.href="'.$data['info'][0]->linkweb.'";</script>';
					
			?>



	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>

	<div class="clearfix"></div>
	<?php require_once './mvc/views/Admin/footer.php';?>
	

</body>
</html>

<?php
$arr=explode('/',$_SERVER['REQUEST_URI']);
$link='/'.$arr[1];
$username=$arr[4];
?>
<div class="container-fluid-full">
<div class="row-fluid">
		
<div class="row-fluid">
	<div class="login-box">
		<div class="icons">
			<a href="<?php echo $data['info'][0]->linkweb; ?>"><i class="halflings-icon home"></i></a>
			<a href="#"><i class="halflings-icon cog"></i></a>
		</div>
		<h2><?php echo $data['page_name'];?></h2>
		<form class="form-horizontal" method="post" action="<?php echo $link;?>/ThanhVien/newPass">
			<fieldset>
                <input name="username" value="<?php echo $username; ?>" type="hidden" required/>
				<div class="input-prepend" title="Emial">
					<span class="add-on"><i class="halflings-icon lock"></i></span>
					<input class="input-large span10" name="password" id="password" type="password" placeholder="Nhập password mới..." required/>
				</div>
				<div class="clearfix"></div>

				<center><button type="submit" class="btn btn-primary">Lưu</button></center>
				<div class="clearfix"></div>
		</form>
			
	</div><!--/span-->
</div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->
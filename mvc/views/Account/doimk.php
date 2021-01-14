<div class="container-fluid-full">
<div class="row-fluid">
		
<div class="row-fluid">
	<div class="login-box">
		<div class="icons">
			<a href="<?php echo $data['info'][0]->linkweb; ?>"><i class="halflings-icon home"></i></a>
			<a href="#"><i class="halflings-icon cog"></i></a>
		</div>
		<h2><?php echo $data['page_name'];?></h2>
		<form class="form-horizontal" method="post" action="../ThanhVien/doiMK">
			<fieldset>
				<div class="input-prepend" title="Username">
					<span class="add-on"><i class="halflings-icon lock"></i></span>
					<input class="input-large span10" name="mkcu" id="mkcu" type="password" placeholder="Nhập mật khẩu cũ..." required/>
				</div>
				<div class="input-prepend" title="Emial">
					<span class="add-on"><i class="halflings-icon lock"></i></span>
					<input class="input-large span10" name="mkmoi" id="mkmoi" type="password" placeholder="Nhập mật khẩu mới..." required/>
				</div>
				<div class="clearfix"></div>

				<center><button type="submit" class="btn btn-primary">Thay đổi</button></center>
				<div class="clearfix"></div>
		</form>
			
	</div><!--/span-->
</div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->
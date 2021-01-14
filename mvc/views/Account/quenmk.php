<div class="container-fluid-full">
<div class="row-fluid">
		
<div class="row-fluid">
	<div class="login-box">
		<div class="icons">
			<a href="<?php echo $data['info'][0]->linkweb; ?>"><i class="halflings-icon home"></i></a>
			<a href="#"><i class="halflings-icon cog"></i></a>
		</div>
		<h2><?php echo $data['page_name'];?></h2>
		<form class="form-horizontal" method="post" action="../ThanhVien/quenMK">
			<fieldset>
				<div class="input-prepend" title="Username">
					<span class="add-on"><i class="halflings-icon user"></i></span>
					<input class="input-large span10" name="username" id="username" type="text" placeholder="Nhập username..." required/>
				</div>
				<div class="input-prepend" title="Emial">
					<span class="add-on"><i class="halflings-icon envelope"></i></span>
					<input class="input-large span10" name="email" id="email" type="text" placeholder="Nhập email..." required/>
				</div>
				<div class="clearfix"></div>

				<center><button type="submit" class="btn btn-primary">Gửi yêu cầu</button></center>
				<div class="clearfix"></div>
		</form>
			
	</div><!--/span-->
</div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->
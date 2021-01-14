<div class="container-fluid-full">
<div class="row-fluid">
		
<div class="row-fluid">
	<div class="login-box">
		<div class="icons">
			<a href="<?php echo $data['info'][0]->linkweb; ?>"><i class="halflings-icon home"></i></a>
			<a href="#"><i class="halflings-icon cog"></i></a>
		</div>
		<h2><?php echo $data['page_name'];?></h2>
		<form class="form-horizontal" method="post" action="./ThanhVien/dangNhap">
			<fieldset>
				
				<div class="input-prepend" title="Username">
					<span class="add-on"><i class="halflings-icon user"></i></span>
					<input class="input-large span10" name="username" id="username" type="text" placeholder="type username" required/>
				</div>
				<div class="clearfix"></div>

				<div class="input-prepend" title="Password">
					<span class="add-on"><i class="halflings-icon lock"></i></span>
					<input class="input-large span10" name="password" id="password" type="password" placeholder="type password" required/>
				</div>
				<div class="clearfix"></div>
				
				<label class="remember" for="remember"><input name="remember" type="checkbox" id="remember" />Remember me</label>

				<div class="button-login">	
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
				<div class="clearfix"></div>
		</form>
		<hr>
		<a href="./Account/QuenMK"><h3>Quên Password?</h3></a>
		<p>
			Chưa có tài khoản, <a href="./Account/DangKy">click đây</a> để tạo mới tài khoản.
		</p>	
	</div><!--/span-->
</div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->
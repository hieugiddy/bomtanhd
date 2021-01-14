<div class="container-fluid-full">
<div class="row-fluid">
		
<div class="row-fluid">
	<div class="login-box">
		<div class="icons">
			<a href="<?php echo $data['info'][0]->linkweb; ?>"><i class="halflings-icon home"></i></a>
			<a href="#"><i class="halflings-icon cog"></i></a>
		</div>
		<h2><?php echo $data['page_name'];?></h2>
		<p id="checkUS"></p>
		<form enctype="multipart/form-data" class="form-horizontal" method="post" action="../ThanhVien/editThanhVien">
		<fieldset>
			<input type="hidden" name="dangky-tk"/>
				<div class="input-prepend" title="Username">
					<span class="add-on"><i class="halflings-icon user"></i></span>
					<input class="input-large span10" name="username" id="username" type="text" placeholder="Username..." required/>
				</div>
                <div class="input-prepend" title="tenTV">
					<span class="add-on"><i class="halflings-icon user"></i></span>
					<input class="input-large span10" name="tenTV" id="tenTV" type="text" placeholder="Tên thành viên..." required/>
				</div>
				<div class="input-prepend" title="matkhau">
					<span class="add-on"><i class="halflings-icon lock"></i></span>
					<input class="input-large span10" name="matkhau" id="matkhau" type="password" placeholder="Password..." required/>
				</div>
				<div class="input-prepend" title="again-matkhau">
					<span class="add-on"><i class="halflings-icon lock"></i></span>
					<input class="input-large span10" name="again-matkhau" id="again-matkhau" type="password" placeholder="Nhập lại Password..." required/>
				</div>
				<input type="hidden" value="https://i.pinimg.com/originals/72/eb/b6/72ebb6e15a76ac319e7275d8cb2d6626.jpg" name="avatar-link" id="avatar"/>
				<input style="display:none" name="avatar" type="file"/>

				<div class="input-prepend" title="tenTV">
					<span class="add-on"><i class="halflings-icon envelope"></i></span>
					<input class="input-large span10" name="email" id="email" type="text" placeholder="Email..." required/>
				</div>
				<input type="hidden" value="Xin chào đại gia đình BomTanHD..." class="span10 typeahead" name="gioiThieu" id="gioiThieu">
                <ul style="margin:0 0 40px 50px; ">
                    <li>Mật khẩu phải có độ dài tối thiểu 8 kí tự</li>
                    <li>Mật khẩu của bạn phải chứa ít nhất 1 số</li>
                    <li>Mật khẩu của bạn phải bắt đầu bằng chữ cái hoa</li>
                    <li>Mật khẩu của bạn phải chứa ít nhất 1 chữ cái thường</li>
                </ul>
                <center>
                <button type="submit" name="btn-themthanhvien" class="btn btn-danger">Đăng ký</button>
                </center>
                
            </fieldset>
		</form>
		<hr>
		<p>
			Đã có tài khoản, <a href="../Account">click đây</a> để đăng nhập.
		</p>	
	</div><!--/span-->
</div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->

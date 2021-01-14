<div class="container-fluid-full">
<div class="row-fluid">
		
<div class="row-fluid">
	<div class="login-box">
		<div class="icons">
			<a href="<?php echo $data['info'][0]->linkweb; ?>"><i class="halflings-icon home"></i></a>
			<a href="#"><i class="halflings-icon cog"></i></a>
		</div>
		<h2><?php echo $data['page_name'];?></h2>
		<form class="form-horizontal" method="post" action="../ThanhVien/EditProfile" enctype="multipart/form-data">
			<fieldset>
                <center>
                    <img src="<?php echo $data['taikhoan']->avatar; ?>" alt="" id="avatar-img" width="100px"/><br><br>
                    <input class="input-file uniform_on" id="fileInput" accept="image/jpeg,image/png" name="avatar" type="file" style="margin-left:20px"/>
                </center>
                <div class="input-prepend" title="avatar-link">
					<span class="add-on"><i class="halflings-icon camera"></i></span>
					<input type="text" class="span10 typeahead" value="<?php echo $data['taikhoan']->avatar; ?>" name="avatar-link" id="avatar"/>
				</div>
				<div class="input-prepend" title="tenTV">
					<span class="add-on"><i class="halflings-icon user"></i></span>
					<input class="input-large span10" name="tenTV" id="tenTV" type="text" value="<?php echo $data['taikhoan']->ten; ?>" required/>
				</div>
				<div class="input-prepend" title="email">
					<span class="add-on"><i class="halflings-icon envelope"></i></span>
					<input class="input-large span10" value="<?php echo $data['taikhoan']->email; ?>" name="email" id="email" type="email" required/>
				</div>
                <div class="input-prepend" title="gioiThieu">
					<span class="add-on"><i class="halflings-icon pencil"></i></span>
					<input class="input-large span10" value="<?php echo $data['taikhoan']->gioithieu; ?>" name="gioiThieu" id="gioiThieu" type="text" required/>
				</div>
				<div class="clearfix"></div>

				<center><button type="submit" class="btn btn-primary">Thay đổi</button></center>
				<div class="clearfix"></div>
		</form>
			
	</div><!--/span-->
</div><!--/row-->


</div><!--/.fluid-container-->

</div><!--/fluid-row-->

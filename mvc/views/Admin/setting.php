<div class="row-flui sortable">
    <div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-edit"></i>&nbsp;<span class="break"></span>Thông tin trang web cơ bản</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
        <form class="form-horizontal" action="<?php echo $data['info'][0]->linkweb; ?>/Info/suaInfo" method="post" enctype="multipart/form-data">
            <fieldset>
				<div class="control-group">
                    <label class="control-label" for="typeahead">Tên Website:</label>
                    <div class="controls">
                    <input type="text" value="<?php echo $data['info'][0]->tieude; ?>" class="span10 typeahead" name="tieude"/>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label" for="typeahead">Tên trang Admin:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="tenweb" value="<?php echo $data['info'][0]->tenweb; ?>"/>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label" for="typeahead">Giới thiệu:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="mota" value="<?php echo $data['info'][0]->mota; ?>"/>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label" for="typeahead">Từ khóa:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="tukhoa" value="<?php echo $data['info'][0]->tukhoa; ?>"/>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label" for="typeahead">Tác giả:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="tacgia" value="<?php echo $data['info'][0]->tacgia; ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="fileInput">Logo:</label>
                    <div class="controls">
                        <img src="<?php echo $data['info'][0]->logo; ?>" alt="" id="logo-img" width="100px"/><br><br>
                        <input type="text" class="span10 typeahead" placeholder="Link hình..." name="logo-link" value="<?php echo $data['info'][0]->logo; ?>"/><br><br>
                        <input class="input-file uniform_on" id="fileInput" accept="image/png" name="logo" type="file"/>
                    </div>
                </div> 
				<div class="control-group">
                    <label class="control-label" for="fileInput">Favicon:</label>
                    <div class="controls">
                        <img src="<?php echo $data['info'][0]->favicon; ?>" alt="" id="favicon-img" width="100px"/><br><br>
                        <input type="text" class="span10 typeahead" placeholder="Link hình..." name="favicon-link" value="<?php echo $data['info'][0]->favicon; ?>" id="avatar"/><br><br>
                        <input class="input-file uniform_on" id="fileInput" accept="image/x-icon" name="favicon" type="file"/>
                    </div>
                </div> 
                
                <center>
                <button type="submit" name="btn-luutt" class="btn btn-danger">Lưu</button>
                </center>
                
            </fieldset>
        </div>
    </div>
	</div><!--/span-->
</div>
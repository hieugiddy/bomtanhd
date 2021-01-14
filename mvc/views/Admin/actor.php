
<div class="row-flui sortable">
    <div class="box span7">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-list"></i>&nbsp;<span class="break"></span>Danh sách diễn viên, đạo diễn</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>STT</th>
						<th>Họ tên</th>
                        <th style="display:none"></th>
						<th>Nghề nghiệp</th>
                        <th></th>
					</tr>
				</thead>   
				<tbody id="ql-actor">
                    <?php
						$obj=$data['actor'];
						if($obj)
							for($i=0;$i<count($obj);++$i){
								echo '<tr>
										<td>'.$obj[$i]->id.'</td>
                                        <td id="HT'.$obj[$i]->id.'">'.$obj[$i]->ten.'</td>
                                        <td style="display:none" id="NAG'.$obj[$i]->id.'">'.$obj[$i]->nghiepvu.','.$obj[$i]->avatar.','.$obj[$i]->gioithieu.'</td>
                                        <td>';
                                if($obj[$i]->nghiepvu=='dienvien')
                                    echo '<span class="label label-important">Diễn viên</span>';
                                else
                                    echo '<span class="label label-success">Đạo diễn</span>';
                                echo '</td>
										<td class="center">
											<a class="btn btn-info" href="#" onclick="suaActor('.$obj[$i]->id.')">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" href="'.$data['info'][0]->linkweb.'/Actor/xoaActor/'.$obj[$i]->id.'">
												<i class="halflings-icon white trash"></i> 
											</a>
										</td>
									</tr>';
							}
                    ?>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
    <div class="box span5">
        <div class="box-header" data-original-title>
			<h2><i class="fa fa-edit"></i>&nbsp;<span class="break"></span>Thêm/Sửa Actor</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
        <form class="form-horizontal" action="<?php echo $data['info'][0]->linkweb; ?>/Actor/editActor" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="control-group" style="display:none" id="formsua">
                    <label class="control-label" for="typeahead">ID Actor đang sửa:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" value="-1" name="idActor" id="idActor" readonly>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên Actor:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="tenActor" id="tenActor" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="kieu">Nghiệp vụ:</label>
                <div class="controls">
                    <select id="nghiepvu" name="nghiepvu" class="span5">
                    <option value="dienvien" id="dienvien">Diễn viên</option>
                    <option value="daodien" id="daodien">Đạo diễn</option>
                    </select>
                </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="fileInput">Avatar:</label>
                    <div class="controls">
                        <img src="" alt="" id="avatar-img" width="100px"/><br><br>
                        <input type="text" class="span10 typeahead" placeholder="Link hình..." name="avatar-link" id="avatar"/><br><br>
                        <input class="input-file uniform_on" id="fileInput" accept="image/jpeg,image/png" name="avatar" type="file"/>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="typeahead">Giới thiệu:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="gioiThieu" id="gioiThieu">
                    </div>
                </div>
                <center>
                <button type="submit" name="btn-themactor" class="btn btn-danger">Thêm</button>
                <button type="submit" name="btn-suaactor" class="btn btn-primary">Sửa</button>
                <button type="reset" class="btn" id="btn-reset-link">Reset</button>
                </center>
                
            </fieldset>
        </div>
    </div>
</div>

<style> 
#ql-actor td{
    vertical-align:middle
}
</style>
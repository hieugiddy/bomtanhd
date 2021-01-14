
<div class="row-flui sortable">
    <div class="box span7">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-list"></i>&nbsp;<span class="break"></span>Danh sách thành viên</h2>
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
                        <th>Username</th>
						<th>Họ tên</th>
                        <th style="display:none"></th>
						<th>Trạng thái</th>
                        <th>Quyền hạn</th>
                        <th></th>
					</tr>
				</thead>   
				<tbody id="ql-thanhvien">
                    <?php
						$obj=$data['thanhvien'];
						if($obj)
							for($i=0;$i<count($obj);++$i){
								echo '<tr>
										<td>'.$obj[$i]->id.'</td>
                                        <td id="US'.$obj[$i]->id.'">'.$obj[$i]->username.'</td>
                                        <td id="HT'.$obj[$i]->id.'">'.$obj[$i]->ten.'</td>
                                        <td style="display:none" id="AEGQT'.$obj[$i]->id.'">'.$obj[$i]->avatar.','.$obj[$i]->email.','.$obj[$i]->gioithieu.','.$obj[$i]->quyen.','.$obj[$i]->trangthai.'</td>';
                                echo '<td>';
                                if($obj[$i]->trangthai=='1')
                                    echo '<span class="label label-success">Đã kích hoạt</span>';
                                else
                                    echo '<span class="label label-warning">Chưa kích hoạt</span>';
                                echo '</td>';

                                echo '<td>';
                                if($obj[$i]->quyen=='1')
                                    echo '<span class="label label-info">Admin</span>';
                                else
                                    echo '<span class="label label-body">Thành viên</span>';
                                echo '</td>';

								echo '<td class="center">
											<a class="btn btn-info" href="#" onclick="suaThanhVien('.$obj[$i]->id.')">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" href="'.$data['info'][0]->linkweb.'/ThanhVien/xoaThanhVien/'.$obj[$i]->id.'">
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
			<h2><i class="fa fa-edit"></i>&nbsp;<span class="break"></span>Thêm/Sửa thành viên</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
        <form class="form-horizontal" action="<?php echo $data['info'][0]->linkweb; ?>/ThanhVien/editThanhVien" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="control-group" style="display:none" id="formsua">
                    <label class="control-label" for="typeahead">ID thanhvien đang sửa:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" value="-1" name="idTV" id="idTV" readonly>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Username:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="username" id="username" required>
                    <p id="checkUS"></p>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên thành viên:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="tenTV" id="tenTV" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Mật khẩu:</label>
                    <div class="controls">
                    <input type="password" class="span10 typeahead" name="matkhau" id="matkhau" required>
                    <i class="fa fa-eye" onclick="showPass('matkhau',this)" style="cursor:pointer;position:relative;top:3px;padding:3px 5px;background:#ddd"></i>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Nhập lại mật khẩu:</label>
                    <div class="controls">
                    <input type="password" class="span10 typeahead" name="again-matkhau" id="again-matkhau" required>
                    <i class="fa fa-eye" onclick="showPass('again-matkhau',this)" style="cursor:pointer;position:relative;top:3px;padding:3px 5px;background:#ddd"></i>
                    </div>
                </div>
                <div class="control-group" id="ck-doimk" style="display:none">
                    <label class="control-label" for="typeahead"></label>
                    <div class="controls">
                    <label class="remember" for="hiendoimk"><input name="hiendoimk" type="checkbox" id="hiendoimk" />Thay đổi mật khẩu</label>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="kieu">Quyền hạn:</label>
                <div class="controls">
                    <select id="quyen" name="quyen" class="span6">
                    <option value="0" id="thanhvien">Thành viên</option>
                    <option value="1" id="quantri">Quản trị viên</option>
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
                    <label class="control-label" for="typeahead">Email:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="email" id="email"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Giới thiệu:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="gioiThieu" id="gioiThieu">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead"></label>
                    <div class="controls">
                    <label class="remember" for="kichhoat"><input name="kichhoat" type="checkbox" id="kichhoat" />Kích hoạt</label>
                    </div>
                </div>
                <ul style="margin:0 0 40px 50px; ">
                    <li>Mật khẩu phải có độ dài tối thiểu 8 kí tự</li>
                    <li>Mật khẩu của bạn phải chứa ít nhất 1 số</li>
                    <li>Mật khẩu của bạn phải bắt đầu bằng chữ cái hoa</li>
                    <li>Mật khẩu của bạn phải chứa ít nhất 1 chữ cái thường</li>
                </ul>
                <center>
                <button type="submit" name="btn-themthanhvien" class="btn btn-danger">Thêm</button>
                <button type="submit" name="btn-suathanhvien" class="btn btn-primary">Sửa</button>
                <button type="reset" class="btn" id="btn-reset-link">Reset</button>
                </center>
                
            </fieldset>
        </div>
    </div>
</div>

<style> 
#ql-thanhvien td{
    vertical-align:middle
}
</style>
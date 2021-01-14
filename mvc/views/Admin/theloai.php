<div class="row-fluid">
	<input type="text" class="span3 typeahead" id="theloai" style="float:left;margin-right:10px;" required>
    <a href="javascript:void(0)" class="btn-success btn" id="btn-themtheloai">Thêm</a>
    <p id="checkTL" style="clear:both;margin-left:5px;"></p>
</div>
<p></p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-archive"></i>&nbsp;<span class="break"></span>Danh sách thể loại</h2>
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
						<th>Tên Thể Loại</th>
						<th>Slug</th>
						<th></th>
					</tr>
				</thead>   
				<tbody id="ql-theloai">
                    <?php
						$obj=json_decode($data['theloai']);
						if($obj)
							for($i=0;$i<count($obj);++$i){
								echo '<tr id="row'.$obj[$i]->maTL.'">
										<td>'.$obj[$i]->maTL.'</td>
										<td id="'.$obj[$i]->maTL.'">'.$obj[$i]->tenTL.'</td>
										<td>'.$obj[$i]->slug.'</td>
										<td class="center">
											<a class="btn btn-info" href="#" onclick="suaTheLoai('.$obj[$i]->maTL.')">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" onclick="xoaTheLoai('.$obj[$i]->maTL.')">
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

</div><!--/row-->

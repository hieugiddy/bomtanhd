<div class="row-fluid">
	<input type="text" class="span3 typeahead" id="quocgia" style="float:left;margin-right:10px;" required>
    <a href="javascript:void(0)" class="btn-success btn" id="btn-themquocgia">Thêm</a>
    <p id="checkQG" style="clear:both;margin-left:5px;"></p>
</div>
<p></p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-globe"></i>&nbsp;<span class="break"></span>Danh sách quốc gia</h2>
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
						<th>Quốc Gia</th>
						<th>Slug</th>
						<th></th>
					</tr>
				</thead>   
				<tbody id="ql-quocgia">
                    <?php
						$obj=json_decode($data['quocgia']);
						if($obj)
							for($i=0;$i<count($obj);++$i){
								echo '<tr id="row'.$obj[$i]->id.'">
										<td>'.$obj[$i]->id.'</td>
										<td id="'.$obj[$i]->id.'">'.$obj[$i]->ten.'</td>
										<td>'.$obj[$i]->slug.'</td>
										<td class="center">
											<a class="btn btn-info" href="#" onclick="suaQuocGia('.$obj[$i]->id.')">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" onclick="xoaQuocGia('.$obj[$i]->id.')">
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

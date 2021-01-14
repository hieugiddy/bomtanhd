<div class="row-fluid sortable">
    <a href="../Admin/ThemPhim" class="btn-success btn">Thêm</a>
</div>
<p></p>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-film"></i>&nbsp;<span class="break"></span>Danh sách phim</h2>
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
                        <th>Poster</th>
						<th>Tên Phim</th>
                        <th>Thời Lượng</th>
                        <th>Quốc Gia</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>   
				<tbody id="ql-phim">
                    <?php
						$obj=json_decode($data['phim']);
						if($obj)
							for($i=0;$i<count($obj);++$i){
								echo '<tr id="row'.$obj[$i]->id.'">
                                        <td>'.$obj[$i]->id.'</td>
                                        <td><img src="'.$obj[$i]->poster.'" width="50px" height="100px"/></td>
                                        <td id="'.$obj[$i]->id.'">'.$obj[$i]->tenPhim.'</td>
                                        <td>';
                                 if($obj[$i]->kieu=='phimle')
                                    echo '<span class="label label-warning">Phim Lẻ</span>';
                                 else
                                    echo '<span class="label label-info">Phim Bộ</span>';
                                echo '</td><td>';
                                if($data['quocgia'][$i]!=false)
                                    for($j=0;$j<count($data['quocgia'][$i]);$j++){
                                        echo $data['quocgia'][$i][$j]->ten.', ';
                                    }
                                echo '</td><td>';
                                    if($obj[$i]->status=='Trailer')
                                        echo '<span class="label label-important">Sắp phát hành</span>';
                                    else
                                        echo '<span class="label label-success">'.$obj[$i]->status.'</span>';
                                echo '</td>
									    <td class="center">
											<a class="btn btn-info" href="./SuaPhim/'.$obj[$i]->slug.'">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" href="../Phim/xoaPhim/'.$obj[$i]->id.'/'.$obj[$i]->slug.'">
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
<style>
#ql-phim td{
    vertical-align: middle;
}
</style>
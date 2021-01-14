<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Sửa phim mới</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="<?php echo $data['info'][0]->linkweb; ?>/Phim/SuaPhimMoi" method="post" enctype="multipart/form-data">
                <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên phim:</label>
                    <div class="controls">
                    <input type="hidden" name="id" id="id"/>
                    <input type="text"  class="span6 typeahead" name="tenphim" id="tenphim" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên Gốc:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" name="tengoc" id="tengoc" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="fileInput">Poster:</label>
                    <div class="controls">
                        <img src="" alt="" id="poster-img" width="100px"><br><br>
                        <input type="hidden" name="poster-cu" id="poster-cu"/>
                        <input type="text" placeholder="Link hình..." name="poster-link" id="poster"/><br><br>
                        <input class="input-file uniform_on" id="fileInput" accept="image/jpeg,image/png" name="poster" type="file">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="fileInput">Ảnh bìa (nếu có):</label>
                    <div class="controls">
                        <img src="" alt="" id="anhbia-img" width="100px"><br><br>
                        <input type="hidden" name="anhbia-cu" id="anhbia-cu"/>
                        <input type="text" placeholder="Link hình..." name="anhbia-link" id="anhbia"/><br><br>
                        <input class="input-file uniform_on" id="fileInput" accept="image/jpeg,image/png" name="anhbia" type="file">
                    </div>
                </div> 
                <div class="control-group">
                <label class="control-label" for="kieu">Kiểu:</label>
                <div class="controls">
                    <select id="kieu" name="kieu">
                    <option value="phimle" id="phimle">Phim Lẻ</option>
                    <option value="phimbo" id="phimbo">Phim Bộ</option>
                    </select>
                </div>
                </div>
                
                <div class="control-group">
                <label class="control-label" for="theloai">Thể loại:</label>
                <div class="controls">
                    <select id="theloai" multiple data-rel="chosen" name="theloai[]">
                    <?php
                        for($i=0;$i<count($data['theloai']);$i++){
                            echo '<option value="'.$data['theloai'][$i]->slug.'">'.$data['theloai'][$i]->tenTL.'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="quocgia">Quốc gia:</label>
                <div class="controls">
                    <select id="quocgia" multiple data-rel="chosen" name="quocgia[]">
                    <?php
                        for($i=0;$i<count($data['quocgia']);$i++){
                            echo '<option value="'.$data['quocgia'][$i]->slug.'">'.$data['quocgia'][$i]->ten.'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Năm:</label>
                    <div class="controls">
                    <input type="number" value="2021" class="span6 typeahead" name="nam" id="nam" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Công ty SX:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" value="Đang cập nhập" name="congtysx" id="congty" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Điểm IMDB:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" value="10.0" name="imdb" id="imdb" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Trailer:</label>
                    <div class="controls">
                    <input type="text" placeholder="https://www.youtube.com/embed/LyWWT5GbljU" class="span6 typeahead" name="trailer" id="trailer" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="daodien">Đạo diễn:</label>
                <div class="controls">
                    <select id="daodien" multiple data-rel="chosen" name="daodien[]">
                    <?php
                        for($i=0;$i<count($data['daodien']);$i++){
                            echo '<option value="'.$data['daodien'][$i]->slug.'">'.$data['daodien'][$i]->ten.'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="dienvien">Diễn viên:</label>
                <div class="controls">
                    <select id="dienvien" multiple data-rel="chosen" name="dienvien[]">
                    <?php
                        for($i=0;$i<count($data['dienvien']);$i++){
                            echo '<option value="'.$data['dienvien'][$i]->slug.'">'.$data['dienvien'][$i]->ten.'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Trạng thái/Thời lượng:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" value="Trailer" name="status" id="status" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tagline:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" name="tagline" id="tagline">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Từ khóa:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" placeholder="Từ khóa cách nhau bởi dấu phẩy" name="tukhoa" id="tukhoa" required>
                    </div>
                </div>
                
                
                <div class="control-group hidden-phone">
                    <label class="control-label" for="gioithieu">Giới thiệu phim:</label>
                    <div class="controls">
                    <textarea class="cleditor" id="gioithieu" name="gioithieu" rows="7"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

    

</div><!--/row-->

<div class="row-flui sortable">
    <div class="box span7">
		<div class="box-header" data-original-title>
			<h2><i class="fa fa-list"></i>&nbsp;<span class="break"></span>Danh sách tập phim</h2>
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
						<th>Tên Server</th>
                        <th>Tên Hiển Thị</th>
                        <th style="display:none"></th>
						<th>Loại</th>
                        <th></th>
					</tr>
				</thead>   
				<tbody id="ql-link">
                    <?php
						$obj=$data['linkphim'];
						if($obj)
							for($i=0;$i<count($obj);++$i){
								echo '<tr>
										<td>'.$obj[$i]->id.'</td>
                                        <td id="SV'.$obj[$i]->id.'">'.$obj[$i]->server.'</td>
                                        <td id="T'.$obj[$i]->id.'">'.$obj[$i]->tenhienthi.'</td>
                                        <td style="display:none" id="LL'.$obj[$i]->id.'">'.$obj[$i]->loai.','.$obj[$i]->link.'</td>
                                        <td>';
                                if($obj[$i]->loai=='xem')
                                    echo '<span class="label label-important">Xem</span>';
                                else
                                    echo '<span class="label label-success">Tải</span>';
                                echo '</td>
										<td class="center">
											<a class="btn btn-info" href="#" onclick="suaLink('.$obj[$i]->id.')">
												<i class="halflings-icon white edit"></i>  
											</a>
											<a class="btn btn-danger" href="'.$data['info'][0]->linkweb.'/Phim/xoaLinkPhim/'.$obj[$i]->id.'">
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
			<h2><i class="fa fa-edit"></i>&nbsp;<span class="break"></span>Thêm/Sửa tập phim</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
        <form class="form-horizontal" action="<?php echo $data['info'][0]->linkweb; ?>/Phim/editLink" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="control-group" style="display:none" id="formsua">
                    <label class="control-label" for="typeahead">ID phim đang sửa:</label>
                    <div class="controls">
                    <input type="text" class="span6 typeahead" value="-1" name="idLink" id="idLink" readonly>
                    </div>
                </div>
                <input type="hidden" name="idPhim" value="<?php echo $data['slug']; ?>"/>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên Server:</label>
                    <div class="controls">
                    <input type="text" class="span10 typeahead" name="server" id="server" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="kieu">Loại:</label>
                <div class="controls">
                    <select id="loai" name="loai" class="span5">
                    <option value="xem" id="xem">Link xem</option>
                    <option value="tai" id="tai">Link tải</option>
                    </select>
                </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên hiển thị:</label>
                    <div class="controls">
                    <input type="text"  class="span10 typeahead" name="tenhienthi" id="tenhienthi" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Link:</label>
                    <div class="controls">
                    <input type="text"  class="span10 typeahead" name="link" id="link" required>
                    </div>
                </div>
                <center>
                <button type="submit" name="btn-themlink" class="btn btn-danger">Thêm</button>
                <button type="submit" name="btn-sualink" class="btn btn-primary">Sửa</button>
                <button type="reset" class="btn" id="btn-reset-link">Reset</button>
                </center>
                
            </fieldset>
        </div>
    </div>
</div>

<script>suaPhim_Show(<?php echo $data['phim'] ?>);
</script>
<style>
#ql-link td{
    vertical-align:middle
}
</style>
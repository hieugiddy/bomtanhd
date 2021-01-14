<div class="fetch" style="margin-bottom:50px">
<label for="" style="float:left;margin-right:30px;vertical-align:middle">Lấy dữ liệu từ TMDB:</label>
<div style="float:left;margin-right:10px;">
<input type="text" class="span12 typeahead" id="tmdb-id" placeholder="Nhập id phim của TMDB...."/><br>
<em id="fetch-kq">VD: https://www.themoviedb.org/tv/<strong>71712-the-good-doctor</strong></em>
</div>
<select id="loaifetch" class="span2">
<option value="phimle-f" id="phimle">Phim Lẻ</option>
<option value="phimbo-f" id="phimbo">Phim Bộ</option>
</select>
<a href="javascript:void(0)" id="btn-fetch" class="btn btn-success">Fetch</a>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm phim mới</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="../Phim/ThemPhimMoi" method="post" enctype="multipart/form-data">
                <fieldset>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tên phim:</label>
                    <div class="controls">
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
                        <input type="text" placeholder="Link hình..." name="poster-link" id="poster"/><br><br>
                        <input class="input-file uniform_on" id="fileInput" accept="image/jpeg,image/png" name="poster" type="file">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="fileInput">Ảnh bìa (nếu có):</label>
                    <div class="controls">
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
                <label class="control-label" for="selectError1">Thể loại:</label>
                <div class="controls">
                    <select id="selectError1" multiple data-rel="chosen" name="theloai[]">
                    <?php
                        for($i=0;$i<count($data['theloai']);$i++){
                            echo '<option value="'.$data['theloai'][$i]->slug.'">'.$data['theloai'][$i]->tenTL.'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError2">Quốc gia:</label>
                <div class="controls">
                    <select id="selectError2" multiple data-rel="chosen" name="quocgia[]">
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
                    <input type="text" placeholder="https://www.youtube.com/embed/LyWWT5GbljU" class="span6 typeahead" name="trailer" id="typeahead" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError3">Đạo diễn:</label>
                <div class="controls">
                    <select id="selectError3" multiple data-rel="chosen" name="daodien[]">
                    <?php
                        for($i=0;$i<count($data['daodien']);$i++){
                            echo '<option value="'.$data['daodien'][$i]->slug.'">'.$data['daodien'][$i]->ten.'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError4">Diễn viên:</label>
                <div class="controls">
                    <select id="selectError4" multiple data-rel="chosen" name="dienvien[]">
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
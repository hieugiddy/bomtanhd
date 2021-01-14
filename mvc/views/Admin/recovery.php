<fieldset>
    <div class="control-group">
    <label class="control-label" for="backup">Sao lưu Database:</label>
    <div class="controls">
        <select id="backup" name="backup" class="span2" style="float:left;margin-right:20px">
        <option value="0">Xuất Excel</option>
        <option value="1">Xuất SQL</option>
        </select>
        <button type="submit" id="btn-xuat" class="btn btn-success">Backup</button>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="bang">Xuất theo bảng:</label>
    <div class="controls">
        <select id="bang" multiple data-rel="chosen" name="bang[]" style="float:left;margin-right:20px">
        <?php
            for($i=0;$i<count($data['bang']);$i++){
                echo '<option value="'.$data['bang'][$i].'">'.$data['bang'][$i].'</option>';
            }
        ?>
        </select>
        <p id="kq-xuat"></p>
        <button type="submit" name="btn-xuatOT" id="btn-xuatOT" class="btn btn-info">Xuất SQL</button>
    </div>
    </div>
</fieldset>
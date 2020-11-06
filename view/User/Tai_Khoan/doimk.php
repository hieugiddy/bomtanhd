<div style="width: 500px;margin: auto;">
<form action="/Theme/Tai_Khoan/xulysua.php" method="post">
<br>
        <input type="hidden" name="olduser" value="<?php echo $_COOKIE['user'] ?>" required/>
        <label>Mật khẩu mới:</label>
        <input type="password" name="password" value="<?php echo $_COOKIE['matkhau'] ?>" required/><br><br>
        <input type="submit" value="Thay đổi" class="btn btn-success"/>
</form>
</div>
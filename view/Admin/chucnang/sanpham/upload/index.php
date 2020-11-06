<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Upload ảnh</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script ></script>
    <script  type="text/javascript"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-success">
        <div class="panel-body">
            <form action="upload.php" method="POST" role="form" enctype="multipart/form-data">
                <legend>Upload</legend>

                <div class="form-group">
                    <label for="file">Chọn file</label>
                    <input type="file" name="file" accept="image/jpeg,image/png" required/>
                </div>
                <div class="form-group">
                    <input type="submit" id="upload" class="btn btn-primary" value="Upload"/>
                </div>
            </form>
            <div class="status alert alert-success">Link ảnh: <?php if(isset($_GET['link'])) echo '<input value="'.$_GET['link'].'" type="text" style="width:80%"/>'; else echo 'Bạn chưa upload ảnh'; ?></div>
        </div>
    </div>
</div>
</body>
</html>
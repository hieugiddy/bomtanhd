<?php try{
		/*tạo 1 kết nối bằng cách khai báo 1 đối tượng pdo mới*/
		$conn= new PDO('mysql:dbname=3065351_hieu;host=fdb20.atspace.me;charset=utf8','3065351_hieu','Anhyeuem123@');
		/*thiết lập chế độ hiển thị lỗi khi bắt try catch - ở đây sử dụng chế độ ẩn lỗi - để ko bị hack khai thác lỗ hỏng*/
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$conn->query('SET names \'utf8\'');
	}
	catch(PDOException $e){
		die('Error: '.$e->getMessage());
	}
        $linkweb='http://yeudw.com/';
?>
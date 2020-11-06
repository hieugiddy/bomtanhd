<?php
class TheLoai{
	private $id;
	private $TenTL;
	private $slug;

	public function __construct(){
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}

	public function setTenTL($tenTL){
		$this->TenTL=$tenTL;
	}
	public function getTenTL(){
		return $this->TenTL;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}
	public function setSlug($slug){
		$this->slug=$slug;
	}
	public function getSlug(){
		return $this->slug;
	}
	public function getTheLoai(){
		include('database.php'); //kết nối database
		$theloai=$conn->prepare('select * from theloai');
		$theloai->execute(); //truy vấn 
		$arr=array(); //tạo mảng rỗng
		if($theloai->rowCount()>0)
			while($row=$theloai->fetch(PDO::FETCH_ASSOC)){ //fetch dữ liệu
				$tl=new TheLoai(); //tạo đối tượng thể loại mới
				$tl->setId($row['id']); //set id dối tượng đó
				$tl->setTenTL($row['tenTL']); //
				$tl->setSlug($row['slug']);//
				$arr[]=$tl; //thêm p tử mới cho mảng
			}
		return $arr;
	}
	
}
?>
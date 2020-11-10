<?php
class QuocGia{
	public $id;
	public $ten;
	public $slug;

	public function __construct(){
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}
	public function setTen($ten){
		$this->ten=$ten;
	}
	public function getTen(){
		return $this->ten;
	}
	public function setSlug($slug){
		$this->slug=$slug;
	}
	public function getSlug(){
		return $this->slug;
	}
	public function getQuocGia(){
		include('database.php'); //kết nối database
		$quocgia=$conn->prepare('select * from quocgia');
		$quocgia->execute(); //truy vấn 
		$arr=array(); //tạo mảng rỗng
		if($quocgia->rowCount()>0)
			while($row=$quocgia->fetch(PDO::FETCH_ASSOC)){ //fetch dữ liệu
				$qg=new QuocGia(); 
				$qg->setId($row['id']); //set id dối tượng đó
				$qg->setTen($row['ten']); //
				$qg->setSlug($row['slug']);//
				$arr[]=$qg; //thêm p tử mới cho mảng
			}
		return $arr;
	}
}
?>
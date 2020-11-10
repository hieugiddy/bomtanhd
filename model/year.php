<?php
class Year{
	public $year;

	public function __construct(){
	}
	public function setYear($year){
		$this->year=$year;
	}
	public function getYear(){
		return $this->year;
	}
	public function getYears(){
		include('database.php'); //kết nối database
		$year=$conn->prepare('select * from Nam');
		$year->execute(); //truy vấn 
		$arr=array(); //tạo mảng rỗng
		if($year->rowCount()>0)
			while($row=$year->fetch(PDO::FETCH_ASSOC)){ //fetch dữ liệu
				$nam=new Year(); 
				$nam->setYear($row['nam']);
				$arr[]=$nam; //thêm p tử mới cho mảng
			}
		return $arr;
	}
}
?>
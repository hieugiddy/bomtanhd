<?php
/**
 *
 */
class Phim {
	public $id;
	public $ten;
	public $status;
	public $ngayphathanh;
	public $tmdb;
	public $imdb;
	public $gioithieu;
	public $trailer;
	public $tukhoa;
	public $tagline;
	public $poster;
	public $anhbia;
	public $nam;
	public $theloai;
	public $quocgia;
	public $congtysx;
	public $daodien;
	public $dienvien;
	public $vote;
	public $tengoc;
	public $slug;
	public $thoiLuong;
	public $soTap;
	public $kieu;
	public $ngayDang;


	function __construct() {
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
		include('database.php');
	}
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}
	public function getKieu() {
		return $this->kieu;
	}

	public function setKieu($kieu) {
		$this->kieu = $kieu;
	}

	public function getNgayDang() {
		return $this->ngayDang;
	}

	public function setNgayDang($ngayDang) {
		$this->ngayDang = $ngayDang;
	}

	public function getTen() {
		return $this->ten;
	}

	public function setTen($ten) {
		$this->ten = $ten;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getNgayphathanh() {
		return $this->ngayphathanh;
	}

	public function setNgayphathanh($ngayphathanh) {
		$this->ngayphathanh = $ngayphathanh;
	}

	public function getTmdb() {
		return $this->tmdb;
	}

	public function setTmdb($tmdb) {
		$this->tmdb = $tmdb;
	}

	public function getImdb() {
		return $this->imdb;
	}

	public function setImdb($imdb) {
		$this->imdb = $imdb;
	}

	public function getGioithieu() {
		return $this->gioithieu;
	}

	public function setGioithieu($gioithieu) {
		$this->gioithieu = $gioithieu;
	}

	public function getTrailer() {
		return $this->trailer;
	}

	public function setTrailer($trailer) {
		$this->trailer = $trailer;
	}

	public function getTukhoa() {
		return $this->tukhoa;
	}

	public function setTukhoa($tukhoa) {
		$this->tukhoa = $tukhoa;
	}

	public function getTagline() {
		return $this->tagline;
	}

	public function setTagline($tagline) {
		$this->tagline = $tagline;
	}

	public function getPoster() {
		return $this->poster;
	}

	public function setPoster($poster) {
		$this->poster = $poster;
	}

	public function getAnhbia() {
		return $this->anhbia;
	}

	public function setAnhbia($anhbia) {
		$this->anhbia = $anhbia;
	}

	public function getNam() {
		return $this->nam;
	}

	public function setNam($nam) {
		$this->nam = $nam;
	}

	public function getTheloai() {
		return $this->theloai;
	}

	public function setTheloai($theloai) {
		$this->theloai = $theloai;
	}

	public function getQuocgia() {
		return $this->quocgia;
	}

	public function setQuocgia($quocgia) {
		$this->quocgia = $quocgia;
	}

	public function getCongtysx() {
		return $this->congtysx;
	}

	public function setCongtysx($congtysx) {
		$this->congtysx = $congtysx;
	}

	public function getDaodien() {
		return $this->daodien;
	}

	public function setDaodien($daodien) {
		$this->daodien = $daodien;
	}

	public function getDienvien() {
		return $this->dienvien;
	}

	public function setDienvien($dienvien) {
		$this->dienvien = $dienvien;
	}

	public function getVote() {
		return $this->vote;
	}

	public function setVote($vote) {
		$this->vote = $vote;
	}

	public function getTengoc() {
		return $this->tengoc;
	}

	public function setTengoc($tengoc) {
		$this->tengoc = $tengoc;
	}

	public function getSlug() {
		return $this->slug;
	}

	public function setSlug($slug) {
		$this->slug = $slug;
	}

	public function getThoiLuong() {
		return $this->thoiLuong;
	}

	public function setThoiLuong($thoiLuong) {
		$this->thoiLuong = $thoiLuong;
	}

	public function getSoTap() {
		return $this->soTap;
	}

	public function setSoTap($soTap) {
		$this->soTap = $soTap;
	}
		
	public function getSoLuongPhim($kieu,$quocgia,$theloai,$nam){
		include('database.php'); //kết nối database
		if($quocgia!=null)
			$cmd='select * from phim,chitietphim,chitietquocgia where phim.id=chitietphim.id and phim.id=chitietquocgia.idPhim and idQuocGia="'.$quocgia.'"';
		if($kieu!=null)
			$cmd='select * from phim,chitietphim where phim.id=chitietphim.id and kieu="'.$kieu.'"';
		if($theloai!=null)
			$cmd='select * from phim,chitietphim,chitiettheloai where phim.id=chitietphim.id and phim.id=chitiettheloai.idPhim and idTheLoai="'.$theloai.'"';
		if($nam!=null)
			$cmd='select * from phim,chitietphim where phim.id=chitietphim.id and nam='.$nam;
		
		$phim=$conn->prepare($cmd);
		$phim->execute(); //truy vấn 
		return $phim->rowCount();
	}

	public function getPhimMoi($start,$soluong,$kieu,$quocgia,$theloai,$nam){
		include('database.php'); //kết nối database
		if($quocgia!=null)
			$cmd='select * from phim,chitietphim,chitietquocgia where phim.id=chitietphim.id and phim.id=chitietquocgia.idPhim and idQuocGia="'.$quocgia.'" order by ngaydang DESC limit '.$start.','.$soluong;
		if($kieu!=null)
			$cmd='select * from phim,chitietphim where phim.id=chitietphim.id and kieu="'.$kieu.'" order by ngaydang DESC limit '.$start.','.$soluong;
		if($theloai!=null)
			$cmd='select * from phim,chitietphim,chitiettheloai where phim.id=chitietphim.id and phim.id=chitiettheloai.idPhim and idTheLoai="'.$theloai.'" order by ngaydang DESC limit '.$start.','.$soluong;
		if($nam!=null)
			$cmd='select * from phim,chitietphim where phim.id=chitietphim.id and nam='.$nam.' order by ngaydang DESC limit '.$start.','.$soluong;
		
		$phim=$conn->prepare($cmd);
		$phim->execute(); //truy vấn 
		$arr=array(); //tạo mảng rỗng
		if($phim->rowCount()>0)
			while($row=$phim->fetch(PDO::FETCH_ASSOC)){ //fetch dữ liệu
				$phim_item=new Phim(); //tạo đối tượng thể loại mới
				$phim_item->setId($row['id']); //set id dối tượng đó
				$phim_item->setTen($row['tenPhim']);
				$phim_item->setTheloai($row['theloai']);
				$phim_item->setNam($row['nam']);
				$phim_item->setQuocgia($row['quocgia']);
				$phim_item->setCongtysx($row['congtyx']);
				$phim_item->setDaodien($row['daodien']);
				$phim_item->setDienvien($row['dienvien']);
				$phim_item->setTengoc($row['tengoc']);
				$phim_item->setSlug($row['slug']);
				$phim_item->setNgayDang($row['ngaydang']);
				$phim_item->setPoster($row['poster']);
				$phim_item->setStatus($row['status']);
				$arr[]=$phim_item; //thêm p tử mới cho mảng
			}
		$conn=null;
		return $arr;
	}
	public function getPhimHot($start,$soluong){}
	public function getChuDeHot(){}
	public function getTopIMDB(){}
	public function getPhimTheLoaiYeuThich($dstheloai,$start,$soluong){}

}

?>
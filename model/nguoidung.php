<?php
class NguoiDung {
	public $username;
	public $password;
	public $ten;
	public $email;
	public $gioiThieu;
	public $lichSu;
	public $xemSau;
	public $phimYeuThich;
	public $theLoaiYeuThich;
	public $danhSachPhat;

	function __construct() {
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}
	function __construct1($username, $password, $ten, $email, $gioiThieu, $lichSu, $xemSau, $phimYeuThich, $theLoaiYeuThich, $danhSachPhat) {
		$this->username        = $username;
		$this->password        = $password;
		$this->ten             = $ten;
		$this->email           = $email;
		$this->gioiThieu       = $gioiThieu;
		$this->lichSu          = $lichSu;
		$this->xemSau          = $xemSau;
		$this->phimYeuThich    = $phimYeuThich;
		$this->theLoaiYeuThich = $theLoaiYeuThich;
		$this->danhSachPhat    = $danhSachPhat;
	}

	
}
?>
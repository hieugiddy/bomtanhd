<?php
class ThanhVienModel extends DB{
	function getThanhVien(){
		return $this->select('taikhoan','*',null,null,null); 
	}
	function themThanhVien($username,$password,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen){
        $this->insert('taikhoan','username,password,ten,trangthai,avatar,email,gioithieu,quyen',array($username,$password,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen));
    }
    function suaThanhVien($id,$password,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen){
        $this->update('taikhoan','password,ten,trangthai,avatar,email,gioithieu,quyen','where id=?',array($password,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen,$id));
	}
	function suaThanhVienn($id,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen){
        $this->update('taikhoan','ten,trangthai,avatar,email,gioithieu,quyen','where id=?',array($ten,$trangthai,$avatar,$email,$gioithieu,$quyen,$id));
	}
	function updateProfile($username,$ten,$avatar,$email,$gioithieu){
        $this->update('taikhoan','ten,avatar,email,gioithieu','where username=?',array($ten,$avatar,$email,$gioithieu,$username));
    }
    function xoaThanhVien($id){
        $this->delete('taikhoan','where id=?',array($id));
	}
	function timThanhVien($username){
		$t=$this->select('taikhoan','*','where username=?',array($username),null); 
		if($t=='false')
            return 'false';
        else
            return json_decode($t);
	}
	function layPass($username){
		return json_decode($this->select('taikhoan','password','where username=?',array($username),null))[0]->password; 
	}
	function layTuPhim($username){
		return json_decode($this->select('taikhoan','tuphim','where username=?',array($username),null))[0]->tuphim; 
	}
	function layInfo($username){
		return json_decode($this->select('taikhoan','ten,avatar,email,gioithieu,quyen','where username=?',array($username),null))[0]; 
	}
	function layTrangThai($username){
		return json_decode($this->select('taikhoan','trangthai','where username=?',array($username),null))[0]->trangthai; 
	}
	function kichHoatTaiKhoan($username){
		$this->update('taikhoan','trangthai','where username=?',array(1,$username));
	}
	function doiPass($password,$username){
		$this->update('taikhoan','password','where username=?',array($password,$username));
	}
	function themVaoTuPhim($username,$idPhim){
		$tuphim=json_decode($this->select('taikhoan','tuphim','where username=?',array($username),null))[0]->tuphim; 
		$tuphim=str_replace($idPhim.',','',$tuphim);
		$tuphim.=$idPhim.',';
		$this->update('taikhoan','tuphim','where username=?',array($tuphim,$username));
	}
}
?>
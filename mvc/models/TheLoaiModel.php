<?php
class TheLoaiModel extends DB{
	function getTheLoai(){
        return $this->select('theloai','*',null,null,null); 
    }	
    function getCTTheLoai(){
        return $this->select('chitiettheloai','*',null,null,null); 
    }	
    function timTheLoai($slug){
        return $this->select('theloai','maTL,tenTL','where slug=?',array($slug),null);
    }
    function themTheLoai($ten,$slug){
        return $this->insert('theloai','tenTL,slug',array($ten,$slug));
    }
    function suaTheLoai($id,$ten){
        return $this->update('theloai','tenTL','where maTL=?',array($ten,$id));
    }
    function xoaTheLoai($id){
        return $this->delete('theloai','where maTL=?',array($id));
    }
    function getChiTietTheLoai($idPhim){
        return $this->select('chitiettheloai,theloai','*','where chitiettheloai.idTheLoai=theloai.slug and idPhim=?',array($idPhim),null);
    }
}
?>
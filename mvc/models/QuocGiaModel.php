<?php
class QuocGiaModel extends DB{
	function getQuocGia(){
        return $this->select('quocgia','*',null,null,null); 
    }	
    function getCTQuocGia(){
		return $this->select('chitietquocgia','*',null,null,null); 
	}
    function timQuocGia($slug){
        return $this->select('quocgia','id,ten','where slug=?',array($slug),null);
    }
    function getChiTietQuocGia($idPhim){
        return $this->select('chitietquocgia,quocgia','*','where chitietquocgia.idQuocGia=quocgia.slug and idPhim=?',array($idPhim),null);
    }
    function themQuocGia($ten,$slug){
        return $this->insert('quocgia','ten,slug',array($ten,$slug));
    }
    function suaQuocGia($id,$ten){
        return $this->update('quocgia','ten','where id=?',array($ten,$id));
    }
    function xoaQuocGia($id){
        return $this->delete('quocgia','where id=?',array($id));
    }
}
?>
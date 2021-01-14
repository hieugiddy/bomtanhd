<?php
class ActorModel extends DB{
    function getActor(){
		return $this->select('actor','*',null,null,null); 
    }
    function timActor($slug){
      return $this->select('actor','*','where slug=?',array($slug),null); 
      }
    function getChiTietDaoDien(){
		return $this->select('chitietdaodien','*',null,null,null); 
    }
    function getChiTietDienVien(){
		return $this->select('chitietdienvien','*',null,null,null); 
    }
    function getCTDaoDien($idPhim){
      return $this->select('chitietdaodien,actor','*','where chitietdaodien.idDaoDien=actor.slug and idPhim=?',array($idPhim),null);
    }
    function getCTDienVien($idPhim){
      return $this->select('chitietdienvien,actor','*','where chitietdienvien.idDienVien=actor.slug and idPhim=?',array($idPhim),null);
    }
    function getDaoDien(){
          return $this->select('actor','*','where nghiepvu="daodien"',null,null); 
    }	
    function getDienVien(){
          return $this->select('actor','*','where nghiepvu="dienvien"',null,null); 
    }	
	  function themActor($ten,$nghiepvu,$avatar,$gioithieu,$slug){
        $this->insert('actor','ten,nghiepvu,avatar,gioithieu,slug',array($ten,$nghiepvu,$avatar,$gioithieu,$slug));
    }
    function suaActor($id,$ten,$nghiepvu,$avatar,$gioithieu,$slug){
        $this->update('actor','ten,nghiepvu,avatar,gioithieu,slug','where id=?',array($ten,$nghiepvu,$avatar,$gioithieu,$slug,$id));
    }
    function xoaLink($id){
        $this->delete('actor','where id=?',array($id));
    }
}
?>
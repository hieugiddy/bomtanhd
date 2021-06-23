<?php
class BinhLuanModel extends DB{
    function getAllBinhLuan(){
		return $this->select('binhluan','*',null,null,null); 
    }
    function getSLBinhLuan(){
		return $this->select('binhluan','count(id) as sl',null,null,null); 
    }
    function getAllChiTietBinhLuan(){
		return $this->select('chitietbinhluan','*',null,null,null); 
	}
	function getBinhLuan($start,$limit){
        return $this->select('binhluan,chitietbinhluan,taikhoan,phim','*','where binhluan.id=chitietbinhluan.idBinhLuan and taikhoan.username=binhluan.username and chitietbinhluan.idPhim=phim.id order by thoiGian DESC',null,'limit '.$start.','.$limit); 
    }
    function timBinhLuan($id){
        return $this->select('binhluan,chitietbinhluan,taikhoan,phim','*','where binhluan.id=chitietbinhluan.idBinhLuan and taikhoan.username=binhluan.username and chitietbinhluan.idPhim=phim.id and binhluan.id=?',array($id),null);
    }
    function timBinhLuanPhim($id){
        return $this->select('binhluan,chitietbinhluan,taikhoan,phim','*','where binhluan.id=chitietbinhluan.idBinhLuan and taikhoan.username=binhluan.username and chitietbinhluan.idPhim=phim.id and phim.id=? order by thoiGian DESC',array($id),null);
    }
    function timBinhLuan1($id){
        return $this->select('binhluan,taikhoan','binhluan.id,noidung,taikhoan.username,thich,thoiGian,traloi,ten,avatar','where taikhoan.username=binhluan.username and binhluan.id=?',array($id),null);
    }
    function likeBinhLuan($id,$solike){
        return $this->update('binhluan','thich','where id=?',array($solike,$id));
    }
    function getDSTraLoi($id){
        return $this->select('binhluan','traloi','where binhluan.id=?',array($id),null);
    }
    function xoaTraLoi($id){
        $x=$this->delete('binhluan','where id=?',array($id));
        return $x;
    }
    function xoaBinhLuan($id,$traloi){
        $traloi=explode(',',$traloi);
        for($i=0;$i<count($traloi);$i++){
            $xoa=$this->delete('binhluan','where id=?',array($traloi[$i]));
        }
        $x1=$this->delete('binhluan','where id=?',array($id));
        $x2=$this->delete('chitietbinhluan','where idBinhLuan=?',array($id));
        return $x1 && $x2;
    }
    function themTraLoi($idBinhLuan,$noidung,$username,$thich){
        $id=date('dmYHis').str_replace(" ", "",$username);
        $x1=$this->insert('binhluan','id,noidung,username,thich',array($id,$noidung,$username,$thich));
        //lấy ds trả lời của bình luận cần thêm câu trả lời
        $traloi=json_decode($this->getDSTraLoi($idBinhLuan));
        $traloi=$traloi[0]->traloi.','.$id;
        //lấy thời gian của bình luận vừa chèn
        $thoigian=json_decode($this->select('binhluan','thoiGian','where id=?',array($id),null))[0]->thoiGian;

        $x2=$this->update('binhluan','thoiGian,traloi','where id=?',array($thoigian,$traloi,$idBinhLuan));
        return $x1 && $x2;
    }
    function themBinhLuan($noidung,$username,$thich,$idPhim){
        $idBinhLuan=date('dmYHis').str_replace(" ", "",$username);
        $x1=$this->insert('binhluan','id,noidung,username,thich',array($idBinhLuan,$noidung,$username,$thich));
        $x2=$this->insert('chitietbinhluan','idBinhLuan,idPhim',array($idBinhLuan,$idPhim));
        return $x1 && $x2;
    }
}
?>
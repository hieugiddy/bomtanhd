<?php
class LinkPhimModel extends DB{
    function getALL(){
        return $this->select('linkphim','*',null,null,null); 
    }
    function getLinkPhim($slug){
        return $this->select('linkphim','*','where idPhim=?',array($slug),null); 
    }
    function getServerXem($slug){
        return $this->select('linkphim','server','where loai="xem" and idPhim=? group by server',array($slug),null); 
    }
    function getServerTai($slug){
        return $this->select('linkphim','server','where loai="tai" and idPhim=? group by server',array($slug),null); 
    }
    function getLinkXem($slug,$server){
        return $this->select('linkphim','*','where loai="xem" and idPhim=? and server=?',array($slug,$server),null); 
    }
    function getLinkTai($slug,$server){
        return $this->select('linkphim','*','where loai="tai" and idPhim=? and server=?',array($slug,$server),null); 
    }
    function themLink($idPhim,$tenhienthi,$link,$loai,$server){
        $this->insert('linkphim','idPhim,tenhienthi,link,loai,server',array($idPhim,$tenhienthi,$link,$loai,$server));
    }
    function themLink1($id,$idPhim,$tenhienthi,$link,$loai,$server){
        $this->insert('linkphim','id,idPhim,tenhienthi,link,loai,server',array($id,$idPhim,$tenhienthi,$link,$loai,$server));
    }
    function suaLink($id,$tenhienthi,$link,$loai,$server){
        $this->update('linkphim','tenhienthi,link,loai,server','where id=?',array($tenhienthi,$link,$loai,$server,$id));
    }
    function xoaLink($id){
        $this->delete('linkphim','where id=?',array($id));
    }
}
?>
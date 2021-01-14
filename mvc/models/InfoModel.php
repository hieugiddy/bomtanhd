<?php
class InfoModel extends DB{
    function getInfo(){
        return json_decode($this->select('info','*',null,null,''));
    }
    function suaInfo($tieude,$tenweb,$mota,$tukhoa,$favicon,$logo,$tacgia){
        return $this->update('info','tieude,tenweb,mota,tukhoa,favicon,logo,tacgia',null,array($tieude,$tenweb,$mota,$tukhoa,$favicon,$logo,$tacgia));
    }
}
?>
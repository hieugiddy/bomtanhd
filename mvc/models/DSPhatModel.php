<?php
class DSPhatModel extends DB{
    function getDSPhat(){
        return $this->select('danhsachphat','*',null,null,null); 
    }	
}
?>
<?php
class NamModel extends DB{
	function getNam(){
        return $this->select('phim','nam','group by nam',null,null); 
    }
}
?>
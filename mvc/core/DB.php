<?php

class DB{

    public $conn;
    public $base;

    function __construct(){
        try{
            /*tạo 1 kết nối bằng cách khai báo 1 đối tượng pdo mới*/
            $this->conn= new PDO('mysql:dbname=bomtanhd;host=localhost;charset=utf8','root','');
            /*thiết lập chế độ hiển thị lỗi khi bắt try catch - ở đây sử dụng chế độ ẩn lỗi - để ko bị hack khai thác lỗ hỏng*/
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->conn->query('SET names \'utf8\'');
        }
        catch(PDOException $e){
            die('Error: '.$e->getMessage());
        }
    }
    function select($table,$column,$where,$value_wh=[],$limit){
        $cmd='select '.$column.' from '.$table.' ';
        if($where!=null)
            $cmd.=$where.' ';
        if($limit!=null)
            $cmd.=$limit;
//        echo $cmd;
        $select=$this->conn->prepare($cmd);
        $run=($value_wh!=null)?$select->execute($value_wh):$select->execute();
        if($run){
            if($select->rowCount()>0){
                $arr=array();
                while($row=$select->fetch(PDO::FETCH_ASSOC)){ //fetch dữ liệu
                    array_push($arr,$row); //thêm p tử mới cho mảng
                }
                return json_encode($arr,JSON_PRETTY_PRINT);
            }
        }  
        return json_encode(false);
    }

    function insert($table,$column,$value=[]){
        $cmd='insert into '.$table;
        if($column!=null)
            $cmd.='('.$column.') ';
        $cmd.='VALUES(';
        $column=explode(',',$column);
        for($i=0;$i<count($column)-1;$i++){
            $cmd.='?,';
        }
        $cmd.='?)';
        
        $insert=$this->conn->prepare($cmd);
        if($insert->execute($value))
            return true;
        return false;
    }
    
    function update($table,$column,$where,$value=[]){
        $cmd='update '.$table.' set ';
        $column=explode(',',$column);

        for($i=0;$i<count($column)-1;$i++){
            $cmd.=$column[$i].'=?,';
        }
        $cmd.=$column[count($column)-1].'=? ';
        $cmd.=$where;
        
        $update=$this->conn->prepare($cmd);
        if($update->execute($value))
            return true;
        return false;
    }
    function delete($table,$where,$value=[]){
        $cmd='delete from '.$table.' '.$where;
        $delete=$this->conn->prepare($cmd);
        if($delete->execute($value))
            return true;
        return false;
    }
}

?>
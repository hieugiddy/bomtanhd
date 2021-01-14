<?php
class BinhLuan extends Controller{
    public $BinhLuanModel;
    function __construct() {
        $this->BinhLuanModel=$this->model("BinhLuanModel");
    }	
    function chiTietBinhLuan(){
        echo $this->BinhLuanModel->timBinhLuan($_POST['id']);
    }
    function themBinhLuan(){
        if(isset($_POST['btn-binhluan']))
            $this->BinhLuanModel->themBinhLuan($_POST['noidung'],$_COOKIE['username'],0,$_POST['idPhim']);
        echo '<script>history.back();</script>';
    }
    function thaTym(){
        $json=json_decode($this->BinhLuanModel->timBinhLuan1($_POST['id']));
        $solike=(int)$json[0]->thich+1;
        if($this->BinhLuanModel->likeBinhLuan($_POST['id'],$solike))
            echo $solike;
        else
            echo $json[0]->thich;
    }
    function getBinhLuanCon(){
        $traloi=json_decode($this->BinhLuanModel->getDSTraLoi($_POST['id']));
        $traloi=explode(",",$traloi[0]->traloi);
        $binhluan=array();
        for($i=1;$i<count($traloi);$i++){
            $binhluan[]=json_decode($this->BinhLuanModel->timBinhLuan1($traloi[$i]));
        }
        echo json_encode($binhluan);
    }
    function xoaTraLoi(){
        $id=$_POST['id'];
        if($this->BinhLuanModel->xoaTraLoi($id))
           echo '
           <font color="green">Xóa thành công</font>
           <script> location.href="./BinhLuan";</script>';
        else
            echo '<font color="red">Xóa không thành công</font>'; 
    }
    function xoaBinhLuan(){
        $id=$_POST['id'];
        $traloi=$_POST['traloi'];
        if($this->BinhLuanModel->xoaBinhLuan($id,$traloi))
           echo '
           <font color="green">Xóa thành công</font>
           <script> location.href="./BinhLuan";</script>';
        else
            echo '<font color="red">Xóa không thành công</font>'; 
    }
    function themTraLoi(){
        $idBinhLuan=$_POST['idBinhLuan'];
        $noidung=$_POST['noidung'];
        if(isset($_COOKIE['username']))
            $username=$_COOKIE['username'];
        else
            echo '<script> location.href="../Account";</script>';
        $thich=0;
        if($this->BinhLuanModel->themTraLoi($idBinhLuan,$noidung,$username,$thich))
            if(isset($_POST['btn-traloi-fe']))
                echo '<script> history.back();</script>';
            else
                echo '<script> location.href="../Admin/BinhLuan";</script>';
        else
            echo '<font color="red">Lỗi</font>'; 
    }
}
?>
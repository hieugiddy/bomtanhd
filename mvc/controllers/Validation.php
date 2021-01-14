<?php
class Validation extends Controller{
    public $QuocGiaModel;
    public $TheLoaiModel;
    public $ThanhVienModel;
    function __construct() {
        $this->QuocGiaModel=$this->model("QuocGiaModel");
        $this->TheLoaiModel=$this->model("TheLoaiModel");
        $this->ThanhVienModel=$this->model("ThanhVienModel");
    }	
    function isExistQuocGia(){
        $slug=$this->to_slug($_POST['slug']);
        $static=$this->QuocGiaModel->timQuocGia($slug);
        if($static=='false' && !empty($_POST['slug']))
            echo 'false';
        else
            echo 'true';
    }
    function isExistTheLoai(){
        $slug=$this->to_slug($_POST['slug']);
        $static=$this->TheLoaiModel->timTheLoai($slug);
        if($static=='false' && !empty($_POST['slug']))
            echo 'false';
        else
            echo 'true';
    }
    function isExistUsername(){
        $username=str_replace('-','',$this->to_slug($_POST['username']));
        $trv=$this->ThanhVienModel->timThanhVien($username);
        if($trv=='false' && !empty($_POST['username']))
            echo 'false';
        else
            echo 'true';
    }
}
?>
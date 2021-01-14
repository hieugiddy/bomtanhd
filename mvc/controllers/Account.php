<?php
class Account extends Controller{
    public $ThanhVienModel;
    public $InfoModel;

    function __construct() {
        $this->ThanhVienModel=$this->model("ThanhVienModel");
        $this->InfoModel=$this->model('InfoModel');
    }	
    function Home(){
        $info=$this->InfoModel->getInfo();
        if(isset($_COOKIE['username']))
			echo '<script>location.href="'.$info[0]->linkweb.'";</script>';
        $this->view("Account",[
            "info"=>$info,
            "page"=>"Login",
            "page_name"=>"Đăng nhập vào hệ thống"
        ]);
    }
    function DangKy(){
        $info=$this->InfoModel->getInfo();
        if(isset($_COOKIE['username']))
			echo '<script>location.href="'.$info[0]->linkweb.'";</script>';
        $this->view("Account",[
            "info"=>$info,
            "page"=>"signup",
            "page_name"=>"Đăng ký tài khoản"
        ]);
    }
    function QuenMK(){
        $info=$this->InfoModel->getInfo();
        if(isset($_COOKIE['username']))
			echo '<script>location.href="'.$info[0]->linkweb.'";</script>';
        $this->view("Account",[
            "info"=>$info,
            "page"=>"quenmk",
            "page_name"=>"Quên mật khẩu"
        ]);
    }
    function DoiMK(){
        $info=$this->InfoModel->getInfo();
        if(!isset($_COOKIE['username']))
            header("Location: ../");
        $this->view("Account",[
            "info"=>$info,
            "page"=>"doimk",
            "page_name"=>"Thay đổi mật khẩu"
        ]);
    }
    function EditProfile(){
        $info=$this->InfoModel->getInfo();
        if(!isset($_COOKIE['username']))
            header("Location: ../");
        $taikhoan=$this->ThanhVienModel->layInfo($_COOKIE['username']);
        $this->view("Account",[
            "info"=>$info,
            "page"=>"editprofile",
            "page_name"=>"Chỉnh sửa thông tin tài khoản",
            "taikhoan"=>$taikhoan
        ]);
    }
    function setPassMoi($username){
        $info=$this->InfoModel->getInfo();
        if(isset($_COOKIE['username']))
			echo '<script>location.href="'.$info[0]->linkweb.'";</script>';
        $this->view("Account",[
            "info"=>$info,
            "page"=>"newmk",
            "page_name"=>"Thiết lập mật khẩu mới cho tài khoản"
        ]);
    }
    
} 
?>
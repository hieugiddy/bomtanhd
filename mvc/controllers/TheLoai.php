<?php
class TheLoai extends Controller{
    public $PhimModel;
    public $QuocGiaModel;
    public $TheLoaiModel;
    public $NamModel;
    public $InfoModel;
    public $ActorModel;
    function __construct() {
        $this->PhimModel=$this->model("PhimModel");
        $this->QuocGiaModel=$this->model("QuocGiaModel");
        $this->TheLoaiModel=$this->model("TheLoaiModel");
        $this->ActorModel=$this->model("ActorModel");
        $this->NamModel=$this->model("NamModel");
        $this->InfoModel=$this->model('InfoModel');
	}
    function Home(){
        $info=$this->InfoModel->getInfo();
        $phimLe=$this->PhimModel->getPhim(0,24,"phimle","kieu");
        $phimBo=$this->PhimModel->getPhim(0,24,"phimbo","kieu");
        $vietNam=$this->PhimModel->getPhim(0,24,"viet-nam","quocgia");
        $slide=$this->PhimModel->getPhim(0,8,null,'slide');
        $theloai=$this->TheLoaiModel->getTheLoai();
        $quocgia=$this->QuocGiaModel->getQuocGia();
        $nam=$this->NamModel->getNam();
        $hot=$this->PhimModel->getPhim(0,18,null,'hot');
        $this->view("NguoiDung",[
            "page"=>"home",
            "js_name"=>"phim",
            "theloai"=>$theloai,
            "quocgia"=>$quocgia,
            "nam"=>$nam,
            "slide"=>$slide,
            "phimle"=>$phimLe,
            "phimbo"=>$phimBo,
            "phimvietnam"=>$vietNam,
            "hot"=>json_decode($hot),
            "info"=>$info
        ]);
    }
    function DanhSach($slug,$page){
        $info=$this->InfoModel->getInfo();
        $cttheloai=$this->TheLoaiModel->timTheLoai($slug);
        $theloai=$this->TheLoaiModel->getTheLoai();
        $quocgia=$this->QuocGiaModel->getQuocGia();
        $nam=$this->NamModel->getNam();
        $hot=$this->PhimModel->getPhim(0,18,null,'hot');
        try{
            if($page==0)
             throw new Exception('Yêu cầu không hợp lệ');
            $link=str_replace('/'.$page,'',$_SERVER['REQUEST_URI']);
            $limit=48;
            $start=($page-1)*$limit;
            $tongsophim=$this->PhimModel->getSLPhimTheLoai($slug);
            $tongsotrang=ceil($tongsophim/$limit);
            
            if($page>$tongsotrang)
             throw new Exception('Yêu cầu không hợp lệ');
            
        }
        catch(Exception $e){
            $start=0;
            $limit=48;
            $page=1;
            $tongsotrang=1;
            $link='#';
        }
        $phim=$this->PhimModel->getPhim($start,$limit,$slug,"theloai");
        $phantrang=$this->phanTrang($page,$tongsotrang,$link);
        $this->view("NguoiDung",[
            "page"=>"dsphim",
            "js_name"=>"phim",
            "theloai"=>$theloai,
            "quocgia"=>$quocgia,
            "nam"=>$nam,
            "phim"=>$phim,
            "phantrang"=>$phantrang,
            "info"=>$info,
            "hot"=>json_decode($hot),
            "page_name"=>json_decode($cttheloai)[0]->tenTL
        ]);
    }
    function themTheLoai(){
        $ten=$this->clear_str($_POST['ten']);
        $slug=$this->to_slug($ten);
        if($this->TheLoaiModel->timTheLoai($slug)=='false'){
            if($this->TheLoaiModel->themTheLoai($ten,$slug))
                echo '<font color="green">Thêm thành công</font>
                <script> location.href="./TheLoai";</script>
                ';
        }
        else
            echo '<font color="red">Thêm thất bại</font>';
    }
    function updateTheLoai(){
        $ten=$this->clear_str($_POST['ten']);
        $id=$_POST['id'];
        
        if($this->TheLoaiModel->suaTheLoai($id,$ten))
           echo $ten;
        else
            echo 'false';
    }
    function xoaTheLoai(){
        $id=$_POST['id'];
        if($this->TheLoaiModel->xoaTheLoai($id))
           echo '<script> location.href="./TheLoai";</script>';
        else
            echo '<font color="red">Xóa không thành công</font>';
    }
}
?>
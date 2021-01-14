<?php
class Admin extends Controller{
    public $PhimModel;
    public $InfoModel;

    function __construct() {
        $this->PhimModel=$this->model("PhimModel");
        $this->InfoModel=$this->model('InfoModel');
	}	
    function Home(){
        $info=$this->InfoModel->getInfo();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"home",
            "page_name"=>"Tổng quan"
        ]);
    }
    function QuocGia(){
        $info=$this->InfoModel->getInfo();
        $QuocGiaModel=$this->model("QuocGiaModel");
        $quocgia=$QuocGiaModel->getQuocGia();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"quocgia",
            "page_name"=>"Quốc Gia",
            "quocgia"=>$quocgia
        ]);
    }
    function TheLoai(){
        $info=$this->InfoModel->getInfo();
        $TheLoaiModel=$this->model("TheLoaiModel");
        $theloai=$TheLoaiModel->getTheLoai();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"theloai",
            "page_name"=>"Thể Loại",
            "theloai"=>$theloai
        ]);
    }
    function BinhLuan(){
        $info=$this->InfoModel->getInfo();
        $BinhLuanModel=$this->model("BinhLuanModel");
        $binhluan=$BinhLuanModel->getBinhLuan(0,25);
        
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"binhluan",
            "page_name"=>"Bình Luận",
            "binhluan"=>$binhluan
        ]);
    }
    function Phim(){
        $info=$this->InfoModel->getInfo();
        $PhimModel=$this->model("PhimModel");
        $QuocGiaModel=$this->model("QuocGiaModel");
        $phim=$PhimModel->getPhim(0,30,null,null);

        $arr=json_decode($phim);
        $quocgia=array();
        $theloai=array();
        for($i=0;$i<count($arr);$i++){
            $tmp=$QuocGiaModel->getChiTietQuocGia($arr[$i]->id);
            $quocgia[]=json_decode($tmp);
        }
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"phim",
            "page_name"=>"Quản lí phim",
            "phim"=>$phim,
            "quocgia"=>$quocgia
        ]);
    }
    function ThemPhim(){
        $info=$this->InfoModel->getInfo();
        $QuocGiaModel=$this->model("QuocGiaModel");
        $TheLoaiModel=$this->model("TheLoaiModel");
        $ActorModel=$this->model("ActorModel");

        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"themphim",
            "page_name"=>"Thêm phim mới",
            "quocgia"=>json_decode($QuocGiaModel->getQuocGia()),
            "theloai"=>json_decode($TheLoaiModel->getTheLoai()),
            "daodien"=>json_decode($ActorModel->getDaoDien()),
            "dienvien"=>json_decode($ActorModel->getDienVien())
        ]);
    }
    function SuaPhim($slug){
        $info=$this->InfoModel->getInfo();
        $QuocGiaModel=$this->model("QuocGiaModel");
        $TheLoaiModel=$this->model("TheLoaiModel");
        $ActorModel=$this->model("ActorModel");
        $PhimModel=$this->model("PhimModel");
        $LinkPhimModel=$this->model("LinkPhimModel");
        
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"suaphim",
            "page_name"=>"Sửa phim mới",
            "slug"=>$slug,
            "phim"=>$PhimModel->getPhim(-1,null,$slug,'timkiem1'),
            "quocgia"=>json_decode($QuocGiaModel->getQuocGia()),
            "theloai"=>json_decode($TheLoaiModel->getTheLoai()),
            "daodien"=>json_decode($ActorModel->getDaoDien()),
            "dienvien"=>json_decode($ActorModel->getDienVien()),
            "linkphim"=>json_decode($LinkPhimModel->getLinkPhim($slug))
        ]);
    }
    function Actor(){
        $info=$this->InfoModel->getInfo();
        $ActorModel=$this->model("ActorModel");
        $actor=$ActorModel->getActor();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"actor",
            "page_name"=>"Quản lí diễn viên, đạo diễn",
            "actor"=>json_decode($actor)
        ]);
    }
    function ThanhVien(){
        $info=$this->InfoModel->getInfo();
        $ThanhVienModel=$this->model("ThanhVienModel");
        $thanhvien=$ThanhVienModel->getThanhVien();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"thanhvien",
            "page_name"=>"Quản lí thành viên",
            "thanhvien"=>json_decode($thanhvien)
        ]);
    }
    function Setting(){
        $info=$this->InfoModel->getInfo();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"setting",
            "page_name"=>"Cài đặt trang web"
        ]);
    }
    function Recovery(){
        $info=$this->InfoModel->getInfo();
        $bang=['Info','Nam','Actor','QuocGia','TheLoai',
        'Phim','ChiTietPhim','ChiTietQuocGia',
        'ChiTietDaoDien','ChiTietDienVien',
        'ChiTietTheLoai','BinhLuan','ChiTietBinhLuan',
        'LinkPhim','DanhSachPhat','TaiKhoan'];
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"recovery",
            "page_name"=>"Sao lưu dữ liệu trang web",
            "bang"=>$bang
        ]);
    }
    function JSON(){
        $info=$this->InfoModel->getInfo();
        $this->view("Admin",[
            "info"=>$info,
            "quyen"=>"Admin",
            "page"=>"api",
            "page_name"=>"Nguồn cấp dữ liệu JSON API"
        ]);
    }
}
?>
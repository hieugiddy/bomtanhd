<?php
class Actor extends Controller
{
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
    function editActor(){
        $ten=$this->clear_str($_POST['tenActor']);
        $nghiepvu=$_POST['nghiepvu'];
        $avatar=$this->uploadAnh('avatar',$_POST['avatar-link'],$this->InfoModel->getInfo()[0]->linkweb);
        $gioithieu=$this->clear_str($_POST['gioiThieu']);
        $slug=$this->to_slug($ten);
        
        if(isset($_POST['btn-themactor'])){
            $this->ActorModel->themActor($ten,$nghiepvu,$avatar,$gioithieu,$slug);
        }
        else{
            $this->ActorModel->suaActor($_POST['idActor'],$ten,$nghiepvu,$avatar,$gioithieu,$slug);
        }
        echo '<script>location.href="../Admin/Actor"</script>';   
    }
    function ThongTin($slug,$page){
        $info=$this->InfoModel->getInfo();
        $actor=$this->ActorModel->timActor($slug);
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
            $tongsophim=$this->PhimModel->getSLPhimDienVien($slug);
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
        $phim=$this->PhimModel->getPhim($start,$limit,$slug,"dienvien");
        $phantrang=$this->phanTrang($page,$tongsotrang,$link);
        $this->view("NguoiDung",[
            "page"=>"actor",
            "js_name"=>"phim",
            "theloai"=>$theloai,
            "quocgia"=>$quocgia,
            "nam"=>$nam,
            "phim"=>$phim,
            "phantrang"=>$phantrang,
            "info"=>$info,
            "hot"=>json_decode($hot),
            "tendv"=>json_decode($actor)[0]->ten,
            "nghiepvu"=>json_decode($actor)[0]->nghiepvu,
            "avatar"=>json_decode($actor)[0]->avatar,
            "gioithieu"=>json_decode($actor)[0]->gioithieu
        ]);
    }
}

?>
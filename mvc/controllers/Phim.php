<?php
class Phim extends Controller{
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
    
    function DSPhim($page,$tongsophim,$page_name,$table,$value){
        $info=$this->InfoModel->getInfo();
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
        $phantrang=$this->phanTrang($page,$tongsotrang,$link);
        $phim=$this->PhimModel->getPhim($start,$limit,$value,$table);
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
            "page_name"=>$page_name
        ]);
    }
    function PhimLe($page){
        $tongsophim=$this->PhimModel->getSLPhimLe();
        $this->DSPhim($page,$tongsophim,"Phim lẻ mới nhất","phimle",null);
    }
    function PhimBo($page){
        $tongsophim=$this->PhimModel->getSLPhimBo();
        $this->DSPhim($page,$tongsophim,"Phim bộ mới nhất","phimbo",null);
    }
    function TopIMDB($page){
        $tongsophim=$this->PhimModel->getSoLuongPhim();
        $this->DSPhim($page,$tongsophim,"Phim có điểm IMDB cao -> thấp","imdb",null);
    }
    function XuLiTK(){
        header("Location: ./TimKiem/".$_POST['q']."/1");
    }
    function TimKiem($tukhoa,$page){
        $tongsophim=$this->PhimModel->getSLKetQuaTK($tukhoa);
        $this->DSPhim($page,$tongsophim,"Kết quả tìm kiếm cho từ khóa <u><em>".$tukhoa."</em></u>","timkiem",$tukhoa);
    }
    
    function XemPhim($slug){
        $LinkPhimModel=$this->model('LinkPhimModel');
        $BinhLuanModel=$this->model('BinhLuanModel');
        $info=$this->InfoModel->getInfo();
        $theloai=$this->TheLoaiModel->getTheLoai();
        $quocgia=$this->QuocGiaModel->getQuocGia();
        $nam=$this->NamModel->getNam();
        $hot=$this->PhimModel->getPhim(0,18,null,'hot');
        $phim=$this->PhimModel->timPhim($slug);
        //tăng lượt xem
        $this->PhimModel->tangLuotXem($slug);
        
        //lấy ds phim liên quan
        $random=$this->PhimModel->randomPhim();
        
        //lấy tên thể loại,quốc gia, diễn viên, đạo diễn
        $idPhim=json_decode($phim)[0]->id;
        $phim_tl=$this->TheLoaiModel->getChiTietTheLoai($idPhim);
        $phim_qg=$this->QuocGiaModel->getChiTietQuocGia($idPhim);
        $phim_dd=$this->ActorModel->getCTDaoDien($idPhim);
        $phim_dv=$this->ActorModel->getCTDienVien($idPhim);
        //lấy bình luận của phim
        $binhluan=json_decode($BinhLuanModel->timBinhLuanPhim($idPhim));
        if($binhluan!=false) $sobl=count($binhluan);
        else $sobl=0;
        
        //lấy ds server của phim
        $server_xem=json_decode($LinkPhimModel->getServerXem($slug));
        $server_tai=json_decode($LinkPhimModel->getServerTai($slug));
        //lấy ds link xem theo từng nhóm server lưu vào mảng
        $arr_xem=array();
        $arr_tai=array();
        if($server_xem!=false)
            foreach($server_xem as $value){
                $arr_link=array();
                $laylink=json_decode($LinkPhimModel->getLinkXem($slug,$value->server));
                foreach($laylink as $link){
                    $arr_link[]=$link;
                }
                $arr_xem[]=[$value->server=>$arr_link];
            }
        if($server_tai!=false)
            foreach($server_tai as $value){
                $arr_link=array();
                $laylink=json_decode($LinkPhimModel->getLinkTai($slug,$value->server));
                foreach($laylink as $link){
                    $arr_link[]=$link;
                }
                $arr_tai[]=[$value->server=>$arr_link];
            }

        $this->view("NguoiDung",[
            "page"=>"xemphim",
            "js_name"=>"phim",
            "theloai"=>$theloai,
            "quocgia"=>$quocgia,
            "nam"=>$nam,
            "info"=>$info,
            "hot"=>json_decode($hot),
            "phim"=>json_decode($phim)[0],
            "phim_tl"=>json_decode($phim_tl),
            "phim_qg"=>json_decode($phim_qg),
            "phim_dd"=>json_decode($phim_dd),
            "phim_dv"=>json_decode($phim_dv),
            "linkxem"=>$arr_xem,
            "linktai"=>$arr_tai,
            "phimlienquan"=>json_decode($random),
            "idphim"=>$idPhim,
            "binhluan"=>$binhluan,
            "sobl"=>$sobl
        ]);
    }
    function ThemPhimMoi(){
        $tenPhim=$this->clear_str($_POST['tenphim']);
        $kieu=$_POST['kieu'];
        $nam=$this->clear_str($_POST['nam']);
        $congtysx=$this->clear_str($_POST['congtysx']);
        $tengoc=$this->clear_str($_POST['tengoc']);
        $slug=$this->to_slug($tenPhim).'-'.$this->to_slug($tengoc);
        $gioithieu=$this->clear_str($_POST['gioithieu']);
        $status=$this->clear_str($_POST['status']);
        $imdb=$this->clear_str($_POST['imdb']);
        $trailer=$_POST['trailer'];
        $tagline=$this->clear_str($_POST['tagline']);
        $tukhoa=$this->clear_str($_POST['tukhoa']);
        $theloai=$_POST['theloai'];
        $quocgia=$_POST['quocgia'];
        $daodien=$_POST['daodien'];
        $dienvien=$_POST['dienvien'];
        $anhbia=$this->uploadAnh('anhbia',$_POST['anhbia-link'],$this->InfoModel->getInfo()[0]->linkweb);
        $poster=$this->uploadAnh('poster',$_POST['poster-link'],$this->InfoModel->getInfo()[0]->linkweb);

        if($this->PhimModel->themPhim($tenPhim,$kieu,$nam,$congtysx,$tengoc,$slug,$gioithieu,$poster,$status,$imdb,$trailer,$tagline,$anhbia,$tukhoa,$theloai,$quocgia,$daodien,$dienvien)){
            echo '<script>location.href="../Admin/Phim"</script>';            
        }
        else
            echo '<script>history.back();</script>'; 
    }
    function SuaPhimMoi(){
        $id=$_POST['id'];
        $tenPhim=$this->clear_str($_POST['tenphim']);
        $kieu=$_POST['kieu'];
        $nam=$this->clear_str($_POST['nam']);
        $congtysx=$this->clear_str($_POST['congtysx']);
        $tengoc=$this->clear_str($_POST['tengoc']);
        $slug=$this->to_slug($tenPhim).'-'.$this->to_slug($tengoc);
        $gioithieu=$this->clear_str($_POST['gioithieu']);
        $status=$this->clear_str($_POST['status']);
        $imdb=$this->clear_str($_POST['imdb']);
        $trailer=$_POST['trailer'];
        $tagline=$this->clear_str($_POST['tagline']);
        $tukhoa=$this->clear_str($_POST['tukhoa']);
        $theloai=$_POST['theloai'];
        $quocgia=$_POST['quocgia'];
        $daodien=$_POST['daodien'];
        $dienvien=$_POST['dienvien'];
        //up ảnh mới
        $anhbia=$this->uploadAnh('anhbia',$_POST['anhbia-link'],$this->InfoModel->getInfo()[0]->linkweb);
        $poster=$this->uploadAnh('poster',$_POST['poster-link'],$this->InfoModel->getInfo()[0]->linkweb);
        
        if($this->PhimModel->suaPhim($id,$tenPhim,$kieu,$nam,$congtysx,$tengoc,$slug,$gioithieu,$poster,$status,$imdb,$trailer,$tagline,$anhbia,$tukhoa,$theloai,$quocgia,$daodien,$dienvien)){
            echo '<script>location.href="../Admin/Phim"</script>';            
        }
        else
            echo '<script>history.back();</script>'; 
    }
    function xoaPhim($id,$slug){
        $this->PhimModel->xoaPhim($id,$slug);
        echo '<script>location.href="'.$this->InfoModel->getInfo()[0]->linkweb.'/Admin/Phim"</script>';
    }
    function editLink(){
        $LinkPhimModel=$this->model('LinkPhimModel');
        $idPhim=$_POST['idPhim'];
        $tenhienthi=$this->clear_str($_POST['tenhienthi']);
        $link=$_POST['link'];
        $loai=$_POST['loai'];
        $server=$this->clear_str($_POST['server']);
        
        if(isset($_POST['btn-themlink'])){
            $LinkPhimModel->themLink($idPhim,$tenhienthi,$link,$loai,$server);
        }
        else{
            $LinkPhimModel->suaLink($_POST['idLink'],$tenhienthi,$link,$loai,$server);
        }
        echo '<script>history.back();</script>';   
    }
    function xoaLinkPhim($id){
        $LinkPhimModel=$this->model('LinkPhimModel');
        $LinkPhimModel->xoaLink($id);
        echo '<script>history.back();</script>';
    }
}
?>

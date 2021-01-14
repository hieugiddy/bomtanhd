<?php
require_once './mvc/controllers/Mail.php';
class ThanhVien extends Controller{
    function editThanhVien() {
        $InfoModel=$this->model('InfoModel');
        $ThanhVienModel=$this->model('ThanhVienModel');
        try {
            if(isset($_POST['btn-themthanhvien'])){
                $username=str_replace('-','',$this->to_slug($_POST['username']));
                $t=$ThanhVienModel->timThanhVien($username);

                if($t!='false' || empty($_POST['username']))
                    throw new Exception("Username đã tồn tại");
            }
            else
                $username=$_POST['username'];
            
            $pass=$_POST['matkhau'];
            $nlpass=$_POST['again-matkhau'];
            
            if($pass!=$nlpass || !$this->validationPassword($pass))
                throw new Exception("Mật khẩu bạn nhập chưa đúng yêu cầu");
            $password=$this->xuLiPass($_POST['matkhau'],11);
            $ten=$this->clear_str($_POST['tenTV']);
            $trangthai=0;
            if(isset($_POST['quyen']))
                $quyen=$_POST['quyen'];
            else
                $quyen=0;
            $avatar=$this->uploadAnh('avatar',$_POST['avatar-link'],$InfoModel->getInfo()[0]->linkweb);
            $email=$this->clear_str($_POST['email']);
            $gioithieu=$this->clear_str($_POST['gioiThieu']);
           
            if(isset($_POST['btn-themthanhvien']))
                $ThanhVienModel->themThanhVien($username,$password,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen);
            else{
                if(isset($_POST['hiendoimk']))
                    $ThanhVienModel->suaThanhVien($_POST['idTV'],$password,$ten,$trangthai,$avatar,$email,$gioithieu,$quyen); 
                else
                    $ThanhVienModel->suaThanhVienn($_POST['idTV'],$ten,$trangthai,$avatar,$email,$gioithieu,$quyen); 
            }
            
            if(isset($_POST['kichhoat']))
                $ThanhVienModel->kichHoatTaiKhoan($username);
            if(isset($_POST['dangky-tk'])){
                //gửi mail kích hoạt tk
                $obj=new Mail();
                $linkkh='http://localhost:3000'.$InfoModel->getInfo()[0]->linkweb.'/ThanhVien/kichHoatTaiKhoan/'.$username;
                $tieudethu='Kich Hoat Tai Khoan Xem Phim BomTanHD';
                $noidungthu='<h4>Thư xác minh tài khoản xem phim trên BomTanHD</h4>
                <p>Xin chào '.$ten.'!</p>
                <p>Link kích hoạt tài khoản của bạn là <a href="'.$linkkh.'" target="_blank">'.$linkkh.'</a></p>
                ';
                $motathu='BomTanHD - Film Bom Tấn Hành Động HD';
                $obj->guiMail($email,$ten,$tieudethu,$noidungthu,$motathu);
                echo "<script>location.href='../Account'</script>"; 
            }
            else
                echo "<script>location.href='../Admin/ThanhVien'</script>"; 
        }
        catch (Exception $e) {
            echo "<script>alert('".$e->getMessage()."');";
            echo "history.back()</script>"; 
        }
    }
    function xoaThanhVien($id){
        $ThanhVienModel=$this->model('ThanhVienModel');
        $ThanhVienModel->xoaThanhVien($id);
        echo "<script>history.back()</script>"; 
    }
    function dangNhap() {
        try{
            $ThanhVienModel=$this->model('ThanhVienModel');
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                if($ThanhVienModel->timThanhVien($_POST['username'])=='true'){
                    $hash=$ThanhVienModel->layPass($_POST['username']);
                    if($this->xacMinhPass($_POST['password'],$hash)){
                        $trangthai=$ThanhVienModel->layTrangThai($_POST['username']);
                        if($trangthai=='1'){
                            $quyen=$ThanhVienModel->layInfo($_POST['username'])->quyen;
                            $ten=$ThanhVienModel->layInfo($_POST['username'])->ten;
                            $avatar=$ThanhVienModel->layInfo($_POST['username'])->avatar;
                            setcookie("username",$_POST['username'],time()+360000,"/","",0);
                            setcookie("quyen",$quyen,time()+360000,"/","",0);
                            setcookie("ten",$ten,time()+360000,"/","",0);
                            setcookie("avatar",$avatar,time()+360000,"/","",0);
                            $arr=explode('/',$_SERVER['REQUEST_URI']);
                            $link='/'.$arr[1];
                            
                            header('Location: '.$link);
                        }
                        else
                            throw new Exception('Tài khoản của bạn chưa được kích hoạt.Vui lòng check mail để kích hoạt');
                    } 
                    else
                        throw new Exception('Password không đúng');
                }
                else
                    throw new Exception('Username vừa nhập không tồn tại');
            }
            else
                throw new Exception('Vui lòng không được để trống');
        }
        catch(Exception $e){
            echo "<script>alert('".$e->getMessage()."');";
            echo "history.back()</script>";
        }
    }
    function kichHoatTaiKhoan($username){
        $ThanhVienModel=$this->model('ThanhVienModel')->kichHoatTaiKhoan($username);
        echo 'Chúc mừng bạn '.$username.' đã kích hoạt tài khoản thành công.  ';
        $arr=explode('/',$_SERVER['REQUEST_URI']);
        $link='/'.$arr[1].'/Account';
        
        echo '<a href="'.$link.'" style="color:blue"><u>Đăng nhập ngay</u><a/>';
    }
    function quenMK(){
        //gửi mail kích hoạt tk
        $InfoModel=$this->model('InfoModel');
        $obj=new Mail();
        $linkkh='http://localhost:3000'.$InfoModel->getInfo()[0]->linkweb.'/Account/setPassMoi/'.$_POST['username'];
        $tieudethu='Doi Mat Khau Tai Khoan BomTanHD';
        $noidungthu='<h4>Chúng tôi nhận được yêu cầu đổi mật khẩu tài khoản từ bạn.</h4>
        <p>Xin chào '.$_POST['username'].'!</p>
        <p>Nhấn vào link để thiết lập mật khẩu mới cho tài khoản của bạn: <a href="'.$linkkh.'" target="_blank">'.$linkkh.'</a></p>
        ';
        $motathu='BomTanHD - Film Bom Tấn Hành Động HD';
        $obj->guiMail($_POST['email'],$_POST['username'],$tieudethu,$noidungthu,$motathu);
        echo "<script>location.href='../Account'</script>"; 
    }
    function newPass(){
        try{
            if(!$this->validationPassword($_POST['password']))
                throw new Exception("Mật khẩu bạn nhập chưa đúng yêu cầu");
            $password=$this->xuLiPass($_POST['password'],11);
            $ThanhVienModel=$this->model('ThanhVienModel');
            $ThanhVienModel->doiPass($password,$_POST['username']);
            $arr=explode('/',$_SERVER['REQUEST_URI']);
            $link='/'.$arr[1].'/Account';
            header("Location:".$link);
        }
        catch(Exception $e){
            echo "<script>alert('".$e->getMessage()."');";
            echo "history.back()</script>";
        }
        
    }
    
    function dangXuat() {
        setcookie("username","",time()-60,"/","",0);
        setcookie("quyen","",time()-60,"/","",0);
        setcookie("ten","",time()-60,"/","",0);
        setcookie("avatar","",time()-60,"/","",0);
        $arr=explode('/',$_SERVER['REQUEST_URI']);
        $link='/'.$arr[1].'/Account';
        header("Location:".$link);
    }
    function doiMK() {
        $ThanhVienModel=$this->model("ThanhVienModel");
        $hash=$ThanhVienModel->layPass($_COOKIE['username']);
        
        try{
            if(!$this->xacMinhPass($_POST['mkcu'],$hash))
                throw new Exception("Mật khẩu cũ không đúng");
            if(!$this->validationPassword($_POST['mkmoi']))
                throw new Exception("Mật khẩu bạn nhập chưa đúng yêu cầu");
            $password=$this->xuLiPass($_POST['mkmoi'],11);
            $ThanhVienModel=$this->model('ThanhVienModel');
            $ThanhVienModel->doiPass($password,$_COOKIE['username']);
            $arr=explode('/',$_SERVER['REQUEST_URI']);
            $link='/'.$arr[1].'/Account';
            header("Location:".$link);
        }
        catch(Exception $e){
            echo "<script>alert('".$e->getMessage()."');";
            echo "history.back()</script>";
        }
    }
    function EditProfile() {
        $InfoModel=$this->model('InfoModel');
        $ThanhVienModel=$this->model('ThanhVienModel');
        try {
            if(!isset($_COOKIE['username']))
                throw new Exception("Yêu cầu không hợp lệ");
            $username=$_COOKIE['username'];
            $ten=$this->clear_str($_POST['tenTV']);
            $avatar=$this->uploadAnh('avatar',$_POST['avatar-link'],$InfoModel->getInfo()[0]->linkweb);
            $email=$this->clear_str($_POST['email']);
            $gioithieu=$this->clear_str($_POST['gioiThieu']);
            $ThanhVienModel->updateProfile($username,$ten,$avatar,$email,$gioithieu);
            setcookie("username",$username,time()+360000,"/","",0);
            setcookie("ten",$ten,time()+360000,"/","",0);
            setcookie("avatar",$avatar,time()+360000,"/","",0);
            header("Location: ../");
        }
        catch (Exception $e) {
            echo "<script>alert('".$e->getMessage()."');";
            echo "history.back()</script>"; 
        }
    }
    function themVaoTuPhim($idPhim){
        try{
            if(!isset($_COOKIE['username']))
                throw new Exception();
            $username=$_COOKIE['username'];
            $ThanhVienModel=$this->model('ThanhVienModel')->themVaoTuPhim($username,$idPhim);
            echo '<script>history.back();</script>';
        }
        catch(Exception $e){
            echo '<script>history.back();</script>';
        }
    }
    function TuPhim($page){
        $info=$this->model("InfoModel")->getInfo();
        if(!isset($_COOKIE['username']))
            header('Location: '.$info[0]->linkweb);
        $username=$_COOKIE['username'];
        $theloai=$this->model("TheLoaiModel")->getTheLoai();
        $quocgia=$this->model("QuocGiaModel")->getQuocGia();
        $nam=$this->model("NamModel")->getNam();
        $hot=$this->model("PhimModel")->getPhim(0,18,null,'hot');
        
        try{
            if($page==0)
             throw new Exception('Yêu cầu không hợp lệ');
            $link=str_replace('/'.$page,'',$_SERVER['REQUEST_URI']);
            $limit=48;
            $start=($page-1)*$limit;
            //loại bỏ dấu phấy ở cuối chuỗi
            //tìm vị trí cuối cùng của dấu phẩy
            $tuphim=$this->model("ThanhVienModel")->layTuPhim($username);
            $vt=strrpos($tuphim,',',0);
            //xóa dấu phẩy
            $tuphim=substr_replace($tuphim,'',$vt,1);
            
            if($tuphim=='')
                $tuphim='-1';
            $tongsophim=count(explode(',',$tuphim));
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
        $phim=$this->model("PhimModel")->getPhim($start,$limit,$tuphim,"tuphim");
        
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
            "page_name"=>"Tủ phim của ".$username
        ]);
    }
    
}

?>
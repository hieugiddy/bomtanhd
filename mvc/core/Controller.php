<?php
class Controller{
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }
    public function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    public function clear_str($chuoi){
        $chuoi = str_replace('"', '&quot;', $chuoi);
        $chuoi = str_replace('\'', '&apos;', $chuoi);
        $chuoi = str_replace('∼', '\∼', $chuoi);
        $chuoi = str_replace('$', '\$', $chuoi);
        $chuoi = str_replace('{', '\{', $chuoi);
        $chuoi = str_replace('}', '\}', $chuoi);
        $chuoi = str_replace('!', '\!', $chuoi);
        $chuoi = str_replace(';', '\;', $chuoi);
        $chuoi = str_replace('scontent-b-pao.xx.fbcdn.net', '&nbsp;', $chuoi);
        $chuoi = str_replace('000webhostapp', '&nbsp;', $chuoi);
        return $chuoi;
    }
    public function uploadAnh($name,$link,$linkweb){
        $icon=$_FILES[$name]['name'];//lấy tên file ảnh, để lấy được $_FILES thì form phải có  enctype="multipart/form-data"
        if ($icon!="") {
        if($_FILES[$name]["name"]!=NULL)
        {
        
        if($_FILES[$name]["type"]=="image/jpeg"
        ||$_FILES[$name]["type"]=="image/png"
        ||$_FILES[$name]["type"]=="image/gif"
        ||$_FILES[$name]["type"]=="image/x-icon"
        )
        {
        
        
        // kiem tra su ton tai cua file
        if (file_exists("./public/img/upload/" . $_FILES[$name]["name"])) 
        {
        echo $_FILES[$name]["name"]." file da ton tai. ";
        }
        
        else{
        
        $path = "./public/img/upload/"; // file luu vào thu muc chua file upload
        $tmp_name = $_FILES[$name]["tmp_name"];
        $ten = date('dmYHis').str_replace(" ", "", basename($_FILES[$name]["name"]));
        $type = $_FILES[$name]['type']; 
        $size = $_FILES[$name]['size']; 
        // Upload file
        move_uploaded_file($tmp_name,$path.$ten);
        $hinhanh=$linkweb.'/public/img/upload/'.$ten;
        }
        }
        else {
        echo "file duoc chon khong hop le";
        }
        }
        else 
        {
        echo "vui long chon file";
        }
            
        }
        else{
                $hinhanh=$link;
            }
     return $hinhanh;
    }
    public function xuLiPass($pass,$dophuctap){
        $options = [
            'cost' => $dophuctap
          ];
        return password_hash($pass, PASSWORD_BCRYPT, $options);
    }
    public function xacMinhPass($pass,$hash){
        if(password_verify($pass, $hash)) {
            return true;
        } else {
            return false;
        }
    }
    public function validationPassword($password){
        //regex
        if(!empty($password)) {
            if (strlen($password) < '8') {
                return false;
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                return false;
            }
            elseif(!preg_match("#^[A-Z]{1,1}$#",substr($password,0,1))) {
                //kí tự đầu phải in hoa
                return false;
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                return false;
            }
            else return true;
        }
        else 
            return false;
    }
    function phanTrang($page,$tongsotrang,$link){
        $str='';
        if($tongsotrang>0){
           $j=1;
           if($page!=1) {
                $str.='<a href="'.$link.'/1">&lt;&lt;</a>'; //về đầu
                $str.='<a href="'.$link.'/'.($page-1).'"> &lt;</a>'; // về trước
           }
           for($i=$page;$i<=$tongsotrang;$i++){
                if($j==6)
                    break;
                if($page==$i)
                    $str.='<span>'.$i.'</span>';
                else
                    $str.='<a href="'.$link.'/'.$i.'">'.$i.'</a>';
                $j++;
           }
           if(($page+5)<=$tongsotrang) $str.='<a href="'.$link.'/'.($page+5).'"> &gt;</a>';//về sau
           if($page<$tongsotrang) $str.='<a href="'.$link.'/'.$tongsotrang.'">&gt;&gt;</a>';//về cuối
        }
        return $str;
    }
}
?>
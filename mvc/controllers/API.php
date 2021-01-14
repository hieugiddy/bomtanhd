<?php
class API extends Controller{
    public $InfoModel;
    public $ActorModel;
    public $BinhLuanModel;
    public $DSPhatModel;
    public $LinkPhimModel;
    public $NamModel;
    public $PhimModel;
    public $QuocGiaModel;
    public $ThanhVienModel;
    public $TheLoaiModel;
    function __construct() {
        $this->InfoModel=$this->model('InfoModel');
        $this->ActorModel=$this->model('ActorModel');
        $this->BinhLuanModel=$this->model('BinhLuanModel');
        $this->DSPhatModel=$this->model('DSPhatModel');
        $this->LinkPhimModel=$this->model('LinkPhimModel');
        $this->NamModel=$this->model('NamModel');
        $this->PhimModel=$this->model('PhimModel');
        $this->QuocGiaModel=$this->model('QuocGiaModel');
        $this->ThanhVienModel=$this->model('ThanhVienModel');
        $this->TheLoaiModel=$this->model('TheLoaiModel');
    }	
    function getData(){
        $info=$this->InfoModel->getInfo();
        $nam=json_decode($this->NamModel->getNam());
        $actor=json_decode($this->ActorModel->getActor());
        $quocgia=json_decode($this->QuocGiaModel->getQuocGia());
        $theloai=json_decode($this->TheLoaiModel->getTheLoai());
        $phim=json_decode($this->PhimModel->getALL());
        $chitietphim=json_decode($this->PhimModel->getChiTietPhim());
        $chitietquocgia=json_decode($this->QuocGiaModel->getCTQuocGia());
        $chitietdaodien=json_decode($this->ActorModel->getChiTietDaoDien());
        $chitietdienvien=json_decode($this->ActorModel->getChiTietDienVien());
        $chitiettheloai=json_decode($this->TheLoaiModel->getCTTheLoai());
        $binhluan=json_decode($this->BinhLuanModel->getAllBinhLuan());
        $chitietbinhluan=json_decode($this->BinhLuanModel->getAllChiTietBinhLuan());
        $linkphim=json_decode($this->LinkPhimModel->getALL());
        $danhsachphat=json_decode($this->DSPhatModel->getDSPhat());
        $taikhoan=json_decode($this->ThanhVienModel->getThanhVien());
        
        $data[]=['Info'=>$info,
                 'Nam'=>$nam,
                 'Actor'=>$actor,
                 'QuocGia'=>$quocgia,
                 'TheLoai'=>$theloai,
                 'Phim'=>$phim,
                 'ChiTietPhim'=>$chitietphim,
                 'ChiTietQuocGia'=>$chitietquocgia,
                 'ChiTietDaoDien'=>$chitietdaodien,
                 'ChiTietDienVien'=>$chitietdienvien,
                 'ChiTietTheLoai'=>$chitiettheloai,
                 'BinhLuan'=>$binhluan,
                 'ChiTietBinhLuan'=>$chitietbinhluan,
                 'LinkPhim'=>$linkphim,
                 'DanhSachPhat'=>$danhsachphat,
                 'TaiKhoan'=>$taikhoan];
        return $data;
    }
    function DSBang(){
        return ['Info','Nam','Actor','QuocGia','TheLoai',
                'Phim','ChiTietPhim','ChiTietQuocGia',
                'ChiTietDaoDien','ChiTietDienVien',
                'ChiTietTheLoai','BinhLuan','ChiTietBinhLuan',
                'LinkPhim','DanhSachPhat','TaiKhoan'];
    }
    function XuatExcel(){
        $cots=$this->DSBang();
        $datas=$this->getData()[0];
        $bangChuCai=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        //  Include thư viện PHPExcel_IOFactory vào
        require_once './public/thuvien/PHPExcel/Classes/PHPExcel/IOFactory.php';
        // Loại file cần ghi là file excel phiên bản 2007 trở đi
        $fileType = 'Excel2007';
        
        // Nơi lưu file
        $fileName = '/public/backup/excel/backup-'.date('dmYHis').'.xlsx';
        // Load file 
        $objPHPExcel = new PHPExcel();
        //Thiết lập thông tin cho File Excel
        $objPHPExcel->getProperties()
            ->setCreator($this->InfoModel->getInfo()[0]->tacgia)
            ->setLastModifiedBy($this->InfoModel->getInfo()[0]->tacgia)
            ->setTitle($this->InfoModel->getInfo()[0]->tieude)
            ->setSubject($this->InfoModel->getInfo()[0]->tenweb)
            ->setDescription($this->InfoModel->getInfo()[0]->mota)
            ->setKeywords($this->InfoModel->getInfo()[0]->tukhoa)
            ->setCategory("Sao lưu Database Phim");

        
        //Tạo sheet 
        for($i=count($cots)-1;$i>=0;$i--){
            $newSheet = new PHPExcel_Worksheet($objPHPExcel,$this->DSBang()[$i]);
            $objPHPExcel->addSheet($newSheet, 0);
        }

        
        for($i=0;$i<count($cots);$i++){
            for($j=0;$j<count($datas[$cots[$i]]);$j++){
                $k=0;
                foreach($this->getData()[0][$this->DSBang()[$i]][$j] as $key=>$value){
                    if($j==0){
                        // Thiết lập tên các cột dữ liệu
                        $objPHPExcel->setActiveSheetIndex($i)->setCellValue($bangChuCai[$k].'1', $key);
                    }
                    // Chèn dữ liệu
                    $objPHPExcel->setActiveSheetIndex($i)->setCellValue($bangChuCai[$k].($j+2), $value);
                    $k++;
                }
            }
        }
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
         // Tiến hành ghi file
         $objWriter->save('.'.$fileName); 
         echo '<script>location.href="'.$this->InfoModel->getInfo()[0]->linkweb.$fileName.'";</script>';
         
    }
    function XuatSQL()
    {
        require_once ('./public/thuvien/shuttle_export/dumper.php');
        $fileName='/public/backup/sql/backup-'.date('dmYHis').'.sql';
        try {
            $dumper = Shuttle_Dumper::create(array(
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
                'db_name' => 'bomtanhd',
            ));
            $dumper->dump('.'.$fileName);
            echo '<script>location.href="'.$this->InfoModel->getInfo()[0]->linkweb.$fileName.'";</script>';
            
        } catch(Shuttle_Exception $e) {
            echo "Couldn't dump database: " . $e->getMessage();
        }
    }
    function XuatSQLTheoBang(){
        require_once ('./public/thuvien/shuttle_export/dumper.php');
        $fileName='/public/backup/sql/backup-'.date('dmYHis').'.sql';
        try {
            $dumper = Shuttle_Dumper::create(array(
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
                'db_name' => 'bomtanhd',
                'include_tables' => $_POST['bang'],
            ));
            $dumper->dump('.'.$fileName);
            echo '<script>location.href="'.$this->InfoModel->getInfo()[0]->linkweb.$fileName.'";</script>';
            
        } catch(Shuttle_Exception $e) {
            echo "Couldn't dump database: " . $e->getMessage();
        }
    }
    function XuatAllPhim($page){
        header("Content-Type: application/json");
        $slphim=$this->PhimModel->getSoLuongPhim();
        $limit=24;
        $tongsotrang=ceil((int)$slphim/$limit);
        $start=$page*$limit;
        if($start>=$tongsotrang)
            echo 'Yêu cầu không hợp lệ';
        else
            {
                $phim=$this->PhimModel->getPhim($start,$limit,null,null);
                echo $phim;
                return $phim;
            }
    }
    function XuatPhim($slug){
        header("Content-Type: application/json");
        $phim=$this->PhimModel->timPhim($slug);
        echo $phim;
        return $phim;
    }
    function XuatInfoActor($slug){
        header("Content-Type: application/json");
        $actor=$this->ActorModel->timActor($slug);
        echo $actor;
        return $actor;
    }
}

?>
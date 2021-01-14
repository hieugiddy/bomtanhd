<?php
class Info extends Controller{
    function suaInfo(){
        $InfoModel=$this->model('InfoModel');
        $tieude=$this->clear_str($_POST['tieude']);
        $tenweb=$this->clear_str($_POST['tenweb']);
        $mota=$this->clear_str($_POST['mota']);
        $tukhoa=$this->clear_str($_POST['tukhoa']);
        $favicon=$this->uploadAnh('favicon',$_POST['favicon-link'],$InfoModel->getInfo()[0]->linkweb);
        $logo=$this->uploadAnh('logo',$_POST['logo-link'],$InfoModel->getInfo()[0]->linkweb);
        $tacgia=$this->clear_str($_POST['tacgia']);
        if(isset($_POST['btn-luutt']))
            $InfoModel->suaInfo($tieude,$tenweb,$mota,$tukhoa,$favicon,$logo,$tacgia);
        echo "<script>location.href='../Admin/Setting'</script>"; 
    }
}
?>
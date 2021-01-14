<?php
class PhimModel extends DB{
	function getALL(){
		return $this->select('phim','*',null,null,null); 
	}
	function randomPhim(){
		return $this->select('phim,chitietphim','*','where phim.id=chitietphim.id ORDER BY RAND()',null,'limit 12'); 
	}
	function getChiTietPhim(){
		return $this->select('chitietphim','*',null,null,null); 
	}
	function getSoLuongPhim(){
		return json_decode($this->select('phim','count(id) as sl',null,null,null))[0]->sl; 
	}
	function getSLKetQuaTK($tukhoa){
		return json_decode($this->select('phim','count(id) as sl','where tenPhim like "%'.$tukhoa.'%"',null,null))[0]->sl; 
	}
	function getSLPhimLe(){
		return json_decode($this->select('phim','count(id) as sl','where kieu="phimle"',null,null))[0]->sl; 
	}
	function getSLPhimBo(){
		return json_decode($this->select('phim','count(id) as sl','where kieu="phimbo"',null,null))[0]->sl; 
	}
	function getSLPhimTheLoai($slug){
		return json_decode($this->select('chitiettheloai','count(idPhim) as sl','where idTheLoai=?',array($slug),null))[0]->sl; 
	}
	function getSLPhimQuocGia($slug){
		return json_decode($this->select('chitietquocgia','count(idPhim) as sl','where idQuocGia=?',array($slug),null))[0]->sl; 
	}
	function getSLPhimNam($nam){
		return json_decode($this->select('phim','count(id) as sl','where nam=?',array($nam),null))[0]->sl; 
	}
	function getSLPhimDienVien($slug){
		return json_decode($this->select('chitietdienvien','count(idPhim) as sl','where idDienVien=?',array($slug),null))[0]->sl; 
	}
	function getSLPhimDaoDien($slug){
		return json_decode($this->select('chitietdaodien','count(idPhim) as sl','where idDaoDien=?',array($slug),null))[0]->sl; 
	}
	function timPhim($slug){
		return $this->select('phim,chitietphim','*','where phim.id=chitietphim.id and slug=?',array($slug),null); 
	}
	function tangLuotXem($slug){
		$luotxem=json_decode($this->select('phim','luotxem','where slug=?',array($slug),null))[0]->luotxem+1; 
		return $this->update('phim','luotxem','where slug=?',array($luotxem,$slug));
	}
	public function getPhim($start,$soluong,$value,$loai){
		$limit='';
		if($start!=-1)
			$limit.='limit '.$start;
		if($soluong!=null)
			$limit.=','.$soluong;
		switch ($loai) {
			case 'quocgia':
				$table='phim,chitietphim,chitietquocgia';
				$column='*';
				$where='where phim.id=chitietphim.id and phim.id=chitietquocgia.idPhim and idQuocGia=? order by ngaydang DESC';
				$value_wh=array($value);
				break;
			case 'kieu':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and kieu=? order by ngaydang DESC';
				$value_wh=array($value);
				break;
			case 'theloai':
				$table='phim,chitietphim,chitiettheloai';
				$column='*';
				$where='where phim.id=chitietphim.id and phim.id=chitiettheloai.idPhim and idTheLoai=? order by ngaydang DESC';
				$value_wh=array($value);
				break;
			case 'nam':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and nam=? order by ngaydang DESC';
				$value_wh=array($value);
				break;
			case 'slide':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and anhbia IS NOT NULL order by ngaydang DESC';
				$value_wh=null;
				break;
			case 'timkiem':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and tenPhim like "%'.$value.'%"';
				$value_wh=null;
				break;
			case 'timkiem1':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and slug=?';
				$value_wh=array($value);
				break;
			case 'phimle':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and kieu="phimle" order by ngaydang DESC';
				$value_wh=null;
				break;
			case 'phimbo':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and kieu="phimbo" order by ngaydang DESC';
				$value_wh=null;
				break;
			case 'imdb':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id order by imdb DESC';
				$value_wh=null;
				break;
			case 'hot':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id order by luotxem DESC';
				$value_wh=null;
				break;
			case 'dienvien':
				$table='phim,chitietphim,chitietdienvien';
				$column='*';
				$where='where phim.id=chitietphim.id and chitietphim.id=chitietdienvien.idPhim and chitietdienvien.idDienVien=? order by ngaydang DESC';
				$value_wh=array($value);
				break;
			case 'daodien':
				$table='phim,chitietphim,chitietdaodien';
				$column='*';
				$where='where phim.id=chitietphim.id and chitietphim.id=chitietdaodien.idPhim and chitietdaodien.idDaoDien=? order by ngaydang DESC';
				$value_wh=array($value);
				break;
			case 'tuphim':
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id and phim.id IN ('.$value.') order by ngaydang DESC';
				$value_wh=null;
				break;
			default:
				$table='phim,chitietphim';
				$column='*';
				$where='where phim.id=chitietphim.id order by ngaydang DESC';
				$value_wh=null;
				break;
		}
		return $this->select($table,$column,$where,$value_wh,$limit);
	}
	function themPhim($tenPhim,$kieu,$nam,$congtysx,$tengoc,$slug,$gioithieu,$poster,$status,$imdb,$trailer,$tagline,$anhbia,$tukhoa,$theloai=[],$quocgia=[],$daodien=[],$dienvien=[]){
		$str_theloai='';
		$str_quocgia='';
		$str_daodien='';
		$str_dienvien='';
		$phim=$this->insert('phim','tenPhim,kieu,slug,nam,congtysx,tengoc',array($tenPhim,$kieu,$slug,$nam,$congtysx,$tengoc));
		$id=json_decode($this->select('phim','id','order by id DESC',null,'limit 1'))[0]->id;
		
		$chitietphim=$this->insert('chitietphim','id,gioithieu,vote,poster,status,imdb,trailer,tagline,anhbia,tukhoa',array($id,$gioithieu,0,$poster,$status,$imdb,$trailer,$tagline,$anhbia,$tukhoa));
		for($i=0;$i<count($theloai);$i++){
			$str_theloai.=$theloai[$i].',';
			$chitiettheloai=$this->insert('chitiettheloai','idPhim,idTheLoai',array($id,$theloai[$i]));
		}
		for($i=0;$i<count($quocgia);$i++){
			$str_quocgia.=$quocgia[$i].',';
			$chitietquocgia=$this->insert('chitietquocgia','idPhim,idQuocGia',array($id,$quocgia[$i]));
		}
		for($i=0;$i<count($daodien);$i++){
			$str_daodien.=$daodien[$i].',';
			$chitietdaodien=$this->insert('chitietdaodien','idPhim,idDaoDien',array($id,$daodien[$i]));
		}
		for($i=0;$i<count($dienvien);$i++){
			$str_dienvien.=$dienvien[$i].',';
			$chitietdienvien=$this->insert('chitietdienvien','idPhim,idDienVien',array($id,$dienvien[$i]));
		}
		$phimtt=$this->update('phim','theloai,quocgia,daodien,dienvien','where id=?',array($str_theloai,$str_quocgia,$str_daodien,$str_dienvien,$id));
		return $phim && $chitietphim && $chitietdaodien && $chitietdienvien && $chitiettheloai && $chitietquocgia && $phimtt;
	}
	function suaPhim($id,$tenPhim,$kieu,$nam,$congtysx,$tengoc,$slug,$gioithieu,$poster,$status,$imdb,$trailer,$tagline,$anhbia,$tukhoa,$theloai=[],$quocgia=[],$daodien=[],$dienvien=[]){
		$str_theloai='';
		$str_quocgia='';
		$str_daodien='';
		$str_dienvien='';
		$phim=$this->update('phim','tenPhim,kieu,slug,nam,congtysx,tengoc','where id=?',array($tenPhim,$kieu,$slug,$nam,$congtysx,$tengoc,$id));
		
		$chitietphim=$this->update('chitietphim','gioithieu,poster,status,imdb,trailer,tagline,anhbia,tukhoa','where id=?',array($gioithieu,$poster,$status,$imdb,$trailer,$tagline,$anhbia,$tukhoa,$id));
		$xoatl=$this->delete('chitiettheloai','where idPhim=?',array($id));
		$xoaqg=$this->delete('chitietquocgia','where idPhim=?',array($id));
		$xoadd=$this->delete('chitietdaodien','where idPhim=?',array($id));
		$xoadv=$this->delete('chitietdienvien','where idPhim=?',array($id));
		for($i=0;$i<count($theloai);$i++){
			$str_theloai.=$theloai[$i].',';
			$chitiettheloai=$this->insert('chitiettheloai','idPhim,idTheLoai',array($id,$theloai[$i]));
		}
		for($i=0;$i<count($quocgia);$i++){
			$str_quocgia.=$quocgia[$i].',';
			$chitietquocgia=$this->insert('chitietquocgia','idPhim,idQuocGia',array($id,$quocgia[$i]));
		}
		for($i=0;$i<count($daodien);$i++){
			$str_daodien.=$daodien[$i].',';
			$chitietdaodien=$this->insert('chitietdaodien','idPhim,idDaoDien',array($id,$daodien[$i]));
		}
		for($i=0;$i<count($dienvien);$i++){
			$str_dienvien.=$dienvien[$i].',';
			$chitietdienvien=$this->insert('chitietdienvien','idPhim,idDienVien',array($id,$dienvien[$i]));
		}
		$phimtt=$this->update('phim','theloai,quocgia,daodien,dienvien','where id=?',array($str_theloai,$str_quocgia,$str_daodien,$str_dienvien,$id));
		return $phim && $chitietphim && $xoatl && $xoaqg && $xoadd && $xoadv && $chitietdaodien && $chitietdienvien && $chitiettheloai && $chitietquocgia && $phimtt;
	}
	function xoaPhim($id,$slug){
		$chitietdaodien=$this->delete('chitietdaodien','where idPhim=?',array($id));
		$chitietdienvien=$this->delete('chitietdienvien','where idPhim=?',array($id));
		$chitietquocgia=$this->delete('chitietquocgia','where idPhim=?',array($id));
		$chitiettheloai=$this->delete('chitiettheloai','where idPhim=?',array($id));
		$chitietphim=$this->delete('chitietphim','where id=?',array($id));
		$phim=$this->delete('phim','where id=?',array($id));
		$chitietbinhluan=$this->delete('chitietbinhluan','where idPhim=?',array($id));
		$linkphim=$this->delete('linkphim','where idPhim=?',array($slug));
		return $chitietdaodien && $chitietdienvien && $chitietquocgia && $chitiettheloai && $chitietphim && $phim;
	}
}

?>
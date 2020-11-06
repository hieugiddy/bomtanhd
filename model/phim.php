<?php
/**
 *
 */
class Phim {
	public $id;
	public $ten;
	public $status;
	public $ngayphathanh;
	public $tmdb;
	public $imdb;
	public $gioithieu;
	public $trailer;
	public $tukhoa;
	public $tagline;
	public $poster;
	public $anhbia;
	public $nam;
	public $theloai;
	public $quocgia;
	public $congtysx;
	public $daodien;
	public $dienvien;
	public $vote;
	public $tengoc;
	public $slug;

	function __construct() {
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}

	function __construct1($id, $ten, $status, $ngayphathanh, $tmdb, $imdb, $gioithieu, $trailer, $tukhoa, $tagline, $poster, $anhbia, $nam, $theloai, $quocgia, $congtysx, $daodien, $dienvien, $vote, $tengoc, $slug) {
		$this->id           = $id;
		$this->ten          = $ten;
		$this->status       = $status;
		$this->ngayphathanh = $ngayphathanh;
		$this->tmdb         = $tmdb;
		$this->imdb         = $imdb;
		$this->gioithieu    = $gioithieu;
		$this->trailer      = $trailer;
		$this->tukhoa       = $tukhoa;
		$this->tagline      = $tagline;
		$this->poster       = $poster;
		$this->anhbia       = $anhbia;
		$this->nam          = $nam;
		$this->theloai      = $theloai;
		$this->quocgia      = $quocgia;
		$this->congtysx     = $congtysx;
		$this->daodien      = $daodien;
		$this->dienvien     = $dienvien;
		$this->vote         = $vote;
		$this->tengoc       = $tengoc;
		$this->slug         = $slug;
	}
	function __construct2($id) {
		$this->id = $id;

	}

	

}

?>
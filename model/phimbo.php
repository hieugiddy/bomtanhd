<?php
/**
 *
 */
include ('phim.php');

class PhimBo extends Phim {
	public $soTap;
	function __construct() {
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}
	function __construct1($soTap, $id, $ten, $status, $ngayphathanh, $tmdb, $imdb, $gioithieu, $trailer, $tukhoa, $tagline, $poster, $anhbia, $nam, $theloai, $quocgia, $congtysx, $daodien, $dienvien, $vote, $tengoc, $slug) {
		parent::__construct();
		$this->soTap = $soTap;
	}

	
}
?>
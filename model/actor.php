<?php
class Actor{
	public $id;
	public $ten;
	public $nghenghiep;
	public $avatar;
	public $gioithieu;
	public $slug;

	public function __construct Actor(){
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}

	public function __construct1 Actor($id,$ten,$nghenghiep,$avatar,$gioithieu,$slug){
		this::$id=$id;
		this::$ten=$ten;
		this::$nghenghiep=$nghenghiep;
		this::$avatar=$avatar;
		this::$gioithieu=$gioithieu;
		this::$slug=$slug;
	}

	
}
?>
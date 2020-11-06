<?php
class QuocGia{
	public $id;
	public $ten;
	public $slug;

	public function __construct QuocGia(){
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct'.$i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}

	public function __construct QuocGia($id,$ten,$slug){
		this::$id=$id;
		this::$ten=$ten;
		this::$slug=$slug;
	}

	
}
?>
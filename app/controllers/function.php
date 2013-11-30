<?php
	function hashit($c,$a) 
	{
		$salt="GC_ZXCVBN".$c;  	//salt值
		$b=$a.$salt;  			//把密码和salt连接
		$b=md5($b);  			//执行MD5散列
		return $b;  			
	}
?>
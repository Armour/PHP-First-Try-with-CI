<?php
	function hashit($c,$a) 
	{
		$salt="GC_ZXCVBN".$c;  	//salt值
		$b=$a.$salt;  			//把密码和salt连接
		$b=md5($b);  			//执行MD5散列
		return $b;  			
	}
		
	function check_input($value)
	{
		// 去除斜杠
		if (get_magic_quotes_gpc())
		{
			$value = stripslashes($value);
		}
		
		// 防sql注入
		$value = mysql_real_escape_string($value);
		return $value;
	}	
?>
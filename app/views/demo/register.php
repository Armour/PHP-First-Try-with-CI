<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="http://localhost/CI/sth/register_check.js"></script>
	<script> function RefreshCode(obj){ obj.src = "http://localhost/CI/sth/graph.php?code=" + Math.random(); } </script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<form name="reg_user" method="post" action="register">
<table width="900" height="270" border="1" align="center" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
	<tr>
		<td width=10% height="30">
			<div id="reg_name" align ="right">用户名: </div>
		</td>
		<td width=50% height="30">
			<div align="left">&nbsp; 
				<input id="reg_name2" type="text" name="name" size="50" maxlength="50">
				<font color="pink">(必填!)</font>
			</div>
		</td>
		<td width=30% height="30" id="reg_name3">&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_psw" align ="right">注册密码: </div>
		</td>
		<td height="30">
			<div align="left">&nbsp;
				<input id="reg_psw2" type="password" name="psw" size="50" maxlength="50">
				<font color="pink">(必填!)</font>
			</div>
		</td>
		<td height="30" id="reg_psw3">&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_repsw" align ="right">确认密码: </div>
		</td>
		<td height="30">
			<div align="left">&nbsp;
				<input id="reg_repsw2" type="password" name="repsw" size="50" maxlength="50">
				<font color="pink">(必填!)</font>
			</div>	
		</td>
		<td height="30" id="reg_repsw3">&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div align ="right"> </div>
		</td>
		<td height="30" >&nbsp; </td>
		<td height="30" >&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_realname" align ="right">真实姓名: </div>
		</td>
		<td height="30">
			<div align="left">&nbsp;
				<input id="reg_realname2" type="text" name="realname" size="50" maxlength="50">
			</div>
		</td>
		<td height="30" id="reg_realname3">&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_sex" align ="right">性别: </div>
		</td>
		<td height="30">
		    <div id="reg_sex2" align="left">&nbsp;
				<input type="radio" name="sex" value="男" checked> 男
				<input type="radio" name="sex" value="女"> 女
			</div>
		</td>
		<td height="30" >&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_IDcard" align ="right">身份证号: </div>
		</td>
		<td height="30">
			<div align="left">&nbsp;
				<input id="reg_IDcard2" type="text" name="IDcard" size="50" maxlength="50">	
				<font color="pink">(必填!)</font> 
			</div>
		</td>
		<td height="30" id="reg_IDcard3">&nbsp; </td>
	</tr>
	
	<tr>
 		<td height="30">
 			<div id="reg_gtel" align="right">固定电话: </div>
 		</td>
 		<td height="30"> 
 			<div align="left">&nbsp;
 				<input id="reg_gtel2" type="text" name="gtel" size="50"  maxlength="50">
 			</div>
 		</td>
		<td height="30" id="reg_gtel3">&nbsp; </td>
 	</tr>
 	  
 	<tr>
 		<td height="30">
 			<div id="reg_mtel" align="right">移动电话: </div>
 		</td>
 		<td height="30">
 			<div align="left">&nbsp;
 				<input id="reg_mtel2" type="text" name="mtel" size="50"  maxlength="50">
 			</div>
 		</td>
		<td height="30" id="reg_mtel3">&nbsp; </td>
 	</tr>
 	
	<tr>
		<td height="30">
			<div id="reg_email" align="right">E-mail: </div>
		</td>
		<td height="30">
			<div align="left">&nbsp;
				<input id="reg_email2" type="text" name="email" size="50"  maxlength="50">		
				<font color="pink">(必填!)</font> 
			</div>
		</td>
		<td height="30" id="reg_email3">&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_home" align ="right">家庭住址: </div>
		</td>
		<td height="30">
			<div align="left">&nbsp;
				<input id="reg_home2" type="text" name="home" size="50"  maxlength="50">
			</div>
		</td>
		<td height="30" id="reg_home3">&nbsp; </td>
	</tr>
	
	<tr>
		<td height="30">
			<div id="reg_code" align ="right">验证码: </div>
		</td>
		<td height="30">
			<div  align="left">&nbsp;
				<input id="reg_code2" type="text" name="code" size="10">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img id="reg_image" src="http://localhost/CI/sth/graph.php" width="100" height="30" onclick="RefreshCode(this)" />
				看不清? 单击图片刷新
			</div>
		</td>
		<td height="30" id="reg_code3">&nbsp; </td>
	</tr>
	
 	<tr>
 		<td width="100" height="30">
 			<div align ="right"></div>
 		</td>
 		<td width="100">
 			<div align="left">
 				&nbsp;&nbsp;
 				<input id="reg_submit" type="submit" name="submit" value="提交"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="reg_reset" type="reset" name="reset" value="重置"/>
			</div>
 		</td>
		<td height="30"> &nbsp; </td>
 	</tr>
 	

</table>
</form>
</body>
</html>
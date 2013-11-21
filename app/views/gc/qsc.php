<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form name="used_user" method="post" target="_self">
<table width="400" height="50" " border="1" align="center" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
	<tr>	
		<td width="150" height="30">
			<div align ="center">
				欢迎光临禽兽潮！无节操的
				<?php 
					if (!isset($_SESSION)) session_start();
					$name = $_SESSION["name"];
					echo "$name".'~';
				?>
			</div>   
		</td>
	</tr>
	
	<tr>
 		<td width="150" height="20">
 			<div align="center">
 				<input id="quit" type="button" name="go_login" value="退出" onClick="location.href='login'"/>
			</div>
 		</td>
 	</tr>

</table>
</form>
</body>
</html>
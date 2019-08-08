<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>版本信息</title>
</head>
<body bgcolor="lightyellow">
<table align="center" border="0" width="1000" height="500">
	<tr height="100">
		<td><h2>欢迎使用2.0版本</h2></td>
	</tr>

 <!--<tr>
 <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">软件版本</span></div></td>
 <td height="20" align="center" bgcolor="#FFFFFF" class="STYLE19">SS3.3
 <script type="text/javascript" src="http://www.04ie.com/net/phpbook0_3.js"></script></td>
 </tr>-->
 <tr align="center">
 <td>php版本</td>
 <td><?php echo "PHP".PHP_VERSION; ?></td>
 </tr>

 <tr align="center">
 <td >服务器名：</td>
 <td ><?php echo $_SERVER['SERVER_NAME']; ?></td>
 </tr>

 <tr align="center">
 <td >服务器IP：</td>
 <td ><?php echo $_SERVER["HTTP_HOST"]; ?></td>
 </tr>

 <tr align="center"> 
 <td >服务器端口：</td>
 <td ><?php echo $_SERVER["SERVER_PORT"]; ?></td>
 </tr>

 <tr align="center">
 <td>服务器时间：</div></td>
 <td ><?php echo $showtime=date("Y-m-d H:i:s");?></td>
 </tr>

 <tr align="center">
 <td ><div align="center">服务器操作系统：</td>
 <td ><?php echo PHP_OS; ?></td>
 </tr>

 <tr align="center">
 <td >站点物理路径：</td>
 <td ><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></td>
 </tr>

 <tr align="center">
 <td >admin</div></td>
 <td >系统管理员</td>
 </tr>

 <tr align="center">
 <td>在线使用帮助</td>
 <td >查看在线帮助文档</td>
 </tr>

</table>
</body>
</html>




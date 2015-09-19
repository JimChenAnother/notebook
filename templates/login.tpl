<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset = utf-8"/>
	<title>登录页面</title>
</head>
<body>
<form action="/controller/LoginController.php" method="post">
	<table>
		<tr><td colspan="2">内部留言板</td></tr>
		<tr><td>用户名：</td><td><input type = "text" name="emp_name"/></td></tr>
		<tr><td>密&nbsp;码：</td><td><input type = "password" name="emp_pwd"/></td></tr>
		<tr><td><input type="submit" value="登录"/></td><td><input type="reset" value="重填"/></td></tr>
	</table>
</form>

</body>
</html>
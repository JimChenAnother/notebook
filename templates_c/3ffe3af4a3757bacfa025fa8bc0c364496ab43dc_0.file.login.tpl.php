<?php /* Smarty version 3.1.28-dev/30, created on 2015-07-31 13:40:22
         compiled from "F:\webservice\Apache2.4\htdocs\notebook\templates\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1838155bb0a4650c4f2_06077389%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ffe3af4a3757bacfa025fa8bc0c364496ab43dc' => 
    array (
      0 => 'F:\\webservice\\Apache2.4\\htdocs\\notebook\\templates\\login.tpl',
      1 => 1438321087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1838155bb0a4650c4f2_06077389',
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/30',
  'unifunc' => 'content_55bb0a4653c619_78221754',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bb0a4653c619_78221754')) {
function content_55bb0a4653c619_78221754 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1838155bb0a4650c4f2_06077389';
?>
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
</html><?php }
}
?>
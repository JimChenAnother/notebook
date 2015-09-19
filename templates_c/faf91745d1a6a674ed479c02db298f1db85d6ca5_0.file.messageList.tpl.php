<?php /* Smarty version 3.1.28-dev/30, created on 2015-08-01 16:52:37
         compiled from "F:\webservice\Apache2.4\htdocs\notebook\templates\messageList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2954755bc88d50e3a45_83005079%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf91745d1a6a674ed479c02db298f1db85d6ca5' => 
    array (
      0 => 'F:\\webservice\\Apache2.4\\htdocs\\notebook\\templates\\messageList.tpl',
      1 => 1438419143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2954755bc88d50e3a45_83005079',
  'variables' => 
  array (
    'res' => 0,
    'message' => 0,
    'page_banne' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/30',
  'unifunc' => 'content_55bc88d51216a8_20172118',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bc88d51216a8_20172118')) {
function content_55bc88d51216a8_20172118 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2954755bc88d50e3a45_83005079';
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset = utf-8"/>
	<title>信息列表页面</title>
</head>
<body>
<a href=""><font size="5" color="blue">发布信息</font></a>
<a href=""><font size="5" color="blue">退出系统</font></a>
<table>
	<tr><td>id</td><td>发送人</td><td>发送时间</td><td>接收人</td><td>内容</td></tr>
	<?php
$foreach_0_message_sav['s_item'] = isset($_smarty_tpl->tpl_vars['message']) ? $_smarty_tpl->tpl_vars['message'] : false;
$_from = $_smarty_tpl->tpl_vars['res']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['message']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
$foreach_0_message_sav['item'] = $_smarty_tpl->tpl_vars['message'];
?>
	<tr><td><?php echo $_smarty_tpl->tpl_vars['message']->value['mess_id'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['message']->value['sender'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['message']->value['sendtime'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['message']->value['getter'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['message']->value['content'];?>
</td></tr>
	<?php
$_smarty_tpl->tpl_vars['message'] = $foreach_0_message_sav['item'];
}
if ($foreach_0_message_sav['s_item']) {
$_smarty_tpl->tpl_vars['message'] = $foreach_0_message_sav['s_item'];
}
?>
</table>
<br/>
<?php echo $_smarty_tpl->tpl_vars['page_banne']->value;?>

</body>
</html><?php }
}
?>
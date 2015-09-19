
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
	<{foreach from = $res item=message}>
	<tr><td><{$message.mess_id}></td><td><{$message.sender}></td><td><{$message.sendtime}></td><td><{$message.getter}></td><td><{$message.content}></td></tr>
	<{/foreach}>
</table>
<br/>
<{$page_banne}>
</body>
</html>
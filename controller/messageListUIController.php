<?php
	session_start();
	//这是一个控制器，专门处理对信息分页查询
	//echo "ok";
	require_once 'smarty_inc.php';
	require_once '../model/messageModel.class.php';
	require_once '../model/mypage.class.php';
	require_once '../sqlHelper.class.php';

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	//获取总记录
	$mysqli = new SqlHelper();
	$sql = "select count(*) from message where getter = '".$_SESSION['loginname']."'";
	$mypage = new Mypage($page, 7, 5, $mysqli->pagingCount($sql));
	$mypage->goToURL = 'messageListUIController.php';
	
	$messageModel = new MessageModel();
	$smarty->assign('res', $messageModel->showMessageByPage($mypage, $_SESSION['loginname']));
	$smarty->assign('page_banne', $mypage->navigationBar());
	$smarty->display("messageList.tpl");
?>
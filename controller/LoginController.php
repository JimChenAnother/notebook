<?php

	//echo $emp_name.'----'.$emp_pwd;
	//exit();
	require_once 'smarty_inc.php';
	require_once '../sqlHelper.class.php';
	require_once '../model/messageModel.class.php';
	require_once '../model/mypage.class.php';

	$emp_name = $_POST['emp_name'];
	$emp_pwd = $_POST['emp_pwd'];

	
	if ($emp_name == "root" && $emp_pwd == "123") {
		//用session记录
		session_start();
		$_SESSION['loginname'] = $emp_name;

		//计算所有信息条数
		$mysqli = new SqlHelper();
		$sql = "select count(*) from message where getter = '$emp_name'";
		//

		$mypage = new Mypage(1, 7, 5, $mysqli->pagingCount($sql));
		$mypage->goToURL = 'messageListUIController.php';
		$messageModel = new MessageModel();
		//print_r($MessageModel);
		$smarty->assign('res', $messageModel->showMessageByPage($mypage, $emp_name));
		$smarty->assign('page_banne', $mypage->navigationBar());
		$smarty->display("messageList.tpl");
	}else{

	}
?>
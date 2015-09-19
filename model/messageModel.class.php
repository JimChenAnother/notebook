<?php

	require_once '../SqlHelper.class.php';

	class MessageModel{


		//根据分页来获取相应的信息
		public function showMessageByPage($fenyePage ,$loginname){
			$sql = "select *from message where getter = '".$loginname."'"."limit ".$fenyePage->pageSize*($fenyePage->page-1).",".$fenyePage->pageSize;
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper->execute_dql2($sql);
			return $res;
		}
	}
?>
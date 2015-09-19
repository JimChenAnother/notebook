<?php
	require_once '../libs/Smarty.class.php';
	$smarty = new smarty();
	$smarty->template_dir = "../templates/";
	$smarty->compile_dir = "../templates_c/";
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
?>
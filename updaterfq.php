<?php
session_start();
$mode = $_POST['mode'];
//print_r($_POST);
if($mode==="remove"){
	//remove
	$item = $_POST['item'];
	unset($_SESSION['rfq'][$item]);

	header("Location: rfqcart.php");
}elseif($mode==="update"){
	//update
	//error_log(print_r($_GET,TRUE), 0);
	$keys = $_POST['key'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	foreach ($keys as $i => $key){
		$_SESSION['rfq'][$key]['qty'] = $qty[$i];
		$_SESSION['rfq'][$key]['price'] = $price[$i];
	}
	header("Location: rfqcart.php");
}else{
	//email
	header("Location: sendrfq.php");
}
?>
<?php
session_start();
include('config.php');
include('opendb.php');
//error_log(print_r($_GET,TRUE), 0);
$id = $_POST['id'];
$sql = "SELECT productid, sku, partno FROM products WHERE productid='$id'";
$res = mysql_query($sql) or die(mysql_error());
list($productid, $sku, $partno) = mysql_fetch_array($res);
if (!isset($_SESSION['rfq']['item'.$productid])){
	$_SESSION['rfq']['item'.$productid]['sku'] = $sku;
	$_SESSION['rfq']['item'.$productid]['partno'] = $partno;
	$_SESSION['rfq']['item'.$productid]['qty'] = "";
	$_SESSION['rfq']['item'.$productid]['price'] = "";
}
header("Location: rfqcart.php");
include('closedb.php');
?>
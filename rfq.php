<?php
session_start();
$num = "1";$item1 = $_GET['item1'];
$item1price = $_GET['item'.$num.'price'];
$_SESSION['rfq']['item'.$num]['partno'] = 222;
$_SESSION['rfq']['item'.$num]['sku'] = 7100;$_SESSION['rfq']['item'.$num]['qty'] = $item1;
$_SESSION['rfq']['item'.$num]['price'] = $item1price;

echo $_SESSION['rfq']['item1']['partno']."<br>\n";
echo $_SESSION['rfq']['item1']['sku']."<br>\n";
echo $_SESSION['rfq']['item1']['qty']."<br>\n";
echo $_SESSION['rfq']['item1']['price']."<br>\n";
echo "<br><br>\n";
echo sizeof($_SESSION['rfq']);
echo "<br><br>\n";

if ($_SESSION['rfq'][item1])
	echo "Item is there";
else
	echo "Item is not there";
?>
<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');

$id = $_GET['id'];
$cat = $_GET['cat'];
$order = $_GET['order'];
$sortby = $_GET['sortby'];

$sql = "DELETE FROM products WHERE productid='$id'";
$result = mysql_query($sql) or die(mysql_error());

if ($result)
{
	header("Location: list.php?cat=".$cat."&order=".$order."&sortby=".$sortby);
}

?>


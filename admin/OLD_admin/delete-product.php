<?php

include('../config.php');
include('../opendb.php');

$id = $_GET['id'];
$cat = $_GET['cat'];

$sql = "DELETE FROM products WHERE productid='$id'";
$result = mysql_query($sql) or die(mysql_error());

if ($res)
{
	header("Location: list.php?cat=".$cat);
}

include('../closedb.php');

?>


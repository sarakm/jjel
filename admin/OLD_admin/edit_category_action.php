<?php

include('../config.php');
include('../opendb.php');

$parent = $_POST['parent'];
$oldname = $_POST['oldname'];
$id = $_POST['id'];
$rename = $_POST['rename'];

$sql = "SELECT catid, catname FROM categories WHERE catid='$parent'";
$res = mysql_query($sql) or die(mysql_error());

list($catid, $catname) = mysql_fetch_array($res);

if ($rename != "")
{
	$sql = "UPDATE categories SET catname = '$rename' WHERE catid = '$catid'";
	$res = mysql_query($sql) or die(mysql_error());
}

header("Location: edit_category.php");

include('../closedb.php');

?>
<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
$file_dir = "../uploads/category-images";
//$file_dir = ".";
//print_r($_POST);print"<br>";
//print_r($_FILES);print"<br>";

if(isset($_POST['editcat'])){
	$catid = $_POST['catid'];
	$catname = $_POST['catname'];
	
	if(isset($_FILES['img_file']) && $_FILES['img_file']['error'] == 0 ){
	
		$img_array = $_FILES['img_file'];
		$name = $img_array['name'];
		$type = $img_array['type'];
		$tmp_name = $img_array['tmp_name'];
		
		$ext = end(explode(".", $name));
		$file_name = $catid.".".$ext;

		if(is_uploaded_file($tmp_name)){
			move_uploaded_file($tmp_name, "$file_dir/$file_name") or die("Could mot copy");
		}
		
		$sql = "UPDATE categories SET catname = '$catname', catimg = '$file_name' WHERE catid = '$catid'";
		$res = mysql_query($sql) or die(mysql_error());

	}else{
	
		$sql = "UPDATE categories SET catname = '$catname' WHERE catid = '$catid'";
		$res = mysql_query($sql) or die(mysql_error());
	
	}
	
	header("Location: list_category.php");
}
?>
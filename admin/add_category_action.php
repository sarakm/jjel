<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
$file_dir = "../uploads/category-images";
//print_r($_POST);print"<br>";
//print_r($_FILES);print"<br>";

if(isset($_POST['addcat'])){
	$parent = $_POST['parent'];
	$catname = $_POST['catname'];
	
	if(isset($_FILES['img_file']) && $_FILES['img_file']['error'] == 0 ){

		$img_array = $_FILES['img_file'];
		$name = $img_array['name'];
		$type = $img_array['type'];
		$tmp_name = $img_array['tmp_name'];
		
		$sql = "INSERT INTO categories (catparent, catname) VALUES ('$parent', '$catname')";
		$res = mysql_query($sql) or die(mysql_error());

		$catid = mysql_insert_id();
		
		$ext = end(explode(".", $name));
		$file_name = $catid.".".$ext;

		if(is_uploaded_file($tmp_name)){
			//delete file if exist
			if (file_exists($file_dir/$file_name)){
				chmod($file_dir/$file_name, 0777);
				unlink($file_dir/$file_name);
			}
			move_uploaded_file($tmp_name, "$file_dir/$file_name") or die("Could mot copy");
			$sql = "UPDATE categories SET catimg='$file_name' WHERE catid = '$catid'";
			$res = mysql_query($sql) or die(mysql_error());
		}
		
	}else{
		$file_name = "generic.jpg";
		$sql = "INSERT INTO categories (catparent, catname, catimg) VALUES ('$parent', '$catname', '$file_name')";
		$res = mysql_query($sql) or die(mysql_error());
	}
	
	header("Location: list_category.php");
}

?>
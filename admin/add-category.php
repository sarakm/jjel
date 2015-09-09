<?php

include('../config.php');
include('../opendb.php');

$parent = $_POST['parent'];
$catname = $_POST['catname'];
$addcat = $_POST['addcat'];
$img = $_FILES['catimg']['tmp_name'];
$ext = pathinfo($_FILES['catimg']['name']);
$ext = $ext['extension'];
$fname = time();
$pic = 	$fname.".".$ext;

$docroot = getenv('DOCUMENT_ROOT');
$uploaddir = $docroot."/electronics/uploads/category-images";

if ($addcat == "Add category")
{
	if (is_uploaded_file($img))
	{
		$newwidth = 150;
		$newheight = 150;
		list($width, $height) = getimagesize($img);
		$tmp = imagecreatetruecolor($newwidth, $newheight);
		
		if (strtolower($ext) == "jpg" || strtolower($ext) == "jpeg")
		{
			$src = imagecreatefromjpeg($img);	
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			imagejpeg($tmp, $uploaddir."/".$pic, 100);		
		}
		elseif (strtolower($ext) == "gif")
		{
			$src = imagecreatefromgif($img);	
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			imagegif($tmp, $uploaddir."/".$pic, 100);		
		}
		elseif (strtolower($ext) == "png")
		{
			$src = imagecreatefrompng($img);	
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			imagepng($tmp, $uploaddir."/".$pic, 100);		
		}
	}
	else
	{
		$pic = "generic.jpg";
	}
	
	$sql = "INSERT INTO categories (catparent, catname, catimg) VALUES ('$parent', '$catname', '$pic')";
	$res = mysql_query($sql) or die(mysql_error());			
}

	header("Location: add_category.php");

include('../closedb.php');

?>
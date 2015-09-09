<?php

include('../config.php');
include('../opendb.php');

$productname = $_POST['productname'];
$desc = $_POST['desc'];
$category = $_POST['category'];
$manufacturer = $_POST['manufacturer'];
$stockno = $_POST['stockno'];
$partno = $_POST['partno'];
$skuno = $_POST['skuno'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$datecode = $_POST['datecode'];
$vendordetails = $_POST['vendordetails'];
$showprice = $_POST['showprice'];

$addproduct = $_POST['addproduct'];
$img = $_FILES['picture']['tmp_name'];
$ext = pathinfo($_FILES['picture']['name']);
$ext = $ext['extension'];
$fname = time();
$pic = 	$fname.".".$ext;

$docroot = getenv('DOCUMENT_ROOT');
$uploaddir = $docroot."/electronics/uploads/product-images";

if ($addproduct == "Add product")
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
	
	$sql = "INSERT INTO products (productname, catid, manufacturer, stockno, partno, sku, description, qty, price, datecode, vendordetails, img, flag) VALUES ('$productname', '$category', '$manufacturer', '$stockno', '$partno', '$skuno', '$desc', '$quantity', '$price', '$datecode', '$vendordetails', '$pic', '$showprice')";
	$res = mysql_query($sql) or die(mysql_error());			
}

	header("Location: add_product.php");

include('../closedb.php');

?>
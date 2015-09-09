<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');

$id = $_POST['id'];
$productname = $_POST['productname'];
$desc = $_POST['desc'];
$category = $_POST['parent'];
$manufacturer = $_POST['manufacturer'];
$stockno = $_POST['stockno'];
$partno = $_POST['partno'];
$skuno = $_POST['skuno'];
$pickno = $_POST['pickno'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$datecode = $_POST['datecode'];
$vendordetails = $_POST['vendordetails'];
$showprice = $_POST['showprice'];
$submit = $_POST['submit'];

$img = $_FILES['picture']['tmp_name'];
$ext = pathinfo($_FILES['picture']['name']);
$ext = $ext['extension'];
$fname = time();
$pic = 	$fname.".".$ext;

$docroot = getenv('DOCUMENT_ROOT');
$uploaddir = $docroot."/electronics/uploads/product-images";

if ($submit == "Save changes")
{
	$sql = "SELECT img FROM products WHERE productid='$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$sql = "UPDATE products SET productname='$productname', catid='$category', manufacturer='$manufacturer', 
								stockno='$stockno', partno='$partno', sku='$skuno', pickcode='$pickno', description='$desc', 
								qty='$quantity', price='$price', datecode='$datecode', 
								vendordetails='$vendordetails', flag='$showprice'";
	
	if (is_uploaded_file($img))
	{
		if (file_exists($uploaddir."/".$row[0]))
		{
			chmod($uploaddir."/".$row[0], 0777);
			unlink($uploaddir."/".$row[0]);
		}
		$pic = $fname.".".$ext;			
		$sql .= ", img='$pic'";
							
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
	
	$sql .= " WHERE productid='$id'";
	$results = mysql_query($sql) or die(mysql_error());
}

header("Location: edit.php?id=".$id);

?>

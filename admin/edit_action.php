<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
//print_r($_POST);print"<br>";
//print_r($_FILES);print"<br>";

	$file_dir = "../uploads/product-images";
	
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

if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0 ){

	$img_array = $_FILES['picture'];
	$name = $img_array['name'];
	$type = $img_array['type'];
	$tmp_name = $img_array['tmp_name'];

	$ext = end(explode(".", $name));
	$file_name = $id.".".$ext;

	if(is_uploaded_file($tmp_name)){
		move_uploaded_file($tmp_name, "$file_dir/$file_name") or die("Could mot copy");
	}
	
	$sql = "UPDATE products SET productname='$productname', catid='$category', manufacturer='$manufacturer', 
								stockno='$stockno', partno='$partno', pickcode='$pickno', description='$desc', 
								qty='$quantity', price='$price', datecode='$datecode', 
								vendordetails='$vendordetails', img='$file_name', flag='$showprice' WHERE productid='$id'";
	$res = mysql_query($sql) or die(mysql_error());
	
}else{

//	$file_name = "generic.jpg";	
	
	$sql = "UPDATE products SET productname='$productname', catid='$category', manufacturer='$manufacturer', 
								stockno='$stockno', partno='$partno', pickcode='$pickno', description='$desc', 
								qty='$quantity', price='$price', datecode='$datecode', 
								vendordetails='$vendordetails', flag='$showprice' WHERE productid='$id'";
	$res = mysql_query($sql) or die(mysql_error());

}

header("Location: list.php?id=".$id);

?>

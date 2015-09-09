<?
include('authenticate.php');
include('../config.php');
include('../opendb.php');
//print_r($_POST);print"<br>";
//print_r($_FILES);print"<br>";

	$file_dir = "../uploads/product-images";

	$productname = $_POST['productname'];
	$desc = $_POST['desc'];
	$category = $_POST['category'];
	$manufacturer = $_POST['manufacturer'];
	$stockno = $_POST['stockno'];
	$partno = $_POST['partno'];
	$skuno = $_POST['skuno'];
	$pickcode = $_POST['pickcode'];
	$quantity = $_POST['quantity'];if($quantity=="")$quantity=0;
	$price = $_POST['price'];
	$datecode = $_POST['datecode'];
	$vendordetails = $_POST['vendordetails'];
	$showprice = $_POST['showprice'];
	$today=date('Y-m-d');

if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0 ){

	$img_array = $_FILES['picture'];
	$name = $img_array['name'];
	$type = $img_array['type'];
	$tmp_name = $img_array['tmp_name'];

	$ext = end(explode(".", $name));
	$file_name;
	
	$sql = "INSERT INTO products (productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag,date_added) VALUES ('$productname', '$category', '$manufacturer', '$stockno', '$partno', '', '$pickcode', '$desc', '$quantity', '$price', '$datecode', '$vendordetails', '', '$showprice','$today')";
	$res = mysql_query($sql) or die(mysql_error());
	
	$last_id = mysql_insert_id();
	$file_name = $last_id.".".$ext;
	if(is_uploaded_file($tmp_name)){
		move_uploaded_file($tmp_name, "$file_dir/$file_name") or die("Could mot copy");
	}

	//
	// update products set sku = LPAD(productid+10000, 7, '0')
	//	
	$sql = "UPDATE products SET sku = LPAD(productid+10000, 7, '0'), img='$file_name' WHERE productid=$last_id";
	$res = mysql_query($sql) or die(mysql_error());

}else{

	$file_name = "generic.jpg";	
	
	$sql = "INSERT INTO products (productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag,date_added) VALUES ('$productname', '$category', '$manufacturer', '$stockno', '$partno', '', '$pickcode', '$desc', '$quantity', '$price', '$datecode', '$vendordetails', '$file_name', '$showprice','$today')";
	$res = mysql_query($sql) or die(mysql_error());
	
	$last_id = mysql_insert_id();
	//
	//$sql = update products set sku = LPAD(productid+10000, 7, '0')
	//	
	$sql = "UPDATE products SET sku = LPAD(productid+10000, 7, '0'), img='$file_name' WHERE productid=$last_id";
	$res = mysql_query($sql) or die(mysql_error());	

}
	
header("Location: list.php");
?>

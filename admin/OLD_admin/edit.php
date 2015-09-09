<?php

include('../config.php');
include('../opendb.php');

$id = $_GET['id'];
$search = $_GET['search'];
$filter = $_GET['filter'];

if ($search != "")
{
	if ($filter == 2)
	{
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE stockno='$search'";
	}
	elseif ($filter == 3)
	{
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE sku='$search'";
	}
	else
	{
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE partno='$search'";
	}
}
else
{
	$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE productid='$id'";
}
$res = mysql_query($sql) or die(mysql_error());

list($productid, $productname, $cid, $manufacturer, $stockno, $partno, $sku, $description, $qty, $price, $datecode, $vendordetails, $img, $flag) = mysql_fetch_row($res);

?>

<? if ($productid) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>

<style>
	.btn
	{
		width: 120px;
		height: 25px;
	}
	.tf
	{
		width: 300px;
		height: 20px;
	}
	
	.rtf
	{
		width: 100px;
		height: 20px;
	}
	
	.stf
	{
		width: 50px;
		height: 20px;
	}	
	
	
	.ta
	{
		width: 300px;
		height: 80px;	
	}
.style1 {color: #990000}
</style>

</head>

<body style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
<form action="save-product.php" method="post">
<input type="hidden" name="id" id="id" value="<?= $id; ?>">
<table width="500" border="0" align="center" cellpadding="2" cellspacing="6">
  <tr>
    <td height="25" colspan="3"><h3 class="style1">EDIT PRODUCT</h3> 
      <span style="font-style:italic; font-size:12px">(Click browse to upload/change the picture)</span></td>
  </tr>
  <tr>
    <td width="149" height="25">Product name:</td>
    <td height="25" colspan="2"><input name="productname" type="text" class="tf" id="productname" value="<?= $productname; ?>" /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td colspan="2">
    <textarea name="desc" class="ta" id="desc"><?= $description; ?></textarea>    </td>
  </tr>
  <tr>
    <td>Vendor details</td>
    <td colspan="2"><textarea name="vendordetails" id="vendordetails" style="width:300px; height:40px;"><?= $vendordetails; ?></textarea></td>
  </tr>
  <tr>
    <td height="25">Category:</td>
    <td height="25" colspan="2">
    <select name="parent" id="parent" class="tf">    	
    	<?php
		$sql = "SELECT catid, catname FROM categories ORDER BY catparent ASC";
		$res = mysql_query($sql) or die(mysql_error());
		
			while(list($catid, $catname) = mysql_fetch_array($res))
			{
				if ($cid == $catid)
					echo "<option value=\"$catid\" selected=\"selected\">$catname</option>\n";
				else
					echo "<option value=\"$catid\">$catname</option>\n";
			}
		
		?>
    </select>    </td>
  </tr>
  <tr>
    <td height="25">Manufacturer:</td>
    <td height="25" colspan="2"><input name="manufacturer" type="text" class="tf" id="manufacturer" value="<?= $manufacturer; ?>" /></td>
  </tr>
  <tr>
    <td height="25">Stock number:</td>
    <td width="162" height="25"><input name="stockno" type="text" class="rtf" id="stockno" value="<?= $stockno; ?>" /></td>
    <td width="153" rowspan="5" valign="top"><img src="../uploads/product-images/<?= $img; ?>" alt="" name="previmg" width="130" height="130" id="previmg" style="background-color: #990000" /></td>
  </tr>
  <tr>
    <td height="25">Part number:</td>
    <td height="25"><input name="partno" type="text" class="rtf" id="partno" value="<?= $partno; ?>" /></td>
  </tr>
  <tr>
    <td height="25">SKU number:</td>
    <td height="25"><input name="skuno" type="text" class="rtf" id="skuno" value="<?= $sku; ?>" /></td>
  </tr>
  <tr>
    <td height="25">Quantity:</td>
    <td height="25"><input name="quantity" type="text" class="stf" id="quantity" value="<?= $qty; ?>" /></td>
  </tr>
  <tr>
    <td height="25">Price:</td>
    <td height="25"><input name="price" type="text" class="rtf" id="price" value="<?= $price; ?>" /></td>
  </tr>
  <tr>
    <td height="25">Date code:</td>
    <td height="25" colspan="2"><input name="datecode" type="text" class="stf" id="datecode" value="<?= $datecode; ?>" /></td>
  </tr>
  <tr>
    <td height="25">Picture:</td>
    <td height="25" colspan="2"><input name="picture" type="file" class="tf" id="picture" /></td>
  </tr>
  <tr>
    <td height="25">Show price:</td>
    <td height="25" colspan="2">
    <select name="showprice" id="showprice">
    	<? if ($flag == 0) { ?>
            <option value="0" selected="selected">No</option>
            <option value="1">Yes</option>
        <? } elseif($flag == 1) { ?>
        	<option value="0">No</option>
            <option value="1" selected="selected">Yes</option>
        <? } else { ?>
        	<option value="0" selected="selected">No</option>
            <option value="1">Yes</option>
        <? } ?>
    </select>    </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25" colspan="2"><input type="submit" name="submit" class="btn" value="Save changes" /></td>
  </tr>
</table>
</form>
</body>
</html>
<? } ?>
<? include('../closedb.php'); ?>
<?php

include('../config.php');
include('../opendb.php');

function getParentId($id)
{
	$sql = "SELECT catid, catname FROM categories WHERE catparent = '$id' ORDER BY catname ASC";
	$res = mysql_query($sql) or die(mysql_error());
	
		while(list($catid, $catname) = mysql_fetch_array($res))
		{
			echo "\t<option value=\"$catid\">$catname</option>\n";
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<style>
.style1 {color: #990000}
.tf {		width: 150px;
}
.rtf {		width: 100px;
}
.stf {		width: 50px;
		height: 15px;
}
.tf1 {		width: 150px;
}
.ta {		width: 430px;
		height: 80px;	
}
.btn {		width: 120px;
		height: 25px;
}
</style>
</head>

<body leftmargin="0" topmargin="0">
<div style="width:618px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
<form action="add_product_action.php" method="post" enctype="multipart/form-data">
	<table width="100%" border="0" cellspacing="6" cellpadding="2">
  <tr>
    <td colspan="4"><h3 class="style1">ADD PRODUCT</h3></td>
    </tr>
  <tr>
    <td width="15%">Product name:</td>
    <td width="27%"><input name="productname" type="text" class="tf1" id="productname" /></td>
    <td width="24%">Manufacturer:</td>
    <td width="34%"><input name="manufacturer" type="text" class="tf" id="manufacturer" /></td>
  </tr>
  <tr>
    <td>Price:</td>
    <td><input name="price" type="text" class="rtf" id="price" /></td>
    <td>Stock #:</td>
    <td><input name="stockno" type="text" class="rtf" id="stockno" /></td>
  </tr>
  <tr>
    <td>Qty:</td>
    <td><input name="quantity" type="text" class="stf" id="quantity" /></td>
    <td>Part #:</td>
    <td><input name="partno" type="text" class="rtf" id="partno" /></td>
  </tr>
  <tr>
    <td>Show price:</td>
    <td><select name="showprice" id="showprice">
      <option value="0" selected="selected">No</option>
      <option value="1">Yes</option>
    </select></td>
    <td>SKU #:</td>
    <td><input name="skuno" type="text" class="rtf" id="skuno" /></td>
  </tr>
  <tr>
    <td>Date code:</td>
    <td><input name="datecode" type="text" class="stf" id="datecode" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Vendor details</td>
    <td colspan="3"><textarea name="vendordetails" style="width:430px; height:40px;"></textarea></td>
    </tr>
  <tr>
    <td valign="top">Category:</td>
    <td colspan="3"><select name="category" id="category" size="10" style="width: 430px;">
      <?
		 
			$sql = "SELECT catid, catname FROM categories WHERE catparent = '0' ORDER BY catname ASC";
			$res = mysql_query($sql) or die(mysql_error());
			
				while(list($catid, $catname) = mysql_fetch_array($res))
				{
					echo "<optgroup label=\"$catname\">\n";
						getParentId($catid);
					echo "</optgroup>\n";
				}
		  /*
		  for($i=1; $i <= 60; $i++)
		  {
		  	echo "<optgroup label=\"category$i\">\n";
				for ($z=1; $z <= 5; $z++)
				{
					echo "\t<option value=\"$z\">subcategory $z</option>\n";					
				}
			echo "</optgroup>\n";
		  }
		  */
		?>
    </select></td>
    </tr>
  <tr>
    <td valign="top">Description:</td>
    <td colspan="3"><textarea name="desc" class="ta" id="desc"></textarea></td>
    </tr>
  <tr>
    <td>Picture:</td>
    <td colspan="2"><input name="picture" type="file" id="picture" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><input type="submit" class="btn" name="addproduct" id="addproduct" value="Add product" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>	
</div>
</body>
</html>
<? include('../closedb.php'); ?>
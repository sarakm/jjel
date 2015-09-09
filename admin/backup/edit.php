<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
//print_r($_GET);
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE productid='$id'";
}else{
	$search = $_GET['search'];
	$filter = $_GET['filter'];
	if ($filter == 2){
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE stockno='$search'";
	}else if ($filter == 3){
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE sku='$search'";
	}else if ($filter == 4){
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE pickcode='$search'";
	}else{
		//$filter == 1
		$sql = "SELECT productid, productname, catid, manufacturer, stockno, partno, sku, pickcode, description, qty, price, datecode, vendordetails, img, flag FROM products WHERE partno='$search'";
	}
}
$res = mysql_query($sql) or die(mysql_error());
list($productid, $productname, $cid, $manufacturer, $stockno, $partno, $sku, $pickcode, $description, $qty, $price, $datecode, $vendordetails, $img, $flag) = mysql_fetch_row($res);
?>
<?
include('top.php');
?>
<div id="edit">
<? if ($productid) { ?>
<form action="edit_action.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?= $id; ?>">
<table width="950" border="0" align="center" cellpadding="2" cellspacing="6">
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
    <td height="25"><b>Stock number: </b></td>
    <td width="162" height="25"><input name="stockno" type="text" class="rtf" id="stockno" value="<?= $stockno; ?>" /></td>
    <td width="153" rowspan="5" valign="top"><img src="../uploads/product-images/<?= $img; ?>" alt="" name="previmg" width="130" height="130" id="previmg" style="background-color: #990000" /></td>
  </tr>
  <tr>
    <td height="25"><b>Part number: </b></td>
    <td height="25"><input name="partno" type="text" class="rtf" id="partno" value="<?= $partno; ?>" /></td>
  </tr>
  <tr>
    <td height="25"><b>SKU: </b></td>	
    <td height="25" colspan="2"><input type="text" name="skuno" class="rtf" id="skuno" value="<?=$sku?>" readonly>
<!--	<input type="hidden" name="skuno" id="skuno"> -->
    </td>
  </tr>
  <tr>
    <td height="25"><b>Pick Code: </b></td>
    <td height="25"><input name="pickno" type="text" class="rtf" id="pickno" value="<?= $pickcode; ?>" /></td>
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

<?}else{?>

No product found.

<?}?>
</div>
<?
include('bottom.php');
?>
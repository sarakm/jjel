<?php

include('../config.php');
include('../opendb.php');

$cat = $_GET['cat'];
$sortby = $_GET['sortby'];
$order = $_GET['order'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List products</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}

.style2 {
	color: #990000;
}
-->
</style>

<script>

function refreshList()
{
	var s = document.getElementById('cat').value;
	var o = document.getElementById('order').value;
	var sb = document.getElementById('sortby').value;
	location.href = "list.php?cat="+s+"&order="+o+"&sortby="+sb;
}

function editClick(id)
{
	location.href = "edit.php?id="+id;
}

</script>
</head>

<body topmargin="0" leftmargin="0">
<table width="710" border="0" align="center" cellpadding="2" cellspacing="6" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
  <tr>
    <td height="25" colspan="10"><h3 class="style2">CLICK ON THE ITEMS TO EDIT</h3></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25" colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td height="25"><div align="right"><strong>Sort:</strong></div></td>
    <td height="25" colspan="9">
    <select name="sortby" id="sortby" style="width:200px;" onchange="refreshList()">
    			<? if ($sortby == "stockno") { ?>
                    <option value="stockno" selected="selected">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "partno") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno" selected="selected">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "sku") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku" selected="selected">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "qty") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty" selected="selected">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "price") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price" selected="selected">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "flag") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag" selected="selected">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "manufacturer") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer" selected="selected">Manufacturer</option>
                <? } else { ?>
                    <option value="stockno" selected="selected">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } ?>                                                                                                        
    </select> 
    &nbsp;   <strong>Order:
    <select name="order" id="order" style="width:200px;" onchange="refreshList()">
    	<? if ($order == "asc") { ?>
          	<option value="asc" selected="selected">Ascending</option>
            <option value="desc">Descending</option>
        <? } else { ?>
        	<option value="asc">Ascending</option>
	  		<option value="desc" selected="selected">Descending</option>
        <? } ?>
    </select>
    </strong></td>
  </tr>
  <tr>
    <td height="25"><div align="right"><strong>Go to:</strong></div></td>
    <td height="25" colspan="9"><strong>
      <select name="cat" id="cat" style="width:200px;" onchange="refreshList()">
      <?php
		$sql = "SELECT catid, catname FROM categories ORDER BY catparent ASC";
		$res = mysql_query($sql) or die(mysql_error());
		
			while(list($catid, $catname) = mysql_fetch_array($res))
			{
				if ($cat == $catid)
					echo "<option value=\"$catid\" selected=\"selected\">$catname</option>\n";
				else
					echo "<option value=\"$catid\">$catname</option>\n";
			}
		
		?>
    </select>
    </strong><input type="button" name="go" value="Go" onclick="refreshList()" /></td>
  </tr>
  <tr>
    <td height="25" colspan="10">&nbsp;</td>
  </tr>
  <tr>
    <td width="63" height="25" bgcolor="#990000"><div align="center" class="style1">Stock no</div></td>
    <td width="38" height="25" bgcolor="#990000"><div align="center" class="style1">Part no</div></td>
    <td width="69" height="25" bgcolor="#990000"><div align="center" class="style1">SKU #</div></td>
    <td width="32" height="25" bgcolor="#990000"><div align="center" class="style1">Qty</div></td>
    <td width="53" height="25" bgcolor="#990000"><div align="center" class="style1">Price</div></td>
    <td width="49" height="25" bgcolor="#990000"><div align="center" class="style1">Picture</div></td>
    <td width="100" height="25" bgcolor="#990000"><div align="center" class="style1">Category</div></td>
    <td width="113" height="25" bgcolor="#990000"><div align="center" class="style1">Manufacturer</div></td>
    <td width="44" height="25" bgcolor="#990000"><div align="center" class="style1">Shows</div></td>
    <td width="43" height="25" bgcolor="#990000"><div align="center" class="style1">Delete</div></td>
  </tr>
  </table>
  <div style="height: 400px; overflow:auto;">
  <table width="710" border="0" align="center" cellpadding="2" cellspacing="6" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
  <?php
  
		  $sql = "SELECT 
						products.productid, products.stockno, products.partno, products.sku, 
						products.qty, products.price, products.img, 
						categories.catname, products.manufacturer, products.flag
					FROM
						products, categories
					WHERE
						products.catid = categories.catid";
		  
		  if ($cat != "")
		  {
		  	$sql .= " AND products.catid = '$cat'";
		  }
		  
		  if ($sortby != "")
		  {
		  		$sql .= " ORDER BY ".$sortby." ".$order;
		  }
						
			$results = mysql_query($sql) or die(mysql_error());
		
			$cnt = 1;
			
			while(list($productid, $stockno, $partno, $sku, $qty, $price, $img, $catname, $manufacturer, $flag) = mysql_fetch_array($results))
			{ 
  ?>
  <tr onmouseover="this.style.backgroundColor='#E7E7E7'" onmouseout="this.style.backgroundColor='#FFFFFF'" onclick="javascript:void(0);">
    <td height="25" width="63" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $stockno; ?></div></td>
    <td height="25" width="38" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $partno; ?></div></td>
    <td height="25" width="70" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $sku; ?></div></td>
    <td height="25" width="32" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $qty; ?></div></td>
    <td height="25" width="53" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $price; ?></div></td>
    <td height="25" width="49" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;">
<div align="center"><img src="../uploads/product-images/<?= $img; ?>" width="25" height="25" onmouseover="document.getElementById('div<?= $cnt; ?>').style.display='block';" onmouseout="document.getElementById('div<?= $cnt; ?>').style.display='none';"/></div><div style="position:absolute; display:none; z-index:2; margin-left:45px;" id="div<?= $cnt; ?>">
            	<img src="../uploads/product-images/<?= $img; ?>" width="150" height="150" />
            </div>    </td>
    <td height="25" width="100" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $catname; ?></div></td>
    <td height="25" width="113" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $manufacturer; ?></div></td>
    <td height="25" width="45" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><? if ($flag == 1) { echo "Yes"; } else { echo "No"; } ?></div></td>
    <td height="25" width="41"><div align="center"><a href="delete-product.php?id=<?= $productid; ?>cat=" onclick="return confirm('Are you sure you want to delete this product?');"><img src="delete-16x16.png" width="16" height="16" border="0"/></a></div></td>
  </tr>
    
  <? 
		$cnt++;
		} 
  ?>
</table>
</div>

</body>
</html>

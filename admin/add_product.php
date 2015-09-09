<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
?>
<?
include('top.php');
?>
<div id="add_product" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
<form action="add_product_action.php" method="post" enctype="multipart/form-data">

<table width="940" border="0" cellspacing="6" cellpadding="2">
<tr>
  <td>
	<table width="650" border="0" cellspacing="6" cellpadding="2">
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
		<td>Pick code:</td>
		<td><input name="pickcode" type="text" class="rtf" id="pickcode" /></td>
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
		<td colspan="3">
		<select name="category" id="category" size="10" style="width: 430px;">
		<?
			$first = true;
			$sql = "SELECT catid, catname FROM categories WHERE catparent = '0' ORDER BY catname ASC";
			$res1 = mysql_query($sql) or die(mysql_error());
				
			while(list($parid, $parname) = mysql_fetch_array($res1)){
			?>
				<optgroup label=<?=$parname?>>
				<?
				$sql = "SELECT catid, catname FROM categories WHERE catparent = '$parid' ORDER BY catname ASC";
				$res2 = mysql_query($sql) or die(mysql_error());
	
				while(list($childid, $childname) = mysql_fetch_array($res2)){
					if($first){
					?>
						<option value="<?=$childid?>" selected><?=$childname?></option>
					<?
						$first = false;
					}else{
					?>
						<option value="<?=$childid?>"><?=$childname?></option>
					<?
					}
				}
				?>
				</optgroup>
				<?
			}
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
		<td><input name="skuno" type="hidden" id="skuno" />&nbsp;</td>
		<td colspan="2"><input type="submit" class="btn" name="addproduct" id="addproduct" value="Add product" /></td>
		<td>&nbsp;</td>
	  </tr>
	</table>
  </td>
  <td align="right" valign="top">
	<div style="width:200px; background-color: #FDBBBB; padding: 10px; border: 1px solid black; text-align: left;">
	<p>
		<ul>
			<li>Product name, quantity, and subcategory are <b>required</b> feilds</li>
			<li>Not all feilds are required, however fill as much informaion as possible</li>
			<li>For <b>price</b> and <b>quantity</b> enter <b>numbers</b> only</li>
			<li><b>SKU</b> number, which is unique identifier, will be assigned automatically</li>
			<li>Click <b>Browse</b> to upload product image</li>
		</ul>
	</p>
	</div>
	</td>
 </tr>
</table>
	</form>	
</div>

<?
include('bottom.php');
?>


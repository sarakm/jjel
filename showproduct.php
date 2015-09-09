<?
include('config.php');
include('opendb.php');
include("top.php");
//include("left.php");
//print_r($_POST);

$id = $_POST['id'];$sql = "SELECT productname, catid, sku, partno, stockno, description, qty, datecode, price, img, flag FROM products WHERE productid = '$id'";
$results = mysql_query($sql) or die(mysql_error());

list($productname, $catid, $sku, $partno, $stockno, $description, $qty, $datecode, $price, $img, $flag) = mysql_fetch_array($results);
if ($flag == 0)
	$price = "RFQ";
?>



<!-- ######################################################## -->
<!-- ##            start of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<div style="width:800px; background-color:#F7F7F7" id="mainwindow">
<table border="0" align="center" cellpadding="0" cellspacing="0" style="width: 100%; border: solid 1px #230113; text-indent:10px">
	<tr>
		<td height="25" colspan="2" bgcolor="#230113">
			<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#FFFFFF;"><?= $productname; ?></div>
		</td>
	</tr>
	<tr>
		<td height="180" colspan="2" bgcolor="#FFFFFF">
			<div align="center"><img src="uploads/product-images/<?= $img; ?>" width="197" height="160" /></div>
		</td>
	</tr>
	<tr>
		<td width="146" height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> Stock #:</div>
		</td>
		<td width="304" height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $stockno; ?>
		</td>
	</tr>
	<tr>
		<td height="25" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> SKU #:</div>
		</td>
		<td height="25" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $sku; ?>
		</td>
	</tr>
	<tr>
		<td height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> Part #:</div>
		</td>
		<td height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $partno; ?>
		</td>
	</tr>
	<tr>
		<td height="25" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> Qty:</div>
		</td>
		<td height="25" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<?= $qty; ?>
		</td>
	</tr>
	<tr>
		<td height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			Date code:
		</td>
		<td height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<?= $datecode; ?>
		</td>
	</tr>
	<tr>
		<td height="25" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> Price:</div>
		</td>
		<td height="25" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<?= $price; ?>
		</td>
	</tr>
	<tr>
		<td valign="top" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> Description:</div>
		</td>
		<td height="70" valign="top" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $description; ?>
		</td>
	</tr>
	<tr>
		<td height="60" colspan="2" align="center">
			<FORM><INPUT type=button value=" Back " onClick="parent.history.back(); return false;" style="font-size:18px; font-weight:bold; background-color:#D3D3D3; cursor:pointer;"></FORM>

<!-- <FORM><INPUT type=button value=" Back " onClick="history.back();"></FORM> -->
<!--			<div align="center"><a href="javascript:void(0)" onclick="showSubcat(<?= $catid; ?>)" style="text-decoration:none;">Go back</a> 
-->
		</td>
	</tr>
</table>
</div>

<!-- ######################################################## -->
<!-- ##              end of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<?
//include("right.php");
include("bottom.php");
?>
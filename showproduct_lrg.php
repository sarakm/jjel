<?
include('config.php');
include('opendb.php');$id = $_GET['id'];

$sql = "SELECT productname, sku, partno, stockno, description, qty, price, flag FROM products WHERE productid = '$id'";
$results = mysql_query($sql) or die(mysql_error());

list($productname, $sku, $partno, $stockno, $description, $qty, $price, $flag) = mysql_fetch_array($results);
if ($flag == 0)
	$price = "RFQ";
?>

<table border="0" align="center" cellpadding="0" cellspacing="0" style="width: 910px; border: solid 1px #230113;">
	<tr>
		<td height="25" colspan="2" bgcolor="#230113">
			<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#FFFFFF;">                    <?= $productname; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td height="200" colspan="2" bgcolor="#FFFFFF">
			<div align="center">
				<img src="admin/1221.jpg" width="300" height="250" />
			</div>
		</td>
	</tr>
	<tr>
		<td width="146" height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left">
				Stock #:
			</div>
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
			<div align="left"> Price:</div>
		</td>
		<td height="25" bgcolor="#E7E7E7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<?= $price; ?>
		</td>
	</tr>
	<tr>
		<td valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
			<div align="left"> Description:</div>
		</td>
		<td height="60" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $description; ?>
		</td>
	</tr>
</table>
				
<? include('closedb.php'); 
?>
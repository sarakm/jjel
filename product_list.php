<?php
session_start();
include('config.php');
include('opendb.php');
include("top.php");
//include("left.php");
//print_r($_POST);
?>
<!-- ######################################################## -->
<!-- ##            start of div id="mainwindow"            ## -->
<!-- ######################################################## -->
<?
$mode = strtolower($_POST['mode']);
if ($mode == "start") {
	$start = strtolower($_POST['start']);
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE LOWER(productname) LIKE '$start%' AND catid= '$id'";
	}else{
		$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE LOWER(productname) LIKE '$start%'";
	}
}elseif ($mode == "listproduct"){
$catid = $_POST['id'];
	$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE catid = '$catid'";
}elseif ($mode == "cat"){
	$id = $_POST['subcat'];
	$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE catid = '$id'";
}elseif ($mode == "search"){
	$search = $_POST['search'];
	$field = $_POST['field'];
	switch($field)	{
		case 1:
			$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE productname LIKE '%$search%'";
			break;
		case 2:
			$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE sku LIKE '%$search%'";
			break;
		case 3:
			$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE partno LIKE '%$search%'";
			break;
		case 4:
			$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE manufacturer LIKE '%$search%'";
			break;
		default:
			$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE productname LIKE '%$search%'";
			break;
	}
}
$results = mysql_query($sql) or die(mysql_error());
$_SESSION['sql']=$sql;
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td height="25" bgcolor="#230113">                    
			<div align="center" class="style6">
				<form name="start_form" action="product_list.php" method="post">
					<input type="hidden" name="mode" value="start"/>
					<input type="hidden" name="id" value="<?=$id;?>"/>
					<input type="hidden" name="start" value="33"/>
					
					<?php 
					foreach(range('A','Z') as $i){
						?>
						<a href="javascript:void(0)" onClick="document.forms['start_form'].start.value='<?=$i?>'; document.forms['start_form'].submit();" class="start"><?=$i?></a>
						<?
					}
					?>

				</form>
			</div>
		<td>&nbsp;</td>
		</td>
	</tr>
	<tr>
		<td height="25"> </td>
	</tr>
	<tr>
	<td height="25">
	<div style="overflow:auto; background-color:#FFFFFF; width:850px; height:340px;" id="productslist">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr> 
			<td width="100" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
				<div align="center"><strong> Stock #</strong></div>
			</td>
			<td width="250" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
			<div align="center"><strong>Product desc</strong></div>
			</td>
			<td width="150" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
			<div align="center"><strong>Manufacturer</strong></div>
			</td>
			<td width="150" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
			<div align="center"><strong>Part #</strong></div>
			</td>
			<td width="80" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
			<div align="center"><strong>Datecode</strong></div>
			</td>
			<td width="50" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
			<div align="center"><strong>Qty</strong></div>
			</td>
			<td width="70" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
			<div align="center"><strong>Price</strong></div>
			</td>
		</tr>
		<?
		$counter = 0;
		while(list($productid, $productname, $manufacturer, $stockno, $partno, $datecode, $qty, $price, $flag) = mysql_fetch_array($results))
		{
		if ($flag == 0)

		$color = ($counter % 2 == 0) ? "#F7F7F7":"#FFFFFF";
		?>
		<tr>
			<form name="show_form<?=$productid?>" action="showproduct.php" method="post">
			<input type="hidden" name="id" value="<?=$productid?>"/>
				<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; cursor:pointer;" onClick="document.forms['show_form<?=$productid?>'].submit();">
				<div align="center">
				<?= $stockno; ?>
				</div>
				</td>
				<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; cursor:pointer;" onClick="document.forms['show_form<?=$productid?>'].submit();">
				<div align="center">
				<?= $productname; ?>
				</div>
				</td>
				<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; cursor:pointer;" onClick="document.forms['show_form<?=$productid?>'].submit();">
				<div align="center">
				<?= $manufacturer; ?>
				</div>
				</td>
				<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; cursor:pointer;" onClick="document.forms['show_form<?=$productid?>'].submit();">
				<div align="center">
				<?= $partno; ?>
				</div>                                            
				</td>
				<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; cursor:pointer;" onClick="document.forms['show_form<?=$productid?>'].submit();">
				<div align="center">
				<?= $datecode; ?>
				</div>
				</td>
				<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; cursor:pointer;" onClick="document.forms['show_form<?=$productid?>'].submit();">
				<div align="center">
				<?= $qty; ?>
				</div>                                            
				</td>
			</form>
			<td height="80" bgcolor="<?= $color; ?>" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
				<div align="center">
					<form name="rfq_form<?=$productid?>" action="addrfq.php" method="post">
					<input type="hidden" name="id" value="<?=$productid?>"/>
					<a href="javascript:void(0);" onclick="document.forms['rfq_form<?=$productid?>'].submit();"><img src="images/rfq.jpg" onmouseover="this.src='images/rfqon.jpg';" onmouseout="this.src='images/rfq.jpg'" name="rfq" width="30" height="18" border="0" id="rfq" /></a>
<!--
					<input type="image" src="images/rfq.jpg" height="18" width="30" border="0" alt="RFQ Button" name="rfq" id="rfq" />
-->		
					<!--
					<a href="javascript:void(0);" onclick="showRFQ(<?=$productid?>);"><img src="images/rfq.jpg" onmouseover="this.src='images/rfqon.jpg';" onmouseout="this.src='images/rfq.jpg'" name="rfq" width="30" height="18" border="0" id="rfq" /></a>
					-->
					</form>
				</div>
			</td>
		</tr>
		<? 
		$counter++;	}
		?>
		</table>
	</div>
	</td>
	</tr>
</table>

<!-- ######################################################## -->
<!-- ##              end of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<?
//include("right.php");
include("bottom.php");
?>
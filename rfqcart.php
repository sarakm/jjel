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
<div style="overflow:auto; width:100%; height:340px;">

<form name="update_form" action="updaterfq.php" method="post">
<input type="hidden" name="mode" value="update"/>
<input type="hidden" name="item" value=""/>

<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
	<td width="37" height="20" bgcolor="#230113">&nbsp;</td>
	<td width="176" height="20" bgcolor="#230113">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#FFFFFF">
			SKU
		</div>
	</td>
	<td width="176" height="20" bgcolor="#230113">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#FFFFFF">
			Part number
		</div>
	</td>
	<td width="49" height="20" bgcolor="#230113">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#FFFFFF">
			Qty
		</div>
	</td>
	<td width="91" height="20" bgcolor="#230113">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#FFFFFF">
			Target price
		</div>
	</td>
	<td width="133" height="20" bgcolor="#230113">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#FFFFFF">
			Extended
		</div>
	</td>
</tr>

<?
$total = 0;
if (isset($_SESSION['rfq'])) {

	foreach($_SESSION['rfq'] as $key => $val){
?>
<tr>
	<input type="hidden" name="key[]" value="<?=$key?>"/>
	<td height="20" bgcolor="#FFFFFF">
		<div align="center">
			<img src="images/trash.gif" width="12" height="12" onClick="document.forms['update_form'].mode.value='remove';document.forms['update_form'].item.value='<?=$key?>';document.forms['update_form'].submit();" style="cursor:pointer;" title="Remove" alt="Remove" />
		</div>
	</td>
	<td height="20" bgcolor="#FFFFFF">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $_SESSION['rfq'][$key]['sku']; ?>
		</div>
	</td>
	<td height="20" bgcolor="#FFFFFF">
		<div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
			<?= $_SESSION['rfq'][$key]['partno']; ?>
		</div>
	</td>
	<td height="20" bgcolor="#FFFFFF">
		<div align="center">
		<?
			$qty = $_SESSION['rfq'][$key]['qty'];
			if(empty($qty))
				$qty = 1
		?>
			<input name="qty[]" type="text" style="width:40px;" value="<?= $qty; ?>" onkeypress="return checkForInt(event)" />
		</div>
	</td>
	<td height="20" bgcolor="#FFFFFF">
		<div align="center">
		<?
			$price = $_SESSION['rfq'][$key]['price'];
			if(empty($price))
				$price = 0
		?>
			<input name="price[]" type="text" style="width:50px;" value="<?= $price; ?>" onchange="this.value=checkForPrice(this.value)" />
		</div>
	</td>
		<?
		if( $_SESSION['rfq'][$key]['qty'] != "" 
			&& $_SESSION['rfq'][$key]['qty'] != 0 
			&& $_SESSION['rfq'][$key]['price'] != "" 
			&& $_SESSION['rfq'][$key]['price'] != 0 ){
			$subtotal = $_SESSION['rfq'][$key]['qty'] * $_SESSION['rfq'][$key]['price'];
		} else {
			$subtotal = 0;
		}
		?>
	<td height="20" bgcolor="#FFFFFF"><div align="right" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">$<?= $subtotal; ?></div>
	</td>
</tr>
		<?
		$total += $subtotal;
	}
}
?>
<tr>
	<td height="10" colspan="6" bgcolor="#E7E7E7">
		<img src="images/spacer.gif" width="10" height="10">
	</td>
</tr>
<tr>
	<td height="20" bgcolor="#FFFFFF">&nbsp;</td>
	<td height="20" bgcolor="#FFFFFF">&nbsp;</td>
	<td height="20" bgcolor="#FFFFFF">
		<img src="images/b_updateC.gif" width="56" height="19" onClick="document.forms['update_form'].submit();" style="cursor:pointer;" alt="Update" title="Update" />
		&nbsp;
		<img src="images/b_emailRFQC.gif" width="84" height="19" onClick="document.forms['update_form'].mode.value='email';document.forms['update_form'].submit();" style="cursor:pointer;" alt="Email" title="Email" />
	</td>
	<td height="20" bgcolor="#FFFFFF">&nbsp;</td>
	<td height="20" bgcolor="#FFFFFF">
		<div align="center">
			<span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
				TOTAL
			</span>
		</div>
	</td>
	<td height="20" bgcolor="#FFFFFF">
		<div align="right" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px;">
			$<?= $total; ?>
		</div>
	</td>
</tr>
<tr>
	<td height="10" colspan="6" bgcolor="#E7E7E7">
		<img src="images/spacer.gif" width="10" height="10">
	</td>
</tr>
<tr>
	<td colspan="6" align="center" valign="bottom" height="80">
		<FORM><INPUT type=button value=" Back " onClick="parent.history.back(); return false;" style="font-size:18px; font-weight:bold; background-color:#D3D3D3; cursor:pointer;"></FORM>
	</td>
</tr>
</table>
</form>
</div>
<!-- ######################################################## -->
<!-- ##              end of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<?
//include("right.php");
include("bottom.php");
?>
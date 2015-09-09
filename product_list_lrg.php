<?
include('config.php');
include('opendb.php');

$id = $_GET['id'];
$mode = $_GET['mode'];
$start = $_GET['start'];
$search = $_GET['search'];
$field = $_GET['field'];

if (strtolower($mode) == "start") {
	$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE productname LIKE '$start%'";
}
elseif (strtolower($mode) == "cat")
{
	$sql = "SELECT productid, productname, manufacturer, stockno, partno, datecode, qty, price, flag FROM products WHERE catid = '$id'";
}
elseif (strtolower($mode) == "search")
{
	switch($field)
	{
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
?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" bgcolor="#230113">
                    <div align="center" style="font-size: 11px; color: #FFFFFF; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;">
                    <a href="javascript:void(0)" onclick="showStart('a')" class="start">A</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('b')" class="start">B</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('c')" class="start">C</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('d')" class="start">D</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('e')" class="start">E</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('f')" class="start">F</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('g')" class="start">G</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('h')" class="start">H</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('i')" class="start">I</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('j')" class="start">J</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('k')" class="start">K</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('l')" class="start">L</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('m')" class="start">M</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('n')" class="start">N</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('o')" class="start">O</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('p')" class="start">P</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('q')" class="start">Q</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('r')" class="start">R</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('s')" class="start">S</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('t')" class="start">T</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('u')" class="start">U</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('v')" class="start">V</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('w')" class="start">W</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('x')" class="start">X</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('y')" class="start">Y</a>&nbsp;&nbsp; 
                    <a href="javascript:void(0)" onclick="showStart('z')" class="start">Z</a>&nbsp;&nbsp;
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td height="25">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="25">
                   	  <div style="overflow:auto; background-color:#FFFFFF; height:400px;" id="productslist">
<?
	while(list($productid, $productname, $manufacturer, $stockno, $partno, $datecode, $qty, $price, $flag) = mysql_fetch_array($results))
	{
		if ($flag == 0)
			$price = "<a href=\"#\" onclick=\"alert('RFQ');\"><img src=\"images/rfq.jpg\" onmouseover=\"this.src='images/rfqon.jpg'\" onmouseout=\"this.src='images/rfq.jpg'\" name=\"rfq\" width=\"30\" height=\"18\" border=\"0\" id=\"rfq\" /></a>";
?>

                                      <table width="890" border="0" align="center" cellpadding="0" cellspacing="0">
                          				<tr onclick="showProductDetail(<?= $productid; ?>)">
                                            <td width="80" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>&nbsp;Stock #</strong></div></td>
                                            <td width="168" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>Product desc</strong></div></td>
                                            <td width="140" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>Manufacturer</strong></div></td>
                                            <td width="93" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>Part #</strong></div></td>
                                            <td width="103" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>Datecode</strong></div></td>
                                            <td width="106" height="20" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>Qty</strong></div></td>
                                            <td width="106" bgcolor="#000000" style="color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;"><div align="center"><strong>Price</strong></div></td>
                          				</tr>
                                        <tr>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onClick="showProductDetail(<?= $productid; ?>)">
                                              	<div align="center">
                                                <?= $stockno; ?>
                                            	</div>
                                            </td>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onClick="showProductDetail(<?= $productid; ?>)">
                                            	<div align="center">
                                              	<?= $productname; ?>
                                            	</div>
                                            </td>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onClick="showProductDetail(<?= $productid; ?>)">
                                            	<div align="center">
                                              	<?= $manufacturer; ?>
                                            	</div>
                                            </td>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onClick="showProductDetail(<?= $productid; ?>)">
                                            	<div align="center">
                                              	<?= $partno; ?>
                                            	</div>
                                            </td>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onClick="showProductDetail(<?= $productid; ?>)">
                                            	<div align="center">
                                              	<?= $datecode; ?>
                                            	</div>
                                            </td>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;" onClick="showProductDetail(<?= $productid; ?>)">
                                            	<div align="center">
                                                <?= $qty; ?>
                                                </div>
                                            </td>
                                            <td height="80" bgcolor="#FFFFFF" style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
                                            	<div align="center">
                                              	<?= $price; ?>
                                            	</div>
                                             </td>
                                        </tr>
           							</table>
<? 
	}
include('closedb.php'); 
?>
						</div>
                    </td>
                  </tr>
                </table>
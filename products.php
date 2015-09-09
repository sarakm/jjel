<?
include('config.php');
include('opendb.php');
include("top.php");
//include("left.php");
?>
<!-- ######################################################## -->
<!-- ##            start of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<div style="padding: 20px 20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; overflow:auto; height:330px;">
	<!-- start cat -->
	<?
	$sql = "SELECT catid, catname FROM categories WHERE catparent = '0' ORDER BY catname ASC";
	$result = mysql_query($sql) or die(mysql_error());
	
	while (list($catid, $catname) = mysql_fetch_array($result)){
?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="background-image:url(images/top.jpg); background-repeat:no-repeat; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF; font-weight:bold;" height="30">&nbsp;&nbsp;&nbsp;<?= $catname; ?></td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 3px #230113;">
					<tr>
						<td valign="top" bordercolor="#FFFFFF" style="padding:10px 10px;">
						<? 
							$catsql = "SELECT catid, catname FROM categories WHERE catparent = '$catid' ORDER BY catname ASC";
							$results = mysql_query($catsql) or die(mysql_error());
							while (list($catid, $catname) = mysql_fetch_array($results)){
							?>
								<form name="product_form<?=$catid?>" action="product_list.php" method="post">
								<input type="hidden" name="mode" value="listproduct"/>
								<input type="hidden" name="id" value="<?=$catid?>"/>
									<a href="javascript:void(0);" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#230113; text-decoration:none;" onClick="document.forms['product_form<?=$catid?>'].submit();"><?=$catname?></a><br />
								</form>
							<?
							}
						?>
						</td>
					</tr>
					</table>
				</td>
			</tr>
		</table>
		<br />
<? 
	} 
?>
	<!-- end cat -->
</div>

<!-- ######################################################## -->
<!-- ##              end of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<?
//include("right.php");
include("bottom.php");
?>
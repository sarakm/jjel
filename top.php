<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JJ ELectronics Components</title>
<link rel="shortcut icon" href="images/jj.ico">
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="Scripts/jj_electronics.js" type="text/javascript"></script>
<!--
<link rel="stylesheet" href="style/html.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/forms.css" type="text/css" media="screen" />
-->
<link rel="stylesheet" href="style/jj_electronics.css" type="text/css" media="screen" />
</head>
<body bgcolor="#FFFFFF">

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" id="Main">
<tr>
	<td width="516" height="111" valign="top"><img src="images/iPt2_01.jpg" width="516" height="111" /></td>
	<td width="464" height="177" rowspan="2" align="left" valign="top" background="images/eP_02.jpg">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="464" height="177" align="top" id="FlashID">
			<param name="movie" value="flash/electronic_flash.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="opaque" />
			<param name="swfversion" value="6.0.65.0" />
			<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
			<param name="expressinstall" value="Scripts/expressInstall.swf" />
			<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
			<!--[if !IE]>-->
			<object data="flash/electronic_flash.swf" type="application/x-shockwave-flash" width="464" height="177" align="top">
			<!--<![endif]-->
				<param name="quality" value="high" />
				<param name="wmode" value="opaque" />
				<param name="swfversion" value="6.0.65.0" />
				<param name="expressinstall" value="Scripts/expressInstall.swf" />
				<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
				<div>
					<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
				</div>
				<!--[if !IE]>-->
			</object>
			<!--<![endif]-->
		</object>
	</td>
</tr>
<tr>
	<td width="516" height="66" align="left" valign="bottom" background="images/iPt2_03.jpg">
		<form name="search_form" action="product_list.php" method="post">
		<input type="hidden" name="mode" value="search"/>
		<table height="40" width="516" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="34">&nbsp;</td>
			<td width="212"><input type="text" size="35" name="search" id="search" /></td>
			<td width="10">&nbsp;</td>
			<td width="119">
				<select name="field" id="field">
					<option value="3">Part #</option>
					<option value="1">Product desc</option>
					<option value="2">SKU #</option>            
					<option value="4">Manufacturer</option>
				</select></td>
			<td width="141">
				<input type="image" src="images/ePt_05.png" height="40" width="91" border="0" alt="Search Button" name="search" id="search" />

<!--
				<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('search','','images/ePt_r_05.png',1)">
					<img src="images/ePt_05.png" alt="Search Button" name="search" width="91" height="40" border="0" id="search" onclick="showSearch(document.getElementById('search').value);" />
				</a>
-->
			</td>
		</tr>
		</table>
		</form>
	</td>
</tr>
<tr>
	<td height="42" colspan="2" valign="top" background="images/eP_04.jpg">
		<table height="33" width="980" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="68">&nbsp;</td>
			<td width="128"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Home','','images/ePt_r_06.png',1)"><img src="images/ePt_06.png" alt="Home Button" name="Home" width="76" height="33" border="0" id="Home" /></a></td>
			<td width="144"><a href="aboutus.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('AboutUs','','images/ePt_r_07.png',1)"><img src="images/ePt_07.png" alt="About Us Button" name="AboutUs" width="101" height="33" border="0" id="AboutUs" /></a></td>
			<td width="156"><a href="products.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Products','','images/ePt_r_09.png',1)"><img src="images/ePt_09.png" alt="Products Button" name="Products" width="93" height="33" border="0" id="Products" /></a></td>
			<td width="243"><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Contact Us','','images/ePt_r_11.png',1)"><img src="images/ePt_11.png" alt="Contact Us Button" name="Contact Us" width="87" height="33" border="0" id="Contact Us" /></a></td>
			<td width="241"><div style="margin-left:60px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;"><a href="rfqcart.php">View RFQ cart</a></div></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2" >
		<form name="category_form" action="product_list.php" method="post">
		<input type="hidden" name="mode" value="cat"/>
		<table>
		<tr>
			<td align="right"><div style="padding-left: 45px; font-weight: bold;">Search by category: </div></td>
			<td align="right" width="210">
				<div>
					<select name="maincat" id="maincat" style="width:200px;" onchange="showCategories(this.value)">
						<option value="">Select main category</option>
						<?
						$sql = "SELECT catid, catname FROM categories WHERE catparent = '0' ORDER BY catname ASC";
						$results = mysql_query($sql) or die(mysql_error());

						while (list($catid, $catname) = mysql_fetch_array($results))
						{
						?>
						<option value="<?= $catid; ?>"><?= $catname; ?></option>
						<? } ?>
					</select>
				</div>
			</td>
			<td>
				<div align="center" id="subcategorydiv">
					<select name="subcat" id="subcat" style="width:200px;">
						<option value="">Select sub category</option>
					</select>
				</div>
			</td>
			<td>
				<input type="image" src="images/ePt_05.png" height="40" width="91" border="0" alt="Search Button" name="search" id="search" />
			</td>
		</tr>
		</table>
		</form>
	</td>
</tr>
</table>

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td>
	<div id="static_content1">

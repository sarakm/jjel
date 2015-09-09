<?php
include('config.php');
include('opendb.php');
include("top.php");
//include("left.php");
//print_r($_POST);
?>
<!-- ######################################################## -->
<!-- ##            start of div id="mainwindow"            ## -->
<!-- ######################################################## -->

	<table width="735" border="0" cellspacing="2" cellpadding="4" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
  <tr>
    <td height="25" colspan="2" bgcolor="#230113" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#FFFFFF;">&nbsp;Fill in your personal information below:</td>
  </tr>
  <tr>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="215" height="25"><div align="right">Company name:</div></td>
    <td width="520" height="25"><input name="companyname" type="text" class="tf" id="companyname" /></td>
  </tr>
  <tr>
    <td height="25"><div align="right">Contact name:</div></td>
    <td height="25"><input name="contactname" type="text" class="tf" id="contactname" /></td>
  </tr>
  <tr>
    <td height="25"><div align="right">Street address:</div></td>
    <td height="25"><input name="address" type="text" class="tf" id="address" /></td>
  </tr>
  <tr>
    <td height="25"><div align="right">City / Province / Country:</div></td>
    <td height="25"><input name="city" type="text" class="tf" id="city" /></td>
  </tr>
  <tr>
    <td height="25"><div align="right">Postal code / ZIP:</div></td>
    <td height="25"><input name="postal" type="text" class="tf" id="postal" /></td>
  </tr>
  <tr>
    <td height="25"><div align="right">Phone number (daytime EST):</div></td>
    <td height="25"><input name="phone" type="text" class="tf" id="phone" /></td>
  </tr>
  <tr>
    <td height="25"><div align="right">Email address:</div></td>
    <td height="25"><input name="email" type="text" class="tf" id="email" /></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25"><input type="checkbox" name="sendme" id="sendme" />&nbsp;<span style="font-style:italic;">Send a copy to my email address</span></td>
  </tr>
  <tr>
    <td height="25"><div align="right">Additional Comments:</div></td>
    <td height="25"><textarea name="comments" id="comments" style="width:300px; height:100px; border:solid 1px #cccccc;"></textarea></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25"><input type="button" name="submit" value="Send RFQ" onclick="emailRFQ()"/></td>
  </tr>
</table>

<!-- ######################################################## -->
<!-- ##              end of div id="mainwindow"            ## -->
<!-- ######################################################## -->

<?
//include("right.php");
include("bottom.php");
?>

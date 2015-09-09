<?
include('config.php');
include('opendb.php');
include("top.php");
?>
<!-- ######################################################## -->
<!-- ##            start of static content            ## -->
<!-- ######################################################## -->

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-image:url(contactpage/cP_17.jpg); background-repeat:no-repeat">
            <tr>
              <td width="569" valign="top">
              <div style="width:550px; height:335px;">
                <table width="460" border="0" cellspacing="6" cellpadding="2" style="margin-left:50px;">
                  <tr>
                    <td height="45" colspan="2"><img src="contactpage/ePt_19.png" width="272" height="27" /></td>
                    </tr>
                  <tr>
                    <td height="45" colspan="2" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold;">Use the form below to contact us and to get more information about our company, our products and services.</td>
                    </tr>
                  <tr>
                    <td width="117" height="30" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold"><div align="right">Your name:</div></td>
                    <td width="263" height="30"><input type="text" name="name" id="name" style="width:220px;"/></td>
                  </tr>
                  <tr>
                    <td height="30" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold"><div align="right">Email address:&nbsp;</div></td>
                    <td height="30"><input type="text" name="email" id="email" style="width:220px;"/></td>
                  </tr>
                  <tr>
                    <td height="30" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold"><div align="right">Phone number:</div> </td>
                    <td height="30"><input type="text" name="phone" id="phone" style="width:220px;"/></td>
                  </tr>
                  <tr>
                    <td height="30" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold"><div align="right">Comments:</div> </td>
                    <td height="30">
                    	<textarea name="comments" id="comments" wrap="virtual" style="width:220px; height:50px;"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td height="30">&nbsp;</td>
                    <td height="30"><a href="javascript:void(0)" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('send','','contactpage/ePtR_34.png',1)" onclick="sendEmail()"><img src="contactpage/ePt_34.png" alt="Send" name="send" width="72" height="45" border="0" id="send"/></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('reset','','contactpage/ePtR_35.png',1)"><img src="contactpage/ePt_35.png" alt="Reset" name="reset" width="69" height="45" border="0" id="reset" onclick="clearAll()" /></a></td>
                  </tr>
                </table>
              </div>
              </td>
              <td width="351" height="350" valign="top">
              <div style="margin-top:40px; margin-left:25px;">
              	<table width="310" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="contactpage/ePt_25.png" width="217" height="29" /></td>
    </tr>
  <tr>
    <td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
    J.J. Electronics Components<br />
    2625 Eglinton Ave. East<br />
    Scarborough, ON M1K 2S2<br />
    Canada<br />
    T: (416)266-1600 <br />
    F: (416)266-1603 <br />
    E: sales@jjelectronicscomponents.com <br />
    I: info@jjelectronicscomponents.com
    </td>
    </tr>
  <tr>
    <td height="30">&nbsp;</td>
    </tr>
  <tr>
    <td><img src="contactpage/ePt_31.png" width="138" height="27" /></td>
    </tr>
  <tr>
    <td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">
    J.J. Electronics Components<br />
    30 Glider Dr. Unit #110<br />
    Scarborough, ON M1K 4P6 <br />
    Canada
    <br /><br />
    <a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=2625+Eglinton+Ave.+East+Scarborough+ON+M1K+2S2+Canada&sll=37.0625,-95.677068&sspn=50.823846,114.257812&ie=UTF8&z=16&iwloc=A" target="_blank">Click here to view Map</a>
    </td>
    </tr>
</table>

              </div>
              </td>
            </tr>
              </table>

<!-- ######################################################## -->
<!-- ##              end of static content            ## -->
<!-- ######################################################## -->

<?
include("bottom.php");
?>
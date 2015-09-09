<?php

include('../config.php');
include('../opendb.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<style>
.style1 {color: #990000}
.tf {		width: 300px;
		height: 20px;
}
.btn {		width: 120px;
		height: 25px;
}
</style>

<script>

function setName(name, val)
{
	document.getElementById('oldname').value = name;
	document.getElementById('id').value = val;	
}
</script>
</head>

<body>
<div style="width:618px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
<form action="edit_category_action.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="oldname" id="oldname" />
<input type="hidden" name="id" id="id" />
  <table width="100%" border="0" cellspacing="6" cellpadding="2">
    <tr>
      <td colspan="2"><h3 class="style1">EDIT CATEGORY</h3></td>
    </tr>
    <tr>
      <td width="25%">Categories:</td>
      <td width="75%">
      <select name="parent" id="parent" class="tf" onchange="setName(this.options[this.selectedIndex].text, this.value)">
        <?php
                $sql = "SELECT catid, catname FROM categories WHERE catparent = '0' ORDER BY catparent ASC";
                $res = mysql_query($sql) or die(mysql_error());
                
                    while(list($catid, $catname) = mysql_fetch_array($res))
                    {
                        echo "<option value=\"$catid\">$catname</option>\n";
                    }
                
                ?>
      </select></td>
    </tr>
    <tr>
      <td>New name:</td>
      <td><input type="text" name="rename" id="rename" class="tf"/></td>
    </tr>
    <tr>
      <td>Category image:</td>
      <td><input name="catimg" type="file" class="tf" id="catimg" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn" name="addcat" id="addcat" value="Edit category" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<? include('../closedb.php'); ?>
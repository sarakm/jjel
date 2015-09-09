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
</head>

<body>
<div style="width:618px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
<form action="add-category.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="6" cellpadding="2">
    <tr>
      <td colspan="2"><h3 class="style1">ADD CATEGORY</h3></td>
    </tr>
    <tr>
      <td width="25%">Category name:</td>
      <td width="75%"><input name="catname" type="text" class="tf" id="catname" /></td>
    </tr>
    <tr>
      <td>Category parent:</td>
      <td><select name="parent" id="parent" class="tf">
        <option value="0">Select a parent category</option>
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
      <td>Category image:</td>
      <td><input name="catimg" type="file" class="tf" id="catimg" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn" name="addcat" id="addcat" value="Add category" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<? include('../closedb.php'); ?>
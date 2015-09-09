<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
$catid = $_GET['catid'];
?>
<?
include('top.php');
?>
<script>
function setName(name, val){
	document.getElementById('oldname').value = name;
	document.getElementById('id').value = val;	
}
</script>

<?
$sql = "SELECT catname, catimg FROM categories WHERE catid = '$catid'";
$res = mysql_query($sql) or die(mysql_error());
list($catname, $catimg) = mysql_fetch_array($res);
?>

<div id="edit_category" style="width:940px; margin: 10px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">

<h3>EDIT CATEGORY</h3>

<form action="edit_category_action.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="catid" value="<?=$catid?>" />

<table width="800" border="0" cellspacing="6" cellpadding="2">
<tr>
  <td>
	<table width="500" border="0" cellspacing="6" cellpadding="2">
	  <tr>
		<td width="150">Category name:</td>
		<td><input type="text" name="catname" value="<?=$catname?>" /></td>
	  </tr>
	  <tr>
		<td width="150">Current image:</td>
		<td><img src="../uploads/category-images/<?=$catimg?>" width="100" height="100" border="0"/></td>
	  </tr>
	  <tr>
		<td>New image:</td>
		<td><input name="img_file" type="file" class="tf" id="catimg" /></td>
	  </tr>
	  <tr>
		<td width="200">&nbsp;</td>
		<td><input type="submit" name="editcat" value="Save changes" /></td>
	  </tr>
	  
	  
	  

	</table>
  </td>
  <td align="right" valign="top">
	<div style="width:200px; background-color: #FDBBBB; padding: 10px; border: 1px solid black; text-align: left;">
	<p>
	On this page you can change the category(subcategory) name and image. 
	
	</p>
	</div>
  </td>
</tr></table>
<br><br><br>


  
</form>
</div>

<?
include('bottom.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin section</title>

<style>
a.cat:link
{
	color: #990033;	
	text-decoration: none;
}

a.cat:visited
{
	color: #990033;	
	text-decoration: none;
}

a.cat:hover
{
	color: #FF0000;	
	text-decoration: underline;
}
</style>

<script>

function changeTxt(i)
{
	switch(parseInt(i))
	{
		case 1:
			document.getElementById('submitbtn').value = "Search Part #";
		break;
		
		case 2:
			document.getElementById('submitbtn').value = "Search Stock #";
		break;
		
		case 3:
			document.getElementById('submitbtn').value = "Search SKU #";
		break;
	}
}
</script>
</head>

<body bgcolor="#999999">
<div>
  <div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF; font-weight:bold; margin-bottom:20px;">J.J. Electronics Components Administration Panel</div>
</div>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #000000; background-color:#FFFFFF">
  <tr>
    <td width="180" height="650" valign="top">
      <div style="padding:3px; margin-top: 15px; margin-left:15px; width:160px; height:290px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; background-color:#E7E7E7">      	
        <a href="add_category.php" target="main" class="cat">ADD CATEGORY</a>
        <br /><br />
        <a href="edit_category.php" target="main" class="cat">EDIT CATEGORY</a>
        <br /><br />  
        <a href="add_product.php" target="main" class="cat">ADD PRODUCT</a>      
        <br /><br />                
        <a href="list.php" target="main" class="cat">EDIT PRODUCT</a>
        <br /><br />                
        <a href="#" class="cat">LOGOUT</a>
        <form action="edit.php" method="get" style="margin-top:20px;" target="main">
          <div align="center">
            <input type="text" name="search" id="search" style="margin-bottom:10px; width:145px;"/>
                <select name="filter" id="filter" style="margin-bottom:10px; width:145px;" onchange="changeTxt(document.getElementById('filter').value)">
                	<option value="1">Part#</option>
                    <option value="2">Stock#</option>
                    <option value="3">SKU#</option>
                </select>
            <input type="submit" id="submitbtn" value="Search Part #" style="width: 120px;"/>
          </div>
        </form>
      </div>    </td>
    <td width="618" valign="top"><iframe width="100%" height="650" frameborder="0" scrolling="no" src="add_product.php" name="main"></iframe></td>
  </tr>
</table>
</body>
</html>

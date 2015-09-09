<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin section</title>

<style>
#content{
	width: 950px;
	background-color: white;
	margin: 0 auto;
	position: relative;
	padding-top: 5px;
	min-height: 750px;
}
.menu{
	margin-left: 5px;
	height:32px;
	padding: 5px;
	width: 60%;
	font-family:Verdana, Arial, Helvetica, sans-serif; 
	font-size:14px; 
	font-weight:bold; 
	background-color:#E7E7E7; 
	border-right: 1px solid black; 
	border-bottom: 1px solid black;
}
.menu a
{
	display: block;
	float: left;
	text-decoration: none;
	color: #990033;	
	padding: 0 10px;
	border-right: 1px solid black;
	line-height: 30px;
}
.menu a#last{
	border-right: 0px solid black;
}
.menu a:hover
{
	color: #0000ff;	
	background-color: #D3D3D3;
}

/* add_product */
#add_product .style1 {color: #990000}
#add_product .tf {		width: 150px;
}
#add_product .rtf {		width: 100px;
}
#add_product .stf {		width: 50px;
		height: 15px;
}
#add_product .tf1 {		width: 150px;
}
#add_product .ta {		width: 430px;
		height: 80px;	
}
#add_product .btn {		width: 120px;
		height: 25px;
}
/* add_category */
#add_category .style1 {color: #990000}
#add_category .tf {		width: 300px;
		height: 20px;
}
#add_category .btn {		width: 120px;
		height: 25px;
}
/* edit_category */
#edit_category .style1 {color: #990000}
#edit_category .tf {		width: 150px;
		height: 20px;
}
#edit_category .btn {		width: 120px;
		height: 25px;
}
#edit_category h3 {
	margin-top: 40px;
	margin-left: 10px;
	color: #990000;
}
.catparent {
	padding: 5px;
	height: 20px;
	text-indent: 5px;
	color: #990000; 
	font-weight: bold; 
	background-color: #FDC9C9;
}
.catchild {
	margin-left: 20px;
	padding: 5px;
	height: 20px;
}
.cat_tbl {
	background-color: 
	#990000; color: #fff;
	font-weight: bold;
	text-align: center;
	font-size:12px;
}
/* edit */
#edit .btn
	{
		width: 120px;
		height: 25px;
	}
#edit .tf
	{
		width: 300px;
		height: 20px;
	}
#edit .rtf
	{
		width: 100px;
		height: 20px;
	}
#edit .stf
	{
		width: 50px;
		height: 20px;
	}
#edit .ta
	{
		width: 300px;
		height: 80px;	
	}
#edit .style1 {color: #990000}
#last_product{
	margin:10px;
}

.p_list1 
	{
	color: #ffffff;
	font-weight: bold;
	}
.p_list2 {color: #990000}
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
		
		case 4:
			document.getElementById('submitbtn').value = "Pick Code";
		break;
	}
}
</script>
</head>

<body bgcolor="#999999">

<div>
  <div align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF; font-weight:bold; margin-bottom:20px;">J.J. Electronics Components Administration Panel</div>
</div>

<div id="content">

<!--      <div style="">      	
 -->   <div class="menu">      	
        <a href="add_category.php" >Add Category</a>
        <a href="list_category.php" >Edit Category</a>
        <a href="add_product.php" >Add Product</a>                    
        <a href="list.php" >Edit Product</a>         
        <a href="logout.php" id="last">Logout</a>
      </div>  

	  <form action="edit.php" method="get" style="margin-top:20px;">
          <div style="margin-left:20px;">
            <input type="text" name="search" id="search" style="margin-bottom:10px; width:145px;"/>
                <select name="filter" id="filter" style="margin-bottom:10px; width:145px;" onchange="changeTxt(document.getElementById('filter').value)">
                	<option value="1">Part#</option>
                    <option value="2">Stock#</option>
                    <option value="3">SKU#</option>
                    <option value="4">PickCode</option>
                </select>
            <input type="submit" id="submitbtn" value="Search Part #" style="width: 120px;"/>
          </div>
        </form>  

	<?
	$filename = end(explode("/", $_SERVER["SCRIPT_NAME"]));
	if($filename==="list.php"){
		$sql = "SELECT * FROM products ORDER BY productid DESC LIMIT 1";
		$res = mysql_query($sql) or die(mysql_error());	
		
		$row = mysql_fetch_array($res);	
	?>	
<div style="position:absolute; top:12px; right:0px; width: 350px;">
	<center><i>The last product entered</i></center>
	<div id="last_product" style="background-color: #FDBBBB;border:1px solid black;">
		<table border="0" width="100%" style="font-size: 14px;">
		<tr>
			<td height="" colspan="2" align="center">
				<b><?=$row['productname']; ?></b>
			</td>
		</tr>
		<tr>
			<td height="" colspan="2">
				Manufacturer: <?=$row['manufacturer'];?>
			</td>
		</tr>
		<tr>
			<td width="60">
				<img src="../uploads/product-images/<? echo $row['img']; ?>" width="50" height="50" />
			</td>
			<td>
				<table border="0" width="100%">
				  <tr>
				    <td width="70">
					<b>Stock #:</b>
				    </td>
				    <td>
					<? echo $row['stockno'] ."<br>"; ?>
				    </td>
				  </tr>
				  <tr>
				    <td>
					<b>Part #: </b>
				    </td>
				    <td>
					<? echo $row['partno'] ."<br>"; ?>
				    </td>
				  </tr>
				  <tr>
				    <td>
					<b>SKU: </b>
				    </td>
				    <td>
					<? echo $row['sku'] ."<br>"; ?>
				    </td>
				  </tr>
				  <tr>
				    <td>
					<b>Pick code: </b>
				    </td>
				    <td>
					<? echo $row['pickcode'] ."<br>"; ?>
				    </td>
				  </tr>
				  <tr>
				    <td>
					<b>Price: &nbsp; &nbsp; &nbsp;</b>
				    </td>
				    <td>
					<? echo $row['price'] ."<br>"; ?>
				    </td>
				  </tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="25" colspan="2" >
				&nbsp;
			</td>
		</tr>
		</table>
	</div>

</div>
	<?
	};
	?>

<hr style="background-color: #990000; height: 5px;">
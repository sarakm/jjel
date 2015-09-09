<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
//delete child category & products in that category
if(isset($_GET['delchild'])){
	$child_id = $_GET['delchild'];
	$sql_delchild_prod = "DELETE FROM products WHERE catid = '$child_id'";
	$result = mysql_query($sql_delchild_prod) or die(mysql_error("An error occured while deleting product"));	
	
	$sql_delchild = "DELETE FROM categories WHERE catid = '$child_id'";
	$result = mysql_query($sql_delchild) or die(mysql_error("An error occured while deleting subcategory"));	
}

//delete parent category, its subcategories & all products in that categories
if(isset($_GET['delpar'])){
	$par_id = $_GET['delpar'];
	
	$sql_getchildcat = "SELECT catid FROM categories WHERE catparent = '$par_id'";
	$result = mysql_query($sql_getchildcat) or die(mysql_error()." An error occured while deleting product");
	
	while(list($child_id) = mysql_fetch_array($result)){
		$sql_delchild_prod = "DELETE FROM products WHERE catid = '$child_id'";
		$result2 = mysql_query($sql_delchild_prod) or die(mysql_error("An error occured while deleting product"));	
		
		$sql_delchild = "DELETE FROM categories WHERE catid = '$child_id'";
		$result2 = mysql_query($sql_delchild) or die(mysql_error("An error occured while deleting subcategory"));	
	}
	//delete parent
	$sql_delparent = "DELETE FROM categories WHERE catid = '$par_id'";
	$result = mysql_query($sql_delparent) or die(mysql_error("An error occured while deleting subcategory"));	
}

$sql = "SELECT catid, catparent, catname, catimg FROM categories ORDER BY catname ASC";
$result = mysql_query($sql) or die(mysql_error());
$par_names = array();
$par_imgs = array();
while(list($catid, $catparent, $catname, $catimg) = mysql_fetch_array($result)){
//print $catid." ".$catparent." ".$catname." ".$catimg."<br>";
	if($catparent==0){
		$par_names[$catid] = $catname;
		$par_imgs[$catid] = $catimg;
		if(!isset($child_names[$catid])){
			$child_names[$catid] = array();
			$child_imgs[$catid] = array();
		}
	}else{
		$child_names[$catparent][$catid] = $catname;
		$child_imgs[$catparent][$catid] = $catimg;
	}
}

//print_r($par_names);print"<br>";
//print_r($child_names);print"<br>";
?>
<?
include('top.php');
?>

<div id="edit_category" style="margin: 5px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">

<h3 class="style1">EDIT CATEGORY</h3>

<table border="0" width="940" cellspacing="0">
<tr><td>
	<form name="InputForm" action="edit_category.php" method="post" enctype="multipart/form-data">
	<div id="edit_category" style="width: 720px; overflow:auto; height:420px; border: 1px solid grey;">
	<table border="1" cellspacing="0" width="100%">
		<tr>
			<td width="50" height="50" class="cat_tbl">Image</td>
			<td height="50" class="cat_tbl">Category and Subcategory names</td>
			<td width="80" height="50" class="cat_tbl">Edit</td>
			<td width="80" height="50" class="cat_tbl">Delete</td>
		</tr>
		<?
		foreach($par_names as $parid => $par_name){
		?>
		<tr>
			<td align="center"><img src="../uploads/category-images/<?=$par_imgs[$parid]?>" width="30" height="30"></td>
			<td><div class="catparent"><?=$par_name?></div> </td>		
			<td align="center">
				<a href="edit_category.php?catid=<?=$parid;?>">
					<img src="edit-16x16.png" width="16" height="16" border="0"/>
				</a>
			</td>		
			<td align="center">
				<a href="list_category.php?delpar=<?=$parid;?>" onclick="return confirm('Warning! This will delete all subcategories and related products. \nDelete category?');">
					<img src="delete-16x16.png" width="16" height="16" border="0"/>
				</a>
			</td>
		</tr>
		<?
			foreach($child_names[$parid] as $child_id => $child_name){
			?>
		<tr>
			<td align="center"><img src="../uploads/category-images/<?=$child_imgs[$parid][$child_id]?>" width="30" height="30"></td>
			<td><div class="catchild" ><?=$child_name?></div></td>
			<td align="center">
				<a href="edit_category.php?catid=<?=$child_id;?>">
					<img src="edit-16x16.png" width="16" height="16" border="0"/>
				</a>
			</td>
			<td align="center">
				<a href="list_category.php?delchild=<?=$child_id;?>" onclick="return confirm('Warning! This will delete all related products. \nDelete subcategory?');">
					<img src="delete-16x16.png" width="16" height="16" border="0"/>
				</a>
			</td>			
		</tr>
			<?
			}
		}
		?>
	</table>
	</div>
	</form>
 </td>
  <td valign="top">
	<div style="width:170px; background-color: #FDBBBB; padding: 10px;  border: 1px solid black;">
	<h3>Attention!</h3>
	<p>
	Be careful while deleting categories. 
	When you delete a category all subcategories and products 
	associated with it will be deleted automatically. 
	
	</p>
	</div>
  </td>
  
</tr></table>
</div>

<?
include('bottom.php');
?>
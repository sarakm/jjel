<?php
include('authenticate.php');
include('../config.php');
include('../opendb.php');
?>
<?
include('top.php');
?>
<div id="add_category" style="width:900px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">
<form action="add_category_action.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="6" cellpadding="2">
    <tr>
      <td colspan="2"><h3 class="style1">ADD CATEGORY</h3></td>
	  <td rowspan="6" width="300">
	  <div style="width:300px; background-color: #FDBBBB; padding: 10px; border: 1px solid black;">
			<p>To create <b>main category: </b><br />
				<ul>
				<li>Enter category name </li>
				<li><b>Do not</b> select from category </li>
				<li>Click <b>Browse</b> button to upload image for the new category 
					Upload only <b>jpg, jpeg</b> images!
				</li>
				</ul>
			</p>
			<p>To create <b>subcategory: </b><br />
				<ul>
				<li>Enter subcategory name </li>
				<li>Select from category </li>
				<li>Click <b>Browse</b> button to upload image for the new subcategory 
					Upload only <b>jpg, jpeg</b> images!
				</li>
				</ul>
			</p>						
	   </div>
	  </td>
    </tr>
    <tr>
      <td width="150">Category name:</td>
      <td width=""><input name="catname" type="text"id="catname" /></td>
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
      <td><input name="img_file" type="file" class="tf" id="catimg" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn" name="addcat" id="addcat" value="Add category" /></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="2" height="80">&nbsp;</td>
    </tr>	
  </table>
</form>
</div>

<?
include('bottom.php');
?>
<?php

include('../config.php');
include('../opendb.php');

$id = $_GET['id'];

$sql = "SELECT catid, catname FROM categories WHERE catparent = '$id'";
$results = mysql_query($sql) or die(mysql_error());

echo "<select name=\"category\" id=\"category\" size=\"5\" style=\"width: 300px;\" onclick=\"document.getElementById('category').value=this.value\">\n";
while (list($catid, $catname) = mysql_fetch_array($results))
{
?>
	<option value="<?= $catid; ?>"><?= $catname; ?></option>	     
<?
}
echo "</select>\n";

include('../closedb.php');

?>

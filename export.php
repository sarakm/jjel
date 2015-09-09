<?
// Connect database
session_start();
include('config.php');
include('opendb.php');
include("top.php");


$sql=$_SESSION['sql'];
echo $sql;
$result = mysql_query($sql) or die(mysql_error());

$out = '';

// Get all fields names in table "name_list" in database "tutorial".
$fields =array("productid", "productname"," manufacturer","stockno","partno","datecode", "qty", "price", "flag");
$columns=mysql_num_fields($result);
echo $columns;
for ($i = 0; $i < $columns; $i++){
       $out .= mysql_field_name($result, $i)."\t";
}
$out.="\n";
while ($row = mysql_fetch_array($result))
 {
	for ($i = 0; $i < $columns; $i++)
	{
	$out .='"'.$row["$i"].'",';
	
	 }
	 $out.="\r";
	 $out.="\n";
}
//$out = implode("\r\n", $out);

// Open file export.csv.
$f = fopen ('export.xls','w');

// Put all values from $out to export.csv.
fputs($f, $out);
fclose($f);
echo" successful";


/*header('Content-type: application/xls');
header('Content-Disposition: attachment; filename="export.xls"');
readfile('export.csv');*/
?>
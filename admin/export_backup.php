<?php
// Connect database
session_start();
include('../config.php');
include('../opendb.php');


$sql=$_SESSION['sql'];
$result = mysql_query($sql) or die(mysql_error());
$out = '';
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
$filename="export".date("j l Y")."."."xls";
// Open file export.csv.
$f = fopen ($filename,'w');

// Put all values from $out to export.csv.
fputs($f, $out);
fclose($f);

$_SESSION['msg']="Data successfully exported";
include"list.php";


/*header('Content-type: application/xls');
header('Content-Disposition: attachment; filename="export.xls"');
readfile('export.csv');*/
?>
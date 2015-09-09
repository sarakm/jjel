<?php
// Connect database
session_start();
include('../config.php');
include('../opendb.php');


$sql=$_SESSION['sql'];
$result = mysql_query($sql) or die(mysql_error());
$out = '';
$columns=mysql_num_fields($result);
//echo $columns;
//for ($i = 0; $i < $columns; $i++){
//       $out .= mysql_field_name($res ult, $i)."\t";
//}
//$out.="\n";
//while ($row = mysql_fetch_array($result))
// {
//	for ($i = 0; $i < $columns; $i++)
//	{
//	$out .='"'.$row["$i"].'"      ';
//	
//	 }
//	 $out.="\r";
//	 $out.="\n";
//}


       $out .= "PRODUCTID"."\t";
	   $out .="PRODUCTNAME"."            \t";
	   $out .="STOCKNO".   "\t";
	   $out .="PARTNO"."  \t";
	   $out .="SKU"."  \t";
	   $out .="QUANTITY"."\t";
	   $out .="IMAGE" ."            \t";
	   $out .="CATEGORY"."         \t";
	   $out .="MANUFACTURER"."     \t";
	   $out .="FLAG"."   \t";
	   
$out.="\n";
while ($row = mysql_fetch_assoc($result))
 {
	
	$out .='"'.$row["productid"].'"      ';
	$out .='"'.$row["productname"].'"            ';
	$out .='"'.$row["stockno"].'"      '; 
	$out .='"'.$row["partno"].'"      ';
	$out .='"'.$row["sku"].'"      ';
	$out .='"'.$row["qty"].'"      ';
	$out .='"'.$row["img"].'"      ';
	$out .='"'.$row["catname"].'"      ';
	$out .='"'.$row["manufacturer"].'"      ';
	$out .='"'.$row["flag"].'"      ';
	
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
//header("Content-Type: application/vnd.ms-excel");
//header("Content-Disposition:filename=$filename");
include"list.php";
?>
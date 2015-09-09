<?php
session_start(); ob_start();

include('../config.php');
include('../opendb.php');
require_once 'Spreadsheet/Excel/Writer.php';
$workbook = new Spreadsheet_Excel_Writer();

$sql=$_SESSION['sql'];
//echo $sql;
$old="SELECT * ";
$new="select transactionid,userid,sender,sender_address,receiver_gender,receiver_firstname,receiver_middlename,receiver_lastname,receiver_address1,receiver_address2,receiver_city,receiver_province,receiver_country,receiver_phone1,receiver_email,receiver_pid,amount_to_receive,currency,agent,date_submitted,time,notes,booker ";
$s = str_replace($old,$new,$sql);
//echo $s;
$result = mysql_query($s) or die(mysql_error());	
	//first of all unset these variables
	unset($_SESSION['report_header']);
	unset($_SESSION['report_values']);
	//note that the header contain the three columns and its a array
$_SESSION['report_header']=array("productid", "productname","stockno","partno","sku","qty","img","catname", " manufacturer");
	
// now the excel data field should be two dimentational array with all column
 //loop through the needed cycle
$filename="jjorders_".date('dS M Y')."."."xls";

$worksheet =$workbook->addWorksheet();
$titleText = 'JJ ELECTRONICS PRODUCT LIST  ' . date('dS M Y');
$titleFormat =$workbook->addFormat();
 $dateFormat =$workbook->addFormat();
$titleFormat->setFontFamily('Helvetica'); 
$titleFormat->setBold();
$titleFormat->setColor('Black');
$titleFormat->setPattern(1);
$titleFormat->setFgColor("navy");
$titleFormat->setSize('20');


$worksheet->write(0,3,$titleText,$titleFormat);
$worksheet->write(0,4,'',$titleFormat);
$worksheet->write(0,5,'',$titleFormat);
$worksheet->write(0,6,'',$titleFormat);
$titleFormat->setSize('14');
$titleFormat->setFgColor('grey');
$titleFormat->setColor('white');
$worksheet->setColumn(0,0,15,0);
$worksheet->setColumn(1,1,40,0);
$worksheet->setColumn(2,2,12,0);
$worksheet->setColumn(3,3,20,0);
$worksheet->setColumn(6,6,30,0);
$worksheet->setColumn(7,7,35,0);
$worksheet->setColumn(8,8,12,0);
$worksheet->setColumn(9,9,12,0);

 
 $worksheet->writeRow (2,0,array("productid", "productname","stockno","partno","sku","qty","catname"," manufacturer","pickcode","datecode"),$titleFormat);

$i=4;
 while ($row = mysql_fetch_assoc($result))
 {    
      $worksheet->write($i,0, $row["productid"]);
      $worksheet->write($i,1, $row["productname"]);
      $worksheet->write($i,2, $row["stockno"]); 
      $worksheet->write($i,3, $row["partno"]);
      $worksheet->write($i,4, $row["sku"]);
      $worksheet->write($i,5, $row["qty"]);
      //$worksheet->write($i,6,  $row["img"]);
      $worksheet->write($i,6, $row["catname"]);
      $worksheet->write($i,7, $row["manufacturer"]);
      $worksheet->write($i,8, $row["pickcode"]);
	  $worksheet->writeString($i,9, $row["datecode"]);
	 
	  $i++;
}
//$titleFormat->setAlign("right");


/*$worksheet->write(0, 0, "Quarterly Profits for Dotcom.Com", $format_title);
// While we are at it, why not throw some more numbers around
$worksheet->write(1, 0, "Quarter", $format_bold);
$worksheet->write(1, 1, "Profit", $format_bold);
$worksheet->write(2, 0, "Q1");
$worksheet->write(2, 1, 0);
$worksheet->write(3, 0, "Q2");
$worksheet->write(3, 1, 0);
*/

$workbook->send($filename);

//print_file($filename);
$workbook->close();
?> 
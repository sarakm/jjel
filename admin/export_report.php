<?php
#### Roshan's very simple code to export data to excel   
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
session_start(); ob_start();
include('../config.php');
include('../opendb.php');
$sql=$_SESSION['sql'];
$result = mysql_query($sql) or die(mysql_error());	
	//first of all unset these variables
	unset($_SESSION['report_header']);
	unset($_SESSION['report_values']);
	//note that the header contain the three columns and its a array
$_SESSION['report_header']=array("productid", "productname","stockno","partno","sku","qty","img","catname", " manufacturer","flag");
	
// now the excel data field should be two dimentational array with all column
 //loop through the needed cycle
$i=0; 
 while ($row = mysql_fetch_assoc($result))
 {
	 $_SESSION['report_values'][$i][0]='"'.$row["productid"].'"      ';
	 $_SESSION['report_values'][$i][1]='"'.$row["productname"].'"            ';
	 $_SESSION['report_values'][$i][2]='"'.$row["stockno"].'"      '; 
	 $_SESSION['report_values'][$i][3]='"'.$row["partno"].'"      ';
	 $_SESSION['report_values'][$i][4]='"'.$row["sku"].'"      ';
	 $_SESSION['report_values'][$i][5]='"'.$row["qty"].'"      ';
	 $_SESSION['report_values'][$i][6]='"'.$row["img"].'"      ';
	 $_SESSION['report_values'][$i][7].='"'.$row["catname"].'"      ';
	 $_SESSION['report_values'][$i][8]='"'.$row["manufacturer"].'"      ';
	 $_SESSION['report_values'][$i][9]='"'.$row["flag"].'"      ';
	$i++;

  
  }
  
#### Roshan's very simple code to export data to excel   
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com


	//code to download the data of report in the excel format
	$fn="export".date("j l Y")."."."xls";

	include_once("class.export_excel.php");
	//create the instance of the exportexcel format
	$excel_obj=new ExportExcel("$fn");
	//setting the values of the headers and data of the excel file 
	//and these values comes from the other file which file shows the data
	$excel_obj->setHeadersAndValues($_SESSION['report_header'],$_SESSION['report_values']); 
	//now generate the excel file with the data and headers set
	$excel_obj->GenerateExcelFile();
	
/*	$a=$_SESSION['report_values'];
	$c=sizeof($a);
		
	for($j=0;$j<$c;$j++)
	{
	for($i=0;$i<10;$i++)
	{
	print_r($_SESSION['report_values'][$j][$i]." \t ");
	}
	print_r("\n");
	}
	*/

	include('../closedb.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<select name="country" id="country" value="<?=$selected_country;?>" >Choose the Country
<?php 
$q="select country from anp_rates";
$result = mysql_query($q) or die(mysql_error());
      $numrows = mysql_num_rows($result);
	if($numrows >0)
	{
	while($row=mysql_fetch_array($result))
	{  $selected_country=$row[0];
	   echo"<option id='$row[0]' value='$row[0]'>$row[0]</option>";
	 }
	 }
	 </select>






</select>






</body>
</html>

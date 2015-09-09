<?
session_start();
include('../config.php');
include('../opendb.php');
if(isset($_POST['login'])){
	//print_r($_POST);print"<br>";
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//check sql
	//if matches
	//create $_SESSION['username']	
	$sql= "SELECT * FROM login WHERE username='$username' AND password='$password'";
	$result=mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)>0){
		$_SESSION['username'] = $username;
		header("Location: index.php");		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin section</title>
</head>

<body style="text-align: center; width: 800px;margin: 0 auto;">
<h2 align="center">J.J. Electronics Components Administration Panel</h2>
<hr>

<div style="border: 0px solid red; text-align: center; margin: 0 280px; padding-top: 80px;">

	<h2 align="left">Login</h2>
	<div style="border: 0px solid green; text-align: left; margin-top: 20px;">
		<form method = "POST" action = "login.php">
		<p>User name: <input type="text" name="username" style="width:150px" /></p>
		<p>Password: &nbsp;<input type = "password" name = "password" style="width:150px"/></p>
		<p style="display: block; width:220px; text-align: right;"><input type = "submit" name = "login" value = "Login" /></p>		
		</form>
	</div>
	
</div>
</body>
</html>

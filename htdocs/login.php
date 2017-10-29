<?php
session_start();
include'usertable.php';
if(isset($_POST['submit']) && $_POST['submit']=='Login'){
$username=(isset($_POST['username']))?trim($_POST['username']):'';
$password=(isset($_POST['password']))?$_POST['password']:'';
$query='SELECT
       username,password
	   FROM
	   users_details
	   WHERE
	   username="'.$username.'"AND password="'.$password.'"';
$result=mysql_query($query,$db) or die(mysql_error());
if(mysql_num_rows($result) >0){
$_SESSION['username']=$username;
header('Refresh:0.0001;URL=main.php');
}
else{
header('Refresh:0.0001;URL=login.php');
}	   
}
else{
?>
<html>
<head>
<title>
LOGIN!
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<table width="100%" height="100%">
<tr>
<td rowspan="2" width="25%">
</td>
<td width="50%">
</td>
<td>
</td>
</tr>
<tr>
<td valign="top" align="middle">
<form method="post" action="login.php">
<table  cellspacing="0px">
<tr>
<td align="right">User Name:</td><td><input type="text" name="username" /></td>
</tr>
<td align="right">Password:</td><td><input type="password" name="password" /></td>
<tr><td colspan=""2></td><tr>
<tr>
<td colspan="2" align="middle">
<input type="submit" name="submit" value="Login" /></td>
</tr>
<tr>
<td colspan="2" style="color:red">User Name/Password are Invalid.Or You are not a member yet.<a href="customer zone.php">CLICK HERE</a> to be a member. </td>
</tr>
<tr>
<td colspan="2" align="right"><small><a href="forgot.php">Forgot User Name/Password?</a></small></td>
</tr>
</form>
</table>
</td>
<td>
</td>
</tr>
</table>
</body>
</html>
<?php
}
?>
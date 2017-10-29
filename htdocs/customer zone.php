<html>
<head><title>Customer Zone</title>
<link rel="stylesheet" type="text/css" href="index.css" />
<script type="text/javascript" >
function showplace(){
var place=document.forms[1].Place.value;
alert("you have choosed :"+place);
}
</script>
</head>
<body style="background-image: url(image/background.jpg)">

<p style="font-size:40px">This is to provide more comfort to our customers.You can be a member of our Agency here!</p>
<hr/>
<form action="customer zone.php" method="post">
<table >
<tr><td style="color:blue;font-size:35px">Login here!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td> User Name: </td>
<td style="padding-right:60px"> <input type="text" name="username" maxlength="20" size="20" /> </td>
<td> Password: </td>
<td> <input type="password" name="password" maxlength="20" size="20" /> </td>
</tr> <tr>
<td colspan="5" align="middle">
<input type="submit" name="submit" value="Login" /></td>
</tr>
</table>
</form>
<?php
session_start();
include'usertable.php';
include'imagetable.php';
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
else if(isset($_POST['submit']) && $_POST['submit']=='signup'){
$firstname=(isset($_POST['FirstName']))?trim($_POST['FirstName']):'';
$lastname=(isset($_POST['LastName']))?trim($_POST['LastName']):'';
$username=(isset($_POST['username']))?trim($_POST['username']):'';
$password=(isset($_POST['password']))?trim($_POST['password']):'';
$password1=(isset($_POST['password1']))?trim($_POST['password1']):'';
$emailid=(isset($_POST['Email_ID']))?trim($_POST['Email_ID']):'';
$gender=(isset($_POST['Gender']))?trim($_POST['Gender']):'';
$place=(isset($_POST['Place']))?trim($_POST['Place']):'';
$errors=array();
$query='SELECT
       username,password
	   FROM
	   users_details
	   WHERE
	   username="'.$username.'"AND password="'.$password.'"';
$result=mysql_query($query,$db) or die(mysql_error());
if(mysql_num_rows($result) >0){$errors[]="This User Name is already registered.Try another!";}
if($password!=$password1){$errors[]="Passwords doesn\'t match.";}
if(empty($firstname)){$errors[]="First Name is required.";}
if(empty($lastname)){$errors[]="Last Name is required.";}
if(empty($username)){$errors[]="username is required.";}
if(empty($emailid)){$errors[]="Email ID is required.";}
if(empty($gender)){$errors[]="Gender is required.";}
if(empty($place)){$errors[]="Place is required.";}
if(count($errors)>0){
echo'<p>';
echo'Please fix the following errors.';
echo'<ul>';
foreach($errors as $error){
echo'<li>';
echo$error;
echo'</li>';
}
echo'</ul>';
echo'</p>';
}
else{
$_SESSION['username']= $username;
$query='INSERT INTO users_details
       (user_id,Name,Last_Name,privilege,username,password,email_id,gender,place)
	   VALUES
	   (NULL,"'.$firstname.'","'.$lastname.'",1,"'.$username.'","'.$password.'","'.$emailid.'","'.$gender.'","'.$place.'")';
mysql_query($query,$db) or die (mysql_error());
$query = 'INSERT INTO image_detail
        (username,iscurrent,imagename)
		VALUES
		("'.$_SESSION['username'].'",1,"1.jpg")';
mysql_query($query,$db)or die(mysql_error($db));
$query = 'INSERT INTO cover_image_detail
        (username,iscurrent,imagename)
		VALUES
		("'.$_SESSION['username'].'",1,"c.1.jpg")';
mysql_query($query,$db)or die(mysql_error($db));
header('Refresh:1;URL=main.php');	   
}
}
else{
?>
<hr />
<table cellspacing="20px">
<form method="post" action="customer zone.php">
<tr><td colspan="4" style="color:blue;font-size:35px">Sign Up Here!</td></tr>
<tr id="checkname">
<td>First Name:</td>
<td><input type="text" name="FirstName"  size="20px" /></td>
<td align="right">Last Name:</td>
<td><input type="text" name="LastName"  size="20px" /></td>
</tr>
<tr><td colspan="2" align="right">User Name:</td>
<td><input type="text" name="username" /></td>
</tr>
<tr><td colspan="2" align="right">Password:</td>
<td><input type="password" name="password" /></td>
</tr>
<tr><td colspan="2" align="right">Confirm-Password:</td>
<td><input type="password" name="password1" /></td>
</tr>
<tr>
<td colspan="2" align="right">Email-ID:</td>
<td colspan="2"><input type="text" name="Email_ID" size="20px" value="Email-ID" size="20px" /></td>
</tr>
<tr>
<td colspan="2" align="right">Gender:</td>
<td colspan="2"><input type="radio" name="Gender" size="20px" value="Male" />Male<br />
<input type="radio" name="Gender" size="20px" value="FeMale" />Female</td></tr>
<tr><td colspan="2" align="right">Place:</td>
<td colspan="2"><select name="Place" size="1px" onchange="showplace()">
<option>Select Place</option>
<optgroup label="Rajasthan">
<option>Alwar</option>
<option>Ajmer</option>
<option>Bharatpur</option>
<option>Bikaner</option>
<option>Bundi</option>
<option>Chittorgarh</option>
<option>Jaipur</option>
<option>Jaishalmer</option>
<option>Jhalawar</option>
<option>Jhunjhunu</option>
<option>Jodhpur</option>
<option>Kota</option>
<option>Shri Ganganagar</option>
<option>Sikar</option>
<option>Udaipur</option>
</optgroup>
<optgroup label="Uttar Pradesh">
<option>Agra</option>
<option>Allahabad</option>
<option>Mathura</option>
<option>Lucknow</option>
<option>Kanpur</option>
<option>greater-Noida</option>
</optgroup>
<optgroup label="Maharashtra">
<option>Bombay-East</option>
<option>Bombay-west</option>
<option>Nagpur</option>
<option>Malegawon</option>
</optgroup>
</select>
</td>
</tr>
<tr> 
<td colspan="2"></td>
<td><input type="submit" name="submit" value="signup" size="20px" onclick="details()" />&nbsp;&nbsp;<input type="Reset" value="Reset" size="20px" /></td>
<td></td> 
</tr>
</form>
</table>
<hr />
<p>copyright &copy;1996 Sachin Car Agency&trade;<br />
All Rights Are Reserved.No Material May Be Reproduced Without Written Permission.</p>
</body>
</html>
<?php
}
?>
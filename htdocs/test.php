<?php
if(isset($_POST['submit'])){
$username=(isset($_POST['username']))?trim($_POST['username']):'';
$password=(isset($_POST['password']))?$_POST['password']:'';
if(!empty($username)&& !empty($password)&& $username=='Sachin' && $password=='9530445348'){
header('Refresh:5;URL=customer zone.php');
}
else{
echo'<p>';
echo'Please Enter Valid User Name And Password';

}
}
else{
?>
<html>
<head>
<title> Login </title>
</head >
<body>
<form action="test.php" method="post">
<table>
<tr>
<td> Username: </td>
<td> <input type="text" name="username" maxlength="20" size="20" /> </td>
</tr> <tr>
<td> Password: </td>
<td> <input type="password" name="password" maxlength="20" size="20" /> </td>
</tr> <tr>
<td> </td>
<td>
<input type="submit" name="submit" value="Login" />
</tr>
</table>
</form>
</body>
</html>
<?php
}
?>
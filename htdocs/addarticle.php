<?php
session_start();
?>
<html>
<head>
<title>
Compose Article
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<h2 style="color:blue"><i>Compose Your Article Here.This Will Be Published Only After Administrator's Verification.</i></h2>
<form method="post" action="adminpanel.php">
<table height="80%">
<tr>
<td>Titile:</td><td><input type="text" name="title" maxlength="30" /></td>
</tr>
<tr>
<td valign="0px">Text:</td><td><textarea name="text" rows="30" cols="120"></textarea></td>
</tr>
<tr><td></td><td><input type="submit" name="submit" value="Send To Administrator" /></td></tr>
</table>
</form>
</body>
</html>
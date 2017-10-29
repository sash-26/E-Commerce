<?php
session_start();
include'usertable.php';
include'imagetable.php';
include'cmstable.php';
$query='SELECT* FROM users_details
        WHERE
		username="'.$_SESSION['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);
$auth_name=$Name.$Last_Name;
if(isset($_GET['userid'])){
$query='SELECT* FROM users_details
        WHERE
		user_id="'.$_GET['userid'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);
$query='DELETE FROM users_details
        WHERE
		user_id='.$_GET['userid'];
mysql_query($query,$db) or die(mysql_error());
echo'This User Has Been Deleted.';
$query='DELETE FROM image_detail
        WHERE
		username="'.$username.'"';
mysql_query($query,$db) or die(mysql_error());
echo'This User\'s Images Has Been Deleted.';
}
if(isset($_POST['submit']) && $_POST['submit']=='Change Privilege'){
$query='UPDATE users_details
        SET
		privilege='.$_POST['changeprivilege'].'
		WHERE
		username="'.$_GET['username'].'"';
mysql_query($query,$db) or die(mysql_error());
echo'Privilege Has Been Changed.';
header('Refresh:0.0001;URL=main.php');
}
if(isset($_GET['username'])){
$query='SELECT* FROM users_details
        WHERE
		username="'.$_GET['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'Administrator';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
echo'<h2 style="color:blue"><i>You Are The Administrator Of This Site.You Have Full Rights Of This Site.</i></h2>';
echo'<form method="post" action="adminpanel.php?username='.$_GET['username'].'">';
echo'<table border="1" width="100%">';
echo'<tr>';
echo'<td>';
echo'User-ID:';
echo'</td>';
echo'<td>';
echo $user_id;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'User-Name:';
echo'</td>';
echo'<td>';
echo $username;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'First-Name:';
echo'</td>';
echo'<td>';
echo $Name;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Last-Name:';
echo'</td>';
echo'<td>';
echo $Last_Name;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Current-Privilege:';
echo'</td>';
echo'<td>';
echo $privilege;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Password:';
echo'</td>';
echo'<td>';
echo $password;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Email-ID:';
echo'</td>';
echo'<td>';
echo$email_id;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Gender:';
echo'</td>';
echo'<td>';
echo$gender;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Place:';
echo'</td>';
echo'<td>';
echo$place;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Updated-Privilege';
echo'</td>';
echo'<td>';
echo'<input type="text" name="changeprivilege" />';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td colspan="2">';
echo'<input type="submit" name="submit" value="Change Privilege" />';
echo'</td>';
echo'</tr>';
echo'</table>';
echo'</form>';
echo'</body>';
echo'</html>';
}
if(isset($_POST['submit']) && $_POST['submit']=='Send To Administrator'){
$query='INSERT INTO cms_articles
        (username,Name,submit_date,ispublished,title,article_text)
		VALUES
		("'.$_SESSION['username'].'","'.$auth_name.'","'.date('Y-m-d H:i:s').'",0,"'.$_POST['title'].'","'.$_POST['text'].'")';
mysql_query($query,$db) or die (mysql_error());	
echo'article has been send.wait for administrator\'s verification. ';
die();	
}
if(isset($_POST['submit']) && $_POST['submit']=='Delete'){
$query='DELETE FROM cms_articles
        WHERE
		article_id='.$_POST['article_id'];
mysql_query($query,$db) or die(mysql_error());
echo'This Article Has Been Deleted.';
header('Refresh:0.0001;URL=main.php');
}
if(isset($_POST['submit']) && $_POST['submit']=='Publish'){
$query='UPDATE cms_articles
        SET
		ispublished=1,
		publish_date="'.date('Y-m-d H:i:s').'"
        WHERE
		article_id='.$_POST['article_id'];
mysql_query($query,$db) or die(mysql_error());
echo'This Article Has Been Published.';
header('Refresh:0.0001;URL=main.php');
}
if(isset($_GET['imageid'])){
$query='DELETE FROM image_detail
        WHERE
		image_id='.$_GET['imageid'];
$result=mysql_query($query,$db) or die(mysql_error());
echo'This Image Has Been Deleted.';
header('Refresh:0.0001;URL=adminpanel.php');
}
if(isset($_POST['submit']) && $_POST['submit']=='Uploaded Photos'){
$query='SELECT imagename,username,image_id
       FROM image_detail
	   ORDER BY 
	   image_id DESC';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'Administrator';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
echo'<h2 style="color:blue"><i>You Are The Administrator Of This Site.You Have Full Rights Of This Site.</i></h2>';
echo'<table border="1" width="100%">';
$odd=True;
while($row=mysql_fetch_array($result)){
extract($row);
$odd=!$odd;
if($odd==True){
echo'<tr class="odd_row">';
}
else{
echo'<tr class="even_row">';
}
echo'<td>';
echo'Username:';
echo $username;
echo'</td>';
echo'<td>';
echo'Image-ID:';
echo $image_id;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td colspan="2">';
echo'<img src="upload_image/'.$imagename.'" height="600px" />';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td colspan="2">';
echo'<a href="adminpanel.php?imageid='.$image_id.'"><input type="button" value="Delete Image" /></a>';
echo'</td>';
echo'</tr>';
}
echo'</body>';
echo'</html>';	
}
if(isset($_POST['submit']) && $_POST['submit']=='Published Articles'){
$query='SELECT  article_id,username,Name,publish_date,submit_date,title,article_text
        FROM cms_articles
        WHERE
		ispublished=1';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'Administrator';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
echo'<h2 style="color:blue"><i>You Are The Administrator Of This Site.You Have Full Rights Of This Site.</i></h2>';
echo'<h2 align="middle">';
echo'Published Articles';
echo'</h2>';
echo'<hr />';
echo'<h4>Total Published Articles:'.$num.'</h4>';
if($num>0){
while($row=mysql_fetch_array($result)){
extract($row);
echo'<h4 align="left">Article-ID:'.$article_id.'</h4>';
echo'<h4 align="left">username:'.$username.'</h4>';
echo'<h3>';
echo'By-'.$Name;
echo'</h3>';
echo'<h3>';
echo'<i>Published On-</i>'.$publish_date;
echo'</h3>';
echo'<h2>';
echo'Title:'.$title;
echo'</h2>';
echo'<p>';
echo$article_text;
echo'</p>';
echo'<a href="main.php?article_id='.$article_id.'"><input type="button" name="retract" value="Retract Article" /></a>';
}
}
else {
echo'<h2>';
echo'There Is Not Any Published Article.';
echo'</h2>';}
echo'</body>';
echo'</html>';	
}
if(isset($_POST['submit']) && $_POST['submit']=='Pending Articles'){
$query='SELECT  article_id,username,Name,submit_date,title,article_text
        FROM cms_articles
        WHERE
		ispublished=0';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'Administrator';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
echo'<h2 style="color:blue"><i>You Are The Administrator Of This Site.You Have Full Rights Of This Site.</i></h2>';
echo'<h2 align="middle">';
echo'Pending Articles';
echo'</h2>';
echo'<hr />';
echo'<h4>Total Pending Articles:'.$num.'</h4>';
if($num>0){
while($row=mysql_fetch_array($result)){
extract($row);
echo'<h4 align="left">Article-ID:'.$article_id.'</h4>';
echo'<h3>';
echo'By-'.$Name;
echo'</h3>';
echo'<h3>';
echo'<i>Submited On-</i>'.$submit_date;
echo'</h3>';
echo'<h2>';
echo'Title:'.$title;
echo'</h2>';
echo'<p>';
echo$article_text;
echo'</p>';
echo'<form method="post" action="adminpanel.php">';
echo'<input type="submit" name="submit" value="Publish" />';
echo'<input type="hidden" name="article_id" value='.$article_id.' />';
echo'<input type="submit" name="submit" value="Delete" />';
echo'</form>';
}
}
else{
echo'<h2>';
echo'There Is Not Any Pending Article.';
echo'</h2>';}
echo'</body>';
echo'</html>';		
}
if(isset($_POST['submit']) && $_POST['submit']=='Show Users'){
$query='SELECT* 
        FROM users_details';
$result=mysql_query($query,$db) or die(mysql_error());
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'Administrator';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
echo'<h2 style="color:blue"><i>You Are The Administrator Of This Site.You Have Full Rights Of This Site.</i></h2>';
echo'<table border="1" width="100%">';
$odd=True;
while($row=mysql_fetch_array($result)){
extract($row);
$odd=!$odd;
if($odd==True){
echo'<tr class="odd_row">';
}
else{
echo'<tr class="even_row">';
}
echo'<td>';
echo'User-ID:';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo $user_id;
echo'</td>';
echo'<td>';
echo'User-Name:';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo'&nbsp;';
echo $username;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'First-Name:';
echo'</td>';
echo'<td>';
echo $Name;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Last-Name:';
echo'</td>';
echo'<td colspan="3">';
echo $Last_Name;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Privilege:';
echo'</td>';
echo'<td>';
echo $privilege;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Password:';
echo'</td>';
echo'<td>';
echo $password;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Email-ID:';
echo'</td>';
echo'<td>';
echo$email_id;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Gender:';
echo'</td>';
echo'<td>';
echo$gender;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'Place:';
echo'</td>';
echo'<td>';
echo$place;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>';
echo'<a href="adminpanel.php?username='.$username.'"><input type="button" name="changeprivilege" value="Change Privilege" /></a>';
echo'</td>';
echo'<td>';
echo'<a href="adminpanel.php?userid='.$user_id.'"><input type="button" name="deleteuser" value="Delete User" /></a>';
echo'</td>';
echo'</tr>';
}
echo'</table>';
echo'</body>';
echo'</html>';
}
?>
<html>
<head>
<title>
Administrator
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<h2 style="color:blue"><i>You Are The Administrator Of This Site.You Have Full Rights Of This Site.</i></h2>
<form method="post" action="adminpanel.php">
<input type="submit" name="submit" value="Show Users" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="Pending Articles" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="Published Articles" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="Uploaded Photos" />
</form>
</body>
</html>
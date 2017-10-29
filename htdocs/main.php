<?php
session_start();
putenv('GDFONTPATH='.'C:/Windows/Fonts');
$font='Arial';
include'imagetable.php';
include'usertable.php';
include'coverimagetable.php';
if(isset($_GET['article_id'])){
$query='UPDATE cms_articles
        SET
		ispublished=0,
		publish_date="0000-00-00 00:00:00"
        WHERE
		article_id='.$_GET['article_id'];
mysql_query($query,$db) or die(mysql_error());
echo'This Article Has Been Retracted.';
die();
}
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="index.css" />
<title>
MAIN
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<table width="100%" height="100%" border="1" cellspacing="0px">
<tr height="40%">
<td rowspan="2" width="25%" valign="top">
<ul style="list-style-type:none">
<li><?php
echo'HELLO         -   '.$_SESSION['username'];
?></li>
<li><a href="uploadimage.php">My Profile</a></li>
<li>
<?php
if(isset($_POST['submit']) && $_POST['submit']=='Add Effect'){
$image_id=(isset($_POST['image_id']))?$_POST['image_id']:die('not found');
header('Refresh:0.0001;URL=covereffect.php?image_id='.$image_id);
}
function trim_article($articletext){
$maxlen=300;
$tail='...';
$taillen=strlen($tail);
if(strlen($articletext)>$maxlen){
$tmp_text=substr($articletext,0,$maxlen-$taillen);
if(substr($tmp_text,$maxlen-$taillen,1)==' '){
$text=$tmp_text;}
else{
$pos=strrpos($tmp_text,' ');
$text=substr($tmp_text,0,$pos);
}
$articletext=$text.$tail;
}
return $articletext;}
if(isset($_GET['imagename'])){
$query='UPDATE image_detail
        SET
		iscurrent=0
		WHERE
		iscurrent=1 AND username="'.$_SESSION['username'].'"';
mysql_query($query,$db) or die(mysql_error());	
$query='UPDATE image_detail
        SET
		iscurrent=1
		WHERE
		imagename="'.$_GET['imagename'].'"AND username="'.$_SESSION['username'].'"';		
mysql_query($query,$db) 	or die(mysql_error());
$query='SELECT imagename 
       FROM image_detail
       WHERE
       username="'.$_SESSION['username'].'"AND iscurrent=1';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
?>
<img src="upload_image/<?php echo$imagename;?>" height="200px" width="200px" />
</li>
<li><a href="account.php">My Account</a></li>
<li><a>My Status</a></li>
</ul>
</td>
<td width="50%" style="background-color:blue">
<?php
if(isset($_POST['submit']) && $_POST['submit']=='Upload Symbolic Photo'){
$query='UPDATE cover_image_detail
        SET
		iscurrent=0
		WHERE
		iscurrent=1 AND username="'.$_SESSION['username'].'"';
mysql_query($query,$db) or die(mysql_error());
$dir='C:/xampp/htdocs/upload_image';
if($_FILES['uploadfile']['error']!=UPLOAD_ERR_OK){
switch($_FILES['uploadfile']['error']){
case UPLOAD_ERR_INI_SIZE:
die('Your File\'s Size Has Exceeds The upload_max_filesize directive in php.ini.');
break;
case UPLOAD_ERR_FORM_SIZE:
die('Your Files\'s Size Has Exceeds The Limit Specified In Form.');
break;
case UPLOAD_ERR_PARTIAL:
die('The File IS Only Partially Uploaded.');
break;
case UPLOAD_ERR_NO_FILE:
die('There Is No File detected.');
break;
case UPLOAD_ERR_NO_TMP_DIR:
die('Temporary Directive To Store File Is Missing.');
break;
default:
die('There Is Anything Wrong In Uploading The File');
}
}
list($width,$height,$type,$attr)=getimagesize($_FILES['uploadfile']['tmp_name']);
switch($type){
case IMAGETYPE_JPEG:
$image=imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
break;
case IMAGETYPE_PNG:
$image=imagecreatefrompng($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
break;
case IMAGETYPE_GIF:
$image=imagecreatefromgif($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
break;
default:
die('File Is Not In Supported Format.');
}
$query='INSERT INTO cover_image_detail
        (username,iscurrent)
		VALUES
		("'.$_SESSION['username'].'",1)';
$result=mysql_query($query,$db) or die(mysql_error());
$last_id=mysql_insert_id($db);
$imagenam=$last_id.'.jpg';
$query='UPDATE cover_image_detail
       SET
	   imagename="'.$imagenam.'"
	   WHERE
	   image_id='.$last_id;
mysql_query($query,$db) or die(mysql_error());
imagejpeg($image,$dir.'/c.'.$imagenam);
imagedestroy($image);
echo'<image src="upload_image/c.'.$imagenam.'" height="400px" width="800px" />';
echo'<form method"post" action="main.php" enctype="multipart/form-data">';
echo'<input type="submit" name="submit" value="Add Effect" />';
echo'<input type="hidden" name="MAX_FILE_SIZE" value="2MB"/>';
echo'<input type="hidden" name="image_id" value="'.$last_id.'"/>';
echo'</form>';
}
else{
$query='SELECT imagename,image_id 
       FROM cover_image_detail
       WHERE
       username="'.$_SESSION['username'].'"AND iscurrent=1';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
echo'<img src="upload_image/c.'.$imagename.'" height="400px" width="800px" style="float:top;margin-bottom:20px;margin-left:0px" />';
echo'<form method="post" action="main.php" enctype="multipart/form-data">';
echo'<input type="file" name="uploadfile" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<input type="submit" name="submit" value="Upload Symbolic Photo" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<input type="submit" name="submit" value="Add Effect" />';
echo'<input type="hidden" name="image_id" value="'.$image_id.'"/>';
echo'</form>';
}
?>
</td>
<td valign="0px">
<?php
$query='SELECT* FROM users_details
        WHERE
		username="'.$_SESSION['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);
if($privilege>1){
echo'<ul style="list-style-type:none">';
echo'<li>';
echo'<a href="myarticle.php">My Articles</a>';
echo'</li>';
echo'<li>';
echo'<a href="addarticle.php">Add Article</a>';
echo'</li>';
echo'<li>';
echo'<a href="logout.php">LogOut</a>';
echo'</li>';
if($privilege>2){
echo'<li>';
echo'<a href="adminpanel.php">Administrator</a>';
echo'</li>';
}
echo'</ul>';
}
else{
echo'<img src="image/lamborghini.jpg" height="300px" width="350px" />';
}		
?>
</td>
</tr>
<tr>
<td valign="top">
<?php
$query='SELECT  article_id,username,Name,publish_date,submit_date,title,article_text
        FROM cms_articles
        WHERE
		ispublished=1';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
echo'<h2 align="middle">';
echo'Published Articles';
echo'</h2>';
echo'<hr />';
echo'<h4>Total Published Article:'.$num.'</h4>';
if($num>0){
while($row=mysql_fetch_array($result)){
extract($row);
$article_text=trim_article($article_text);
echo'<h4 align="left">Article-ID:'.$article_id.'</h4>';
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
echo'<a href="view_article.php?articleid='.$article_id.'"><b>Read More</b></a>';
echo'</p>';
if($privilege>2){
echo'<a href="main.php?article_id='.$article_id.'"><input type="button" name="retract" value="Retract Article" /></a>';
}
}
}
else {
echo'<h2>';
echo'There Is Not Any Published Article.';
echo'</h2>';}
?>
</td>
<td>
</td>
</tr>
</table>
</body>
</html>
<?php } else{
$query='SELECT imagename 
       FROM image_detail
       WHERE
       username="'.$_SESSION['username'].'"AND iscurrent=1';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
?>
<img src="upload_image/<?php echo$imagename;?>" height="200px" width="200px" />
</li>
<li><a href="account.php">My Account</a></li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</td>
<td width="50%" style="background-color:blue">
<?php
if(isset($_POST['submit']) && $_POST['submit']=='Upload Symbolic Photo'){
$query='UPDATE cover_image_detail
        SET
		iscurrent=0
		WHERE
		iscurrent=1 AND username="'.$_SESSION['username'].'"';
mysql_query($query,$db) or die(mysql_error());
$dir='C:/xampp/htdocs/upload_image';
if($_FILES['uploadfile']['error']!=UPLOAD_ERR_OK){
switch($_FILES['uploadfile']['error']){
case UPLOAD_ERR_INI_SIZE:
die('Your File\'s Size Has Exceeds The upload_max_filesize directive in php.ini.');
break;
case UPLOAD_ERR_FORM_SIZE:
die('Your Files\'s Size Has Exceeds The Limit Specified In Form.');
break;
case UPLOAD_ERR_PARTIAL:
die('The File IS Only Partially Uploaded.');
break;
case UPLOAD_ERR_NO_FILE:
die('There Is No File detected.');
break;
case UPLOAD_ERR_NO_TMP_DIR:
die('Temporary Directive To Store File Is Missing.');
break;
default:
die('There Is Anything Wrong In Uploading The File');
}
}
list($width,$height,$type,$attr)=getimagesize($_FILES['uploadfile']['tmp_name']);
switch($type){
case IMAGETYPE_JPEG:
$image=imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
break;
case IMAGETYPE_PNG:
$image=imagecreatefrompng($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
break;
case IMAGETYPE_GIF:
$image=imagecreatefromgif($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
break;
default:
die('File Is Not In Supported Format.');
}
$query='INSERT INTO cover_image_detail
        (username,iscurrent)
		VALUES
		("'.$_SESSION['username'].'",1)';
$result=mysql_query($query,$db) or die(mysql_error());
$last_id=mysql_insert_id($db);
$imagenam=$last_id.'.jpg';
$query='UPDATE cover_image_detail
       SET
	   imagename="'.$imagenam.'"
	   WHERE
	   image_id='.$last_id;
mysql_query($query,$db) or die(mysql_error());
imagejpeg($image,$dir.'/c.'.$imagenam);
echo'<image src="upload_image/c.'.$imagenam.'" height="400px" width="800px" />';
echo'<form method"post" action="main.php" enctype="multipart/form-data">';
echo'<input type="submit" name="submit" value="Add Effect" />';
echo'<input type="hidden" name="image_id" value="'.$last_id.'"/>';
echo'</form>';
}
else{
$query='SELECT imagename,image_id
       FROM cover_image_detail
       WHERE
       username="'.$_SESSION['username'].'"AND iscurrent=1';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
echo'<img src="upload_image/c.'.$imagename.'" height="400px" width="800px" style="float:top;margin-bottom:20px;margin-left:0px" />';
echo'<form method="post" action="main.php" enctype="multipart/form-data">';
echo'<input type="file" name="uploadfile" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<input type="submit" name="submit" value="Upload Symbolic Photo" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<input type="submit" name="submit" value="Add Effect" />';
echo'<input type="hidden" name="image_id" value="'.$image_id.'"/>';
echo'<input type="hidden" name="MAX_FILE_SIZE" value="2MB"/>';

}
?>
</td>
<td valign="0px">
<?php
$query='SELECT* FROM users_details
        WHERE
		username="'.$_SESSION['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_array($result);
extract($row);
if($privilege>1){
echo'<ul style="list-style-type:none">';
echo'<li>';
echo'<a href="myarticle.php">My Articles</a>';
echo'</li>';
echo'<li>';
echo'<a href="addarticle.php">Add Article</a>';
echo'</li>';
echo'<li>';
echo'<a href="logout.php">LogOut</a>';
echo'</li>';
if($privilege>2){
echo'<li>';
echo'<a href="adminpanel.php">Administrator</a>';
echo'</li>';
}
echo'</ul>';
}
else{
echo'<img src="image/lamborghini.jpg" height="300px" width="350px" />';
}		
?>
</td>
</tr>
<tr>
<td valign="top">
<?php
$query='SELECT  article_id,username,Name,submit_date,publish_date,title,article_text
        FROM cms_articles
        WHERE
		ispublished=1';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
echo'<h2 align="middle">';
echo'Published Articles';
echo'</h2>';
echo'<hr />';
echo'<h4>Total Published Article:'.$num.'</h4>';
if($num>0){
while($row=mysql_fetch_array($result)){
extract($row);
$article_text=trim_article($article_text);
echo'<h4 align="left">Article-ID:'.$article_id.'</h4>';
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
echo'<a href="view_article.php?articleid='.$article_id.'"><b>Read More</b></a>';
echo'</p>';
if($privilege>2){
echo'<a href="main.php?article_id='.$article_id.'"><input type="button" name="retract" value="Retract Article" /></a>';
}
}
}
else {
echo'<h2>';
echo'There Is Not Any Published Article.';
echo'</h2>';}
?>
</td>
<td>
</td>
</tr>
</table>
</body>
</html>
<?php } ?>
<?php
session_start();
include'imagetable.php';
?>
<?php
$dir='C:/xampp/htdocs/upload_image';
if(isset($_POST['submit']) && $_POST['submit']=='upload'){
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
$ext='.jpeg';
break;
case IMAGETYPE_PNG:
$image=imagecreatefrompng($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
$ext='.png';
break;
case IMAGETYPE_GIF:
$image=imagecreatefromgif($_FILES['uploadfile']['tmp_name']) or die('This File Is Not In Supported Format.');
$ext='.gif';
break;
default:
die('File Is Not In Supported Format.');
}
$query='INSERT INTO image_detail
       (username,iscurrent)
		VALUES
		("'.$_SESSION['username'].'",0)';
mysql_query($query,$db) or die(mysql_error());
$last_id=mysql_insert_id($db);
$imagenam=$last_id.$ext;
$query='UPDATE image_detail
       SET
	   imagename="'.$imagenam.'"
	   WHERE
	   image_id='.$last_id;
mysql_query($query,$db) or die(mysql_error());
switch($type){
case IMAGETYPE_JPEG:
imagejpeg($image,$dir.'/'.$imagenam);
break;
case IMAGETYPE_PNG:
imagepng($image,$dir.'/'.$imagenam);
break;
case IMAGETYPE_GIF:
imagegif($image,$dir.'/'.$imagenam);
break;
}
imagedestroy($image);
?>
<html>
<head>
<title>
MAIN
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<table width="100%" height="100%" border="1">
<tr height="60%">
<td rowspan="2" width="25%" valign="top">
<ul style="list-style-type:none">
<li><?php
echo'HELLO         -   '.$_SESSION['username'];
$query='SELECT imagename 
       FROM image_detail
       WHERE
       username="'.$_SESSION['username'].'"AND iscurrent=1';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
?></li>
<li>
<img src="upload_image/<?php echo$imagename;?>" height="200px" width="200px" />
</li>
<li><a>My Account</a></li>
<li><a>My Status</a></li>
</ul>
</td>
<td width="50%" valign="top">
<p>Your Uploaded Photo:</p>
<img src="upload_image/<?php echo $imagenam; ?>" height="800px" width="800px" />
<p><a href="main.php?imagename=<?php echo $imagenam;?>">Set It As Your Profile</a></p>
</td>
<td>
</td>
</tr>
<tr>
<td>
</td>
<td>
</td>
</tr>
</table>
</body>
</html>
<?php } else{?>
<html>
<head>
<title>
MAIN
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<table width="100%" height="100%" border="1">
<tr height="60%">
<td rowspan="2" width="25%" valign="top">
<ul style="list-style-type:none">
<li><?php
echo'HELLO         -   '.$_SESSION['username'];
$query='SELECT imagename 
       FROM image_detail
       WHERE
       username="'.$_SESSION['username'].'"AND iscurrent=1';
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
?></li>
<li>
<img src="upload_image/<?php echo$imagename;?>" height="200px" width="200px" />
</li>
<li><a>My Account</a></li>
<li><a>My Status</a></li>
</ul>
</td>
<td width="50%">
</td>
<td>
</td>
</tr>
<tr>
<td>
<form method="post" action="uploadimage.php" enctype="multipart/form-data">
<table>
<tr><td>Upload-Image:</td><td><input type="file" name="uploadfile" /></td></tr>
<tr><td colspan="2"><small style="color:red"><i>Supported Formats Are: JPEG,PNG,GIF AND maximum file limit is 2MB</i></small></td></tr>
<tr><td><input type="hidden" name="MAX_FILE_SIZE" value="2MB"/></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="upload" /></td></tr>
</table>
</form>
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
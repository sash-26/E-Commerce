<?php
session_start();
putenv('GDFONTPATH='.'C:/Windows/Fonts');
$font='BlackadderITCRegular';
include 'coverimagetable.php';
if(isset($_GET['image_id'])){
$query='SELECT imagename,image_id
       FROM cover_image_detail
       WHERE
       image_id='.$_GET['image_id'];
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
?>
<html>
<head>
<title>
SYMBOLIC PHOTO
</title>
</head>
<body style="background-image: url(image/background.jpg)">
<h3>Your Symbolic Photo Is Here.You Can Apply Special Effects Here.</h3>
<table border="1" cellspacing="0px">
<tr>
<td>
<img src="upload_image/c.<?php echo$imagename;?>" height="600px" width="1100px" />
</td>
<td valign="top">
<h4>Apply Filter-</h4>
<form method="post" action="covereffect.php">
<table>
<tr>
<td>Choose Filter:</td>
<td>
<select name="effect">
<option value="None">None</option>
<option value="IMG_FILTER_GRAYSCALE"> Black and White</option>
<option value="IMG_FILTER_GAUSSIAN_BLUR">Blur</option>
<option value="IMG_FILTER_EMBOSS">Emboss</option>
<option value="IMG_FILTER_NEGATE">Negative</option>
<option value="IMG_FILTER_SELECTIVE_BLUR">Selective Blur</option>
</select>
</td>
</tr>
<tr><td>Add Caption:</td><td><input type="text" name="caption" /></td></td></tr>
<tr><td><input type="hidden" name="imagename" value="<?php echo$imagename;?>" />
<input type="submit" name="submit" value="Preview" /></td><td><input type="submit" name="submit" value="Save" /></td></tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>
<?php } else{
if(isset($_POST['submit']) && $_POST['submit']=='Save'){
$imgname=$_POST['imagename'];
$dir='C:/xampp/htdocs/upload_image';
$image=imagecreatefromjpeg($dir.'/c.'.$imgname);
$effect=$_POST['effect'];
echo$effect;
switch($effect){
case IMG_FILTER_SELECTIVE_BLUR:
imagefilter($image,IMG_FILTER_SELECTIVE_BLUR);
break;
case IMG_FILTER_GRAYSCALE:
imagefilter($image,IMG_FILTER_GRAYSCALE);
break;
case IMG_FILTER_GAUSSIAN_BLUR:
imagefilter($image,IMG_FILTER_GAUSSIAN_BLUR);
break;
case IMG_FILTER_EMBOSS:
imagefilter($image,IMG_FILTER_EMBOSS);
break;
case IMG_FILTER_NEGATE:
imagefilter($image,IMG_FILTER_NEGATE);
break;
}
imagejpeg($image,$dir.'/c.'.$imgname);
if(isset($_POST['caption'])){
imagettftext($image,12,0,20,20,0,$font,$_POST['caption']);
}
header('Refresh:0.0001;URL=main.php');
}
if(isset($_POST['submit']) && $_POST['submit']=='Preview'){
?>
<html>
<head>
<head>
<body style="background-image: url(image/background.jpg)">
<?php
$imgname='image_preview.php?imagename='.$_POST['imagename'].'&effect='.$_POST['effect'];
echo$imgname;
?>
<img src="<?phpecho $imgname;?>" />
</body>
</html>
<?php
}
}
?>


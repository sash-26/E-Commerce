<?php
session_start();
echo'hello';
$imgname=$_GET['imagename'];
$dir='C:/xampp/htdocs/upload_image';
$image=imagecreatefromjpeg($dir.'/c.'.$imgname);
$effect=$_GET['effect'];
switch($effect){
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
header('Content-Type: image/jpeg');
imagejpeg($image,'');
?>

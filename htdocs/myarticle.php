<?php
session_start();
include'cmstable.php';
$query='SELECT  article_id,username,Name,publish_date,ispublished,submit_date,title,article_text
        FROM cms_articles
        WHERE
		username="'.$_SESSION['username'].'"';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'My Articles';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
echo'<h1> Your Published Or Unpublished Articles Are As Follows:-</h1>';
echo'<h2>Total Articles:'.$num.'</h2>';
if($num>0){
while($row=mysql_fetch_array($result)){
extract($row);
echo'<h4 align="left">Article-ID:'.$article_id.'</h4>';
if($ispublished==1){
echo'<h2><b><i>Published</i></b></h2>';
echo'<h3>';
echo'<i>Published On-</i>'.$publish_date;
echo'</h3>';
}
else{
echo'<h2><b><i>Unpublished</i></b></h2>';
echo'<h3>';
echo'<i>Submited On-</i>'.$submit_date;
echo'</h3>';
}
echo'<h2>';
echo'Title:'.$title;
echo'</h2>';
echo'<p>';
echo$article_text;
echo'</p>';
}
}
else {
echo'<h2>';
echo'You Have Not Published Any Article.';
echo'</h2>';}
echo'</body>';
echo'</html>';
?>
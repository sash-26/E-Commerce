<?php
session_start();
include'cmstable.php';
if(isset($_GET['articleid'])){
$query='SELECT  article_id,username,Name,publish_date,submit_date,title,article_text
        FROM cms_articles
        WHERE
		article_id='.$_GET['articleid'];
$result=mysql_query($query,$db) or die(mysql_error());
$row=mysql_fetch_assoc($result);
extract($row);
echo'<html>';;
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="index.css" />';
echo'<title>';
echo'Full Article';
echo'</title>';
echo'</head>';
echo'<body style="background-image: url(image/background.jpg)">';
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
echo'</p>';
echo'</body>';
echo'</html>';
}
?>
<?php
include 'database.php';
$query='CREATE TABLE IF NOT EXISTS image_detail(
        image_id   INTEGER UNSIGNED  NOT NULL  AUTO_INCREMENT,
		username   VARCHAR(255)      NOT NULL,
		iscurrent  INTEGER UNSIGNED  NOT NULL,
		imagename  VARCHAR(255)      NOT NULL,
		PRIMARY KEY(image_id),
		KEY(username)
		)
		ENGINE=MyISAM';
mysql_query($query,$db) or die(mysql_error());
?>
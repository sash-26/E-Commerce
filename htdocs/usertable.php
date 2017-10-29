<?php
include 'database.php';
$query='CREATE TABLE IF NOT EXISTS users_details(
user_id      INTEGER UNSIGNED   NOT NULL   AUTO_INCREMENT,
Name         TEXT               NOT NULL,
Last_Name    TEXT               NOT NULL,
privilege    INTEGER            NOT NULL,
username     VARCHAR(255)       NOT NULL,
password     VARCHAR(255)       NOT NULL,
email_id     VARCHAR(255)       NOT NULL,
gender       VARCHAR(255)       NOT NULL,
place        TEXT               NOT NULL,
PRIMARY KEY(user_id)
)
ENGINE=MyISAM';
mysql_query($query,$db)or die(mysql_error($db));
?>
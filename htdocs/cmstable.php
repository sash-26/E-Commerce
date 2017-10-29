<?php
include 'database.php';
$query='CREATE TABLE IF NOT EXISTS cms_articles(
        article_id      INTEGER UNSIGNED    NOT NULL   AUTO_INCREMENT,
		username        VARCHAR(255)        NOT NULL,
        Name		    VARCHAR(255)        NOT NULL,
		submit_date     DATETIME            NOT NULL,
		publish_date    DATETIME            NOT NULL,
		ispublished     BOOLEAN             NOT NULL   DEFAULT FALSE,
		title           MEDIUMTEXT          NOT NULL,
		article_text    MEDIUMTEXT,
		PRIMARY KEY(article_id),
		INDEX(article_id,submit_date),
		FULLTEXT INDEX(title,article_text)
		)
		ENGINE=MyISAM';
mysql_query($query,$db) or die(mysql_error());
?>
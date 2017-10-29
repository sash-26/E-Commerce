<?php
$db=mysql_connect('localhost','root','') or die('Unable To Connect.Check Your Connection Parameters.');
$query='CREATE DATABASE IF NOT EXISTS customers';
mysql_query($query,$db) or die(mysql_error($db));
mysql_select_db('customers',$db) or die(mysql_error($db));
?>
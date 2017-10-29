<?php
include'usertable.php';
/*include'imagetable.php';*/
$query = 'UPDATE users_details
          SET
		  privilege=3
		  WHERE
		  username="sachin@1998"';
mysql_query($query,$db)or die(mysql_error($db));
echo'success';
$query='UPDATE users_details
        SET
		privilege=2
		WHERE
		username="anuj@1998"';
mysql_query($query,$db)or die(mysql_error($db));
echo'success';
$query='UPDATE users_details
        SET
		privilege=2
		WHERE
		username="rudra@1998"';
mysql_query($query,$db)or die(mysql_error($db));
echo'success';
?>
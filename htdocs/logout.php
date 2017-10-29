<?php
session_start();
session_unset();
session_destroy();
header('Refresh:0.0001;URL=customer zone.php');
?>
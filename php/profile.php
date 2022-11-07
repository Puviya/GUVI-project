<?php
include("register.php");
include("redis.php");
$m=new MongoDB\Driver\Manager();
//$db=$m->profile;
//$profile_Connection=$db->profile;
//echo "connection successfull";
echo "welcome".$_SESSION['email']; 
?>
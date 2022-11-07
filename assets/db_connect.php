<?php
 $dbhost = "localhost";
 $dbuser = "puviya";
 $dbpass = "puvi@0305";
 $db = "guvi";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 if($conn -> connect_error){
    die("Connection failed:".$conn->connect_error);
}
?>
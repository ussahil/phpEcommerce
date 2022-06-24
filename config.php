<?php

 $SERVER ='localhost';
 $USER='root';
 $PASSWORD='';
 $DB='ecommerce';

$mysqli = new mysqli($SERVER, $USER, $PASSWORD, $DB);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
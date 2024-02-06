<?php
$host="localhost";
$user = "root";
$pw = "";
$db ="questbook";

$conn = new mysqli($host,$user,$pw,$db);
if($conn ->connect_error){die("Couldn't connect to DB </br>".$conn->connect_error);}


?>
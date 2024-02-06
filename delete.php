<?php 
session_start();
include("db.php");
$id = $_GET["id"];
echo "$id";

$sql = "DELETE FROM photos WHERE id = $id";
if($conn->query($sql)===TRUE){echo "Picture deleted succesfully";}else{echo "There was an error</br>".$conn->error;}

?>
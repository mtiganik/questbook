<?php 
session_start();
include('db.php');
$id = $_POST["id"];
$description = $_POST["description"];
$user = $_SESSION["user"];

$sql = "INSERT INTO comments (pic_id,text,user) VALUES ('$id','$description','$user')";
$conn->query($sql);
echo "<div class='author'>$user</div>$description <div class='commentDate'>Just now </div>";

?>
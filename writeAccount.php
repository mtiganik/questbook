<?php 
session_start();
include("db.php");
$loggedIn = isset($_SESSION["user"]);
$user=$_GET["name"];
if($loggedIn){
echo "$user pictures:";
}else echo "not looged in";
$response = "<code><ul id='double'>";
$sql = "SELECT * FROM photos WHERE user_id = '$user'";
$result = $conn->query($sql);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$response .='<li><img onclick="fullImage('.$row["id"].')" 
		src="uploads/'.$row["id"].'.'.$row["suffix"].'"style = "max-width:200px"><br>'.$row["name"].'</li>';
	} 
}
$response .="</ul></code>";
echo $response;
?>
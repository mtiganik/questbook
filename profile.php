<?php 
session_start();
include("db.php");
include("writeLeft.php");
$loggedIn = isset($_SESSION["user"]);
$user="";
if($loggedIn){
$user = $_SESSION["user"];

echo $_SESSION["user"];

}else echo "not looged in";
$response = "";
$sql = "SELECT * FROM photos WHERE user_id = '$user'";
$result = $conn->query($sql);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$response .='<table style="border:2px solid; display:inline"><tr><th><img onclick="fullImage('.$row["id"].')" 
		src="uploads/'.$row["id"].'.'.$row["suffix"].'"style = "max-width:200px"></th></tr><tr><td class="name">'.$row["name"].'</td></tr></table>';
	} 
}
function fullImage($id){
echo "Hello";
}
?>
<!doctype html>
<html>
<head>
<title>Questbook</title>
<meta charset="utf8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="javascript.js"></script>
<link rel="stylesheet" href="style/style.css">
</head><body style="background-color:#E0E0E0">
 <img src="style/header.png" id="headerBG">
<h1 id="header">Questbook</h1>

<div id="menu">
<?=$leftText;?>
</div>


<div class="main frontpage">
<?=$response;?>
</div>
<div id="big" style="display:none"></div>
</body>
</html>
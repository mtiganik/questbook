<?php
include("db.php");
include("writeLeft.php");
$response = "<h2>Here are users that are currently registered to QUESTBOOK:</h2>";
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
if($result -> num_rows > 0){
	while($row = $result -> fetch_assoc()){
	$user = $row["username"];
		$response .= "<div class='list' onclick=loadProfile('$user')>" . ucfirst($row["username"]) . "</div><br>";
	}
}
//$response .="</div>";
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

<div class="main frontpage" id="frontpage">
<?=$response;?>
</div>
<div id="big" style="display:none"></div>



</body></html>
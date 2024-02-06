<?php
include("db.php");
include("writeLeft.php");
////// TO GET BIGGEST PHOTO ID
$sql = "SELECT * FROM photos
WHERE id =(SELECT MAX(id) FROM photos)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$last_id=$row["id"];
    }
} else {$last_id=1;}
//////

//////FIND AVERAGE SCORE FOR EACH PHOTO
$response = "";
$averages = array();
for($i = 1; $i <= $last_id; $i++){
$sum = 0;
$count = 0;
$sql =  "SELECT * FROM rates WHERE pic_id = '$i'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$sum = $sum + $row["rate"];
		$count++;
    }
	$sum = $sum / $count;
	$averages[$i] = $sum;
}	 
}
arsort($averages); //Sorts $averages according to the key value; 


foreach($averages as $x => $x_value){
	$response .= "$x pic average is: " .$x_value . "<br>";}
$response = "";
/////// DISPLAY RESULT with photo name, author and with average score
foreach($averages as $x => $x_value){
$sql = "SELECT * FROM photos WHERE id = '$x'";
$result = $conn -> query($sql);
if($result -> num_rows > 0){
	while($row = $result -> fetch_assoc()){
	$response .='<table style="border:2px solid;"><tr><th colspan = "2"><img onclick="fullImage('.$row["id"].')" 
		src="uploads/'.$row["id"].'.'.$row["suffix"].'"style = "max-width:200px"></th></tr><tr><td class="name">'.$row["name"].'</td></tr>
		<tr><td>User: '.ucfirst($row["user_id"]).'</td><td>Avg: '.$x_value.'</td></tr>
		</table>';
	
	}
}

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
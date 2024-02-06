<?php 
include("db.php");
include("writeLeft.php");
$name = $pass = $passErr = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$name = $_POST["name"];
	$pass =$_POST["pass"];
	echo "$name. Echoed...";
	$sql = "SELECT username,password FROM user";
	$result = $conn -> query($sql);
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($pass == $row["password"]){
			session_start();
			$_SESSION["user"]=$name;
			echo "Welcome ". $_SESSION["user"];
			header('location: index.php');
		} else $passErr = "Wrong password!";
    }
} else {
    echo "0 results";
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
<h5 >To continue, log in </br></h5>
<form method="post">
Name: <input type="text" name="name" placeholder="Enter username"></br>
Password: <input type="password" name="pass"><?=$passErr?></br>
<button type="submit">Log In</button>
</form>
<h5>Or <a href="register.php">create a new account</a> </h5>
</div>

</html>
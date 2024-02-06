<?php 
session_start();
include("writeLeft.php");
include("db.php");
include("uploadPic.php");
$loggedIn = isset($_SESSION["user"]);
if(!$loggedIn){
header('location: login.php');
}
$alert="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$alert = uploadPic();
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
<h5 >Here is secret content </br>

Or hope u like it here  Lets upload a file</h5>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
	<input type = "text" name="name" placeholder = "photos name"><br>
	<textarea rows="4" cols = "50" name="description" placeholder="write something about this photo"></textarea><br>
    <input type="submit" value="Upload Image" name="submit"></br>
	<?=$alert;?>
</form>

</div>

</html>
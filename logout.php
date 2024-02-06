<?php 
session_start();
include("writeLeft.php");
$loggedIn=isset($_SESSION["user"]);
$user ="";
$comment = "Goodye $user. Hoped you liked here in Questbook";

//$comment = "Goodye $user. Hoped you liked here in Questbook";
session_unset();
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
<?=$comment; ?>
</div>
</body>
</html>
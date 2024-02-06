<?php 

include("db.php");
include("writeLeft.php");
$comment="";



$name = $email = $pass ="";
$passErr=$nameErr = $emailErr ="";
if ($_SERVER["REQUEST_METHOD"]=="POST"){


	
	if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
  }}
	if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
	//check if e-mail address is well formed
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["pass1"])||(empty($_POST["pass2"]))){
	$passErr = "Password is empty";
  }else if($_POST["pass1"] != $_POST["pass2"]){
	$passErr = "passwords don't match!";
  }else {
	$pass = $_POST["pass1"];
  }

	if(empty($nameErr || $emailErr || $passErr)){
		$sql = "INSERT INTO user (username,email,password)VALUES ('$name','$email','$pass')";
		if($conn->query($sql)===TRUE){$comment = "user was created succesfully";
		}else{$comment = "Error creating new user " . $conn->error;}
	}else echo "Some error is there!";
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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

<h5>Create a new account </h5>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name" placeholder="Enter username"><span class="error">* <?php echo $nameErr;?></span></br>
E-mail<input type="text" name="email" placeholder="Enter e-mail"><span class="error">* <?php echo $emailErr;?></span></br>
password<input type="password" name="pass1"><span id="passwarning"></span>
</br>
Re-password<input type="password" name="pass2"><span class="error">* <?php echo $passErr;?></span></br>
<button type="submit">Submit</button>
<?php echo $comment;?>
</form>
</div>

</html>


<?php 
session_start();
include("db.php");
$allowComments = false;
$allowDelete = false;
$user = "";
$loggedIn = isset($_SESSION["user"]);
if($loggedIn){$user = $_SESSION["user"];
$allowComments = true;
};

$id = intval($_GET["id"]);
$content = "";
$sql = "SELECT * FROM photos WHERE id = '$id'";
$result = $conn->query($sql);
$temp = "";
if($result ->num_rows>0){
	while($row=$result->fetch_assoc()){
		$content = "<div class='bigPic'><img src='uploads/".$row["id"].".".$row["suffix"]."' title='".$row["name"]."'></div>
		<div class='container'><div class='header' onclick = 'closeBigPic();'>close[X]</div>
		<div class='user'>".ucfirst($row["user_id"])."</div><div class='date'>".$row["ts"]."</div>
		<div class='name'>".$row["name"];
		$temp ="<div class='description'>".$row["description"]."</div>";
		
		if($row["user_id"]==$user){
		$allowDelete = true;
		}
	}
}
if($allowDelete){
$content .= "<input type='button' onclick='deletePic($id)' value='delete Pic'>";
}
$content .= "</div>".$temp;
$sql = "SELECT * FROM rates where pic_id = $id";
$result = $conn->query($sql);
$i=0; $sum=0;
if($result -> num_rows>0){
	while($row = $result -> fetch_assoc())
	{$sum =$sum + $row["rate"];
	$i++;}
	$sum = $sum / $i;
	$content .= "<div class='score' id='score'>Score: ".round($sum,2)."</div>";
	}else {
	$content .="<div class='score' id='score'>Score is not rated yet</div><div class='scorecomment'>You can rate this picture first!</div>";
	}

if($allowComments){
$content .= "<div class ='rates'><form>
<input type='radio' name='rate' value='1' onclick='getRate(this.value,$id)'>1
<input type='radio' name='rate' value='2' onclick='getRate(this.value,$id)'>2
<input type='radio' name='rate' value='3' onclick='getRate(this.value,$id)'>3
<input type='radio' name='rate' value='4' onclick='getRate(this.value,$id)'>4
<input type='radio' name='rate' value='5' onclick='getRate(this.value,$id)'>5
</form></div>";

$PHP_SELF = $_SERVER["PHP_SELF"];
$content .= "<div class ='comments'>
<form id='form' name='form'>

<input type='text' id='newComment' placeholder='write something about this photo..'>
<input id='submit' type='button' value='Post it' onclick='newComment1($id)'>

</form>
 <div id='submitted'></div>
 ";
 }else {
	$content .= "<br>You need to log in to post comments and rate pictures!</br></br>";
 }
$sql = "SELECT * FROM comments WHERE pic_id = '$id'
ORDER BY id DESC";
$result = $conn->query($sql);
if($result -> num_rows > 0){
	while($row=$result ->fetch_assoc()){
		$content .= "<div class='author'>".$row["user"]."</div>".$row["text"]."<div class='commentDate'>".$row["ts"]."</div>";
	}

}
$content .= " </div></div>";
echo $content;
?>
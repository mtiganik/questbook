<?php 
session_start();
include("db.php");
$rate = intval($_GET["rate"]);
$user = $_SESSION["user"];
$id = intval($_GET["id"]);
$oldRate=0;
$sql = "SELECT * FROM rates WHERE user_id = '$user'";
$result = $conn->query($sql);
if($result -> num_rows>0){
	$oldRate=1;
}else $oldRate=0;

if($oldRate){
$sql = "DELETE FROM rates WHERE user_id = '$user' and pic_id='$id'";
if($conn->query($sql)===TRUE){}
}
// On olemas ka UPDATE käsk
$sql = "INSERT INTO rates (user_id,rate,pic_id) VALUES ('$user','$rate',$id)";
if($conn->query($sql)===TRUE){}else {echo $conn->error;}

$sql = "SELECT * FROM rates where pic_id = $id";
$result = $conn->query($sql);
$i=0; $sum=0;
if($result -> num_rows>0){
	while($row = $result -> fetch_assoc())
	{$sum =$sum + $row["rate"];
	$i++;}
	$sum = $sum / $i;
	echo "Score: ".round($sum,2);
	}

?>
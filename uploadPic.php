<?php



function uploadPic(){
include("db.php");
$user= $_SESSION["user"];
$name=mysqli_real_escape_string($conn,$_POST["name"]);
$description=mysqli_real_escape_string($conn,$_POST["description"]);

$sql = "SELECT * FROM photo_id
WHERE id =(SELECT MAX(id) FROM photo_id)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$last_id=$row["id"]+1;
    }
} else {
    $last_id=1;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $last_id . "." . $imageFileType;


/*
$sql = "INSERT INTO photos (user_id, name, description, suffix) VALUES ('$user','$name','$description','$imageFileType')";
if ($conn -> query($sql)===TRUE){
	$last_id=$conn ->insert_id;
	echo "New record created successfully. Last insert ID is: " .$last_id;
}else {echo "Error: ".$sql . "<br>" .$conn->error;}
*/

//echo $last_id;
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        return "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    return "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    return "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    return "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$sql = "INSERT INTO photos (id, user_id, name, description, suffix) VALUES ('$last_id','$user','$name','$description','$imageFileType')";
		if ($conn -> query($sql)===TRUE){
			$last_id=$conn ->insert_id;
			echo "photos SQL was updates";
		}else {echo "Error: ".$sql . "<br>" .$conn->error;}
		$sql = "INSERT INTO photo_id (id) VALUES ('$last_id')";
		if ($conn -> query($sql)===TRUE){
			$last_id=$conn ->insert_id;
			return "Success";
		}else {echo "Error: ".$sql . "<br>" .$conn->error;}
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}
}
?>
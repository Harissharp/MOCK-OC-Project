<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



//Setting up a connection

$servername = "localhost";
$username = "119019";
$password = "saltaire";
$dbname = "119019";
$conn =mysqli_connect($servername,$username,$password,$dbname);






if (!$conn){
    die("Connection failed:".mysqli_connect_error());
}
//SQL qurey we desire 
$sql = "INSERT INTO `file-link-store_kj1` (`filename`, `dir`, `extentsion`) VALUES ('1', '$target_dir', '$imageFileType')";
if (mysqli_query($conn, $sql)){
    $message="Reply sent!";
    $_SESSION["chat_status?"]=$message;
}else{
    echo"Error:".$sql."<br>".mysqli_error($conn);
}
header("Location: chat.php");

mysqli_close($conn);
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
$reply = $_POST['reply'];

session_start();


?>


<?php

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
$sql = "INSERT INTO `chat-store_kj1` (`convo_id`, `message`, `message_id`, `admin_id`, `customer_id`) VALUES ('1', '$reply', NULL, '1', '')";
if (mysqli_query($conn, $sql)){
    $message="Reply sent!";
    $_SESSION["chat_status?"]=$message;
}else{
    echo"Error:".$sql."<br>".mysqli_error($conn);
}
header("Location: chat.php");

mysqli_close($conn);

?>
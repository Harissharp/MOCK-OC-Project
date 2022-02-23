<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>



<?php
include 'functions.php';

//Main Code

session_start();//starting session

$uPassword=$_POST['psw'];
$uEmail=$_POST['uEmail'];

$conn=setupconnection_sqli();
testconnection_sqli($conn);

//selecting what information we want
$sql = "SELECT ID FROM admin_accounts_k1j";
$sql = $sql . " where email='" . $uEmail . "' AND password='" . $uPassword . "';";
$result = mysqli_query($conn, $sql);

setLoggedStatus($result);


mysqli_close($conn);
?>



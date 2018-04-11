<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test_db"; // Database name
$tbl_name="test"; // Table name

// Connect to server and select database.
$con=mysqli_connect('localhost', 'root', '', 'test_db') or die("Failed to connect: ". mysqli_error($con));

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con, $myusername);
$mypassword = mysqli_real_escape_string($con, $mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($con, $sql)or die(mysqli_error($con));

$count=mysqli_num_rows($result);

if($count==1){
    session_start();
    $_SESSION["myusername"]=$myusername;
    header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>

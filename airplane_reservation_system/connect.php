<?php
session_start();
$dbhost="localhost";
$dbuser="adbms";
$dbpass="adbms";
$dbname="airplane_reservation";

$connection= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$username=$_POST["username"];
$password=$_POST["password"];
$_SESSION['user']= $username;
$_SESSION['sessionVar2']= $password;
$result=mysqli_query($connection,"SELECT user_id FROM users WHERE username='$username' AND password='$password'");
$count=mysqli_num_rows($result);
if($count==1)
{
  header("Location: http://localhost:8888/airplane_reservation_system/main.html");
die();
  echo "<h1>Login Successfull</h1>";

}
else {
  echo "<h1>Login Failure</h1>" ;
}

?>

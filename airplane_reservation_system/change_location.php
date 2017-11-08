<?php
session_start();
$dbhost="localhost";
$dbuser="nikhil";
$dbpass="nikhil";
$dbname="gas_reservation";

$connection= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$_POST['address'];

mysqli_query($connection,"UPDATE customer SET address = '$address' ");
echo "Gas Booked Successfully";

 ?>

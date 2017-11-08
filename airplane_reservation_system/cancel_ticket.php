<?php
session_start();
$dbhost="localhost";
$dbuser="adbms";
$dbpass="adbms";
$dbname="airplane_reservation";

$username=$_SESSION['user'];
$source=$_SESSION['source'];
$destination=$_SESSION['destination'];
$day=$_SESSION['day'];
$month=$_SESSION['month'];
$year=$_SESSION['year'];
$base_price=$_SESSION['base'];
$ticket_price = $base_price + $day+ (2* $month)+200;
$book_id=$_SESSION['book'];
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$refund = ($ticket_price/100) * 80;

 ?>



 <!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/></head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

<?php
   mysqli_query($conn,"DELETE FROM bookings WHERE booking_id=$book_id");
  mysqli_query($conn,"UPDATE users SET number_of_bookings = number_of_bookings - 1 WHERE username = '$username' ");
echo "Successfully Cancelled You will get ".$refund." back";
header('location:http://localhost:8888/airplane_reservation_system/status.php');
 ?>








<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   </body>
 </html>

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

$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);


$fname = mysqli_query($conn,"SELECT DISTINCT first_name,last_name FROM users WHERE username = '$username'");
while($row = $fname->fetch_assoc()){
  $first = $row['first_name'];
  $last = $row['last_name'];
}

$temp=mysqli_query($conn,"SELECT DISTINCT plane_id FROM planes WHERE Source = '$source' AND Destination = '$destination' ");
while($row = $temp->fetch_assoc()){
  $flight_id=$row['plane_id'];
}

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
   mysqli_query($conn,"INSERT INTO bookings(username,first_name,last_name,flight_id,source,destination,ticket_price,day,month,year) VALUES ('$username','$first','$last',$flight_id,'$source','$destination',$ticket_price,$day,$month,$year)");
  mysqli_query($conn,"UPDATE users SET number_of_bookings = number_of_bookings + 1 WHERE username = '$username' ");
echo "Successfully Booked";
header('location:http://localhost:8888/airplane_reservation_system/status.php');
 ?>








<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   </body>
 </html>

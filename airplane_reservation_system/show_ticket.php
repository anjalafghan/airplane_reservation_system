<?php
session_start();
$dbhost="localhost";
$dbuser="adbms";
$dbpass="adbms";
$dbname="airplane_reservation";

$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$source=$_POST["source"];
$destination=$_POST["destination"];
$day=$_POST["day"];
$month=$_POST["month"];
$year=$_POST["year"];


if ($source==$destination) {
  echo "ERROR!!! destination and source cannot be the same";
  die();
}
$temp=mysqli_query($conn,"SELECT DISTINCT place FROM locations WHERE location_id = $source");
while($row = $temp->fetch_assoc()){
  $source = $row['place'];
}
$temp=mysqli_query($conn,"SELECT DISTINCT place FROM locations WHERE location_id = $destination");
while($row = $temp->fetch_assoc()){
  $destination= $row['place'];
}
$temp=mysqli_query($conn,"SELECT DISTINCT base_price FROM planes WHERE source = '$source' AND destination = '$destination' ");
while($row = $temp->fetch_assoc()){
  $base_price= $row['base_price'];
}

$_SESSION['source']=$source;
$_SESSION['destination']=$destination;
$_SESSION['day']=$day;
$_SESSION['month']=$month;
$_SESSION['year']=$year;
$_SESSION['base']=$base_price;
$ticket_price = $base_price - (100*$day) - ( 200* $month )+200;
$_SESSION['ticket_price']=$ticket_price;

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


<div class="row">
        <div class="col s12 m6">
          <div class="card ">
            <div class="card-content ">
              <span class="card-title">Your Ticket</span>
              <p>
                <?php echo "From:".$source."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo:".$destination."</br> </br> </br> On: ".$day." ".$month." ".$year."</br></br></br>Price :".$ticket_price; ?>

              </p>
            </div>

          </div>
        </div>
      </div>

      Do you want to book?
      <form class="" action="book_ticket.php" method="post">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
      </form>






<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   </body>
 </html>

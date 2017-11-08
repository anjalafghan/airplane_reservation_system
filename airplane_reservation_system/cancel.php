<?php
session_start();
$dbhost="localhost";
$dbuser="adbms";
$dbpass="adbms";
$dbname="airplane_reservation";
$username=$_SESSION['user'];

$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
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

$sql = "SELECT * FROM bookings WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows >= 0) {
    while($row = $result->fetch_assoc()) {
?>
        <div class="row">
                <div class="col s12 m6">
                  <div class="card ">
                    <div class="card-content ">
                      <span class="card-title">Your Ticket</span>
                      <p>
                        <?php echo $row['first_name']." ".$row['last_name']." <br/><br/><br/>From:".$row["source"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo:".$row['destination']."</br> </br> </br> On: ".$row['day']." ".$row['month']." ".$row['year']."</br></br></br>Price :".$row['ticket_price']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Flight ID:
                        ".$row['flight_id'];
                        $_SESSION['book']=$row['booking_id'];
                        ?>
                        <form class="" action="cancel_ticket.php" method="post">
                          <button class="btn waves-effect waves-light" type="submit" name="action">Cancel
                        <i class="material-icons right">send</i>
                        </button>
                        </form>
                      </p>
                    </div>

                  </div>
                </div>
              </div>

<?php

    }
} else {
    echo "0 results";
}

 ?>


  





<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
   </body>
 </html>

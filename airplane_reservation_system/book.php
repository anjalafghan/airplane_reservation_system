<?php

$dbhost="localhost";
$dbuser="adbms";
$dbpass="adbms";
$dbname="airplane_reservation";
session_start();
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$username=$_SESSION['user'];
$fname = mysqli_query($conn,"SELECT DISTINCT first_name FROM users WHERE username = '$username'");
while($row = $fname->fetch_assoc()){
  $first = $row['first_name'];
}
echo "Hello ".$first;
?>
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
     <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
     <!--Import materialize.css-->
     <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->

     <!--Let browser know website is optimized for mobile-->
     <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/> -->
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/airplane_reservation_system/index.css" />
    <meta charset="utf-8">
    <title>transfer</title>
  </head>
  <body>
  <div class="container">
    <form class="" action="show_ticket.php" method="post">


      <div class="dropdown">
        <select name="source">
        <?php
        $sql = mysqli_query($conn, "SELECT DISTINCT location_id,place FROM locations");
        while ($row = $sql->fetch_assoc()){
          echo "<option value=".$row['location_id'].">".$row['place']."</option>";
        }
        ?>
        </select>
      </div>

      <div class="dropdown">
        <select name="destination">
        <?php
        $sql = mysqli_query($conn, "SELECT DISTINCT location_id,place FROM locations");
        while ($row = $sql->fetch_assoc()){
          echo "<option value=".$row['location_id'].">".$row['place']."</option>";
        }
        ?>
        </select>
      </div>

      <div class="date">

        <input type="number" name="day" maxlength="2" min="1" max="31" placeholder="day"id="day" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="" required>
        <input type="number" name="month" min="1" max="12" maxlength="2" placeholder="month"id="month" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="" required>
        <input type="number" name="year" maxlength="4" min="2017" max="2018" placeholder="year"id="year" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="" required>

      </div>


        <div class="button">
            <button class="submit" name="submit" onclick="submitForm()">Submit</button>
           </div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    function submitForm() {
        document.getElementById('form').submit();
    }
</script>
      </div>
    </form>
  </div>

  </body>
</html>

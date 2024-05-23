<?php
session_start();

$c = mysqli_connect("localhost", "root", "", "mini_project");

if (!$c) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["button"])) {
  $Places = $_POST["Places"];

  $_SESSION['Departure']= $Departure = $_POST["Departure"];
  $_SESSION['Destination'] = $Destination = $_POST["Destination"];
  $_SESSION['time']="8h";
  $_SESSION['Date'] = $Date = $_POST["Date"];

  



  $time1 = $_POST["time1"];
  
  $time2 = $_POST["time2"];
  $Price = $_POST["Price"];

  $IDdriver = $_SESSION["DriverID"];

  $sql = "INSERT INTO `trip` (`DepartureLocation`, `ArrivalLocation`, `DepartureDate`, `DepartureTime`, `AccessTime`, `AvailableSeats`, `Price`, `DriverID`) VALUES ('$Departure', '$Destination', '$Date', '$time1', '$time2', '$Places', '$Price', '$IDdriver')";

  if (mysqli_query($c, $sql)) {
    header("Location: page5.php");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($c);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="./automobile-1845650_1280.jpg" type="image/x-icon" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fast taxi</title>
  <link rel="stylesheet" href="../CSS/page7.css" />
</head>


<body>
  <div class="contenars">

    <div class="logo">
      <h2>Carpool<span>DZ...</span> </h2>

      <button class="logout">log out</button>

    </div>



    <img class="ww" src="../img/Screenshot 2024-04-06 175108.png">




    <div class="content">


      <div class="DD">

        <h2>Publish a journey</h2>
        <br>


        <form action="" method="post">
          <nav><input required type="date" placeholder="   Date" name="Date">
            <input required type="number" placeholder="   Places " name="Places">
          </nav>

          <nav> <input required type="text" placeholder="   Departure " name="Departure">
            <input required type="time" placeholder="   time" name="time1">
          </nav>


          <nav><input required type="text" placeholder="   Destination " name="Destination">
            <input required type="time" placeholder="   time" name="time2">
          </nav>

          <nav> <input required type="text" placeholder="   Stop1" name="Stop1">
            <input required type="text" placeholder="   Stop2" name="Stop2">
          </nav>

          <nav>
            <input required type="number" placeholder="   Price" name="Price">
          </nav>



          <button class="R" type="submit" name="button">Register </button>
          <button>

        </form>
      </div>

    </div>


    <div class="back">
      <nav>
        <h3> Contact: </h3>
        <ul>
          <li>Tel:99 99 99 99 99</li>
          <li>Mail:abcdefghij@gmail.com </li>
          <li>Adresse:side ammar Annaba 23000</li>
        </ul>
      </nav>


      <nav>
        <h3> Quick links: </h3>
        <ul>
          <li><a href="Register4.php">Register</a></li>
          <li><a href="">Send a message</a></li>
          <li><a href="">Who are we</a></li>
        </ul>
      </nav>



      <nav>
        <h3> miscellaneous information: </h3>
        <ul>
          <li>our partners</li>
          <li>our regional headquarters</li>

        </ul>
      </nav>


    </div>
    




  </div>
</body>
<script src="../Javasecript/page7.js"></script>

</html>
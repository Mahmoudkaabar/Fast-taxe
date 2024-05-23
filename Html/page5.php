<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="./automobile-1845650_1280.jpg" type="image/x-icon" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fast taxi</title>
  <link rel="stylesheet" href="../CSS/page5.css" />
</head>


<body>
  <div class="contenars">

    <div class="logo">
      <h2>Carpool<span>DZ...</span> </h2>
      <button class="logout">log out</button>



    </div>



    <img class="ww" src="../img/Screenshot 2024-04-06 175108.png">




    <div class="content">

      <div class="left">

        <h2 class="hh">My profile</h2>

        <form action="page5.php" method="post">
          <label for="1">Evaluation:</label>
          <input id="input1" type="text" disabled value="****">
          <br>
          <label for="2">Experience:</label>
          <input id="2" type="number and text" disabled value="  7 ans">
          <br>
          <label for="3">Driving category:</label>
          <input id="3" type="text" disabled value="  Used to">
          <br>
          <label for="4">Annulation/delay:</label>
          <input id="4" type="text" max="10/10" min="0/10" disabled value="  2/10">
          <br>
          <label for="tel"> Contact:</label>
          <input id="tel" type="tel" value="  0699999999" disabled>
          <br>
          <label for="6"> Certified:</label>
          <input id="input2" type="text" disabled value="  Yes">



        </form>





      </div>



      <div class="right">



        <h2 class="hh">My journeys</h2>

        <button class="New">New Journey</button>

        <div class="tt">

          <table>
            <tbody>

              <?php
              
              $c = mysqli_connect("localhost", "root", "", "mini_project");
              if (!$c) {
                die("Connection failed: " . mysqli_connect_error());
              }

              
              $driverID = $_SESSION["DriverID"];
              $sql = "SELECT * FROM trip WHERE DriverID = $driverID";
              $result = mysqli_query($c, $sql);


              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['DepartureDate'] . "</td>";
                echo "<td>" . $row['DepartureTime'] . "</td>";
                echo "<td>" . $row['DepartureLocation'] . "/" . $row['ArrivalLocation'] . "</td>";
                echo '<td class="tf" ><nav><button><a href="page6.php?id=' . $row['TripID'] . '">Manage</a></button></nav></td>';
                echo "</tr>";
              }


              



              
              mysqli_close($c);
              ?>
            </tbody>
          </table>


         




        </div>

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
          <li><a href="../Html/Register4.html">Register</a></li>
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

<?php

if (isset($_SESSION["Phone2"])) {
  $phone = $_SESSION["Phone2"];
  echo "<script>document.getElementById('tel').value = '$phone';</script>";
}










?>








<script src="../Javasecript/page5.js"></script>

</html>
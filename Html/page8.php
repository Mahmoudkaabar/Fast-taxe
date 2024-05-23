<?php

session_start();


$c = mysqli_connect("localhost", "root", "", "mini_project");

if (!$c) {
  die("Connection failed: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="./automobile-1845650_1280.jpg" type="image/x-icon" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fast taxi</title>
  <link rel="stylesheet" href="../CSS/page8.css" />
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

        <div class="f">

          <form>
            <label for="name">Name:</label>
            <input id="name" value="Amine" type="text" disabled>
            <br> <br>
            <label for="email">Email:</label>
            <input id="email" type="email" value="Amine@gmail.com" disabled>
            <br><br>
            <label for="tel">Contact:</label>
            <input id="tel" type="tel" value="0777777777" disabled>




          </form>

        </div>

      </div>



      <div class="right">



        <h2 class="hh">My journeys</h2>

        <div>


          <tbody>

            <table>
              <header>
                <tr>

                  <th>Date</th>
                  <th>Time</th>
                  <th>Depart/Arrival</th>
                  <th>Status</th>

                </tr>

              </header>




              <?php


              if (isset($_POST["button1"]) && isset($_SESSION["UserID"]) && isset($_SESSION["Trip"])) {
                $UserID = $_SESSION["UserID"];
                $tripID = $_SESSION["Trip"];

                $sql2 = "INSERT INTO `bookingrequest` (`UserID`, `TripID`) VALUES ('$UserID', '$tripID')";
                $r = mysqli_query($c, $sql2);


                $sql = "SELECT * FROM trip WHERE TripID=$tripID";
                $result = mysqli_query($c, $sql);


                $sql3 = "SELECT * FROM bookingrequest WHERE  TripID=$tripID AND UserID=$UserID";
                $res3 = mysqli_query($c, $sql3);
                $row3 = mysqli_fetch_assoc($res3);



                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['DepartureDate'] . "</td>";
                  echo "<td>10H</td>";
                  echo "<td>" . $row['DepartureLocation'] . "/" . $row['ArrivalLocation'] . "</td>";

                  if ($row3['RequestStatus'] == "yes") {

                    echo '<td class="Ac"> Accepte </td>';
                  } elseif ($row3['RequestStatus'] == "no") {

                    echo '<td class="U">Unacceptable</td>';
                  } else {
                    echo '<td class="P"> Pending </td>';
                  }


                  echo "</tr>";
                }
              }


              ?>


            </table>

          </tbody>








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
if (isset($_SESSION["name"]) &&  isset($_SESSION["Phone"]) && isset($_SESSION["email"])) {
  $name = $_SESSION["name"];
  $phone = $_SESSION["Phone"];
  $email = $_SESSION["email"];


  echo "<script>document.getElementById('name').value = '$name';</script>";
  echo "<script>document.getElementById('email').value = '$email';</script>";
  echo "<script>document.getElementById('tel').value = '$phone';</script>";
} else {
  $UserID = $_SESSION["UserID"];


  $sql = "SELECT * FROM user WHERE UserID='$UserID' ";
  $res = mysqli_query($c, $sql);

  if ($res->num_rows > 0) {

    $row = mysqli_fetch_assoc($res);

    $name2 = $row['User Name'];
    $Email2 = $row['Email'];
    $Phone2 = $row['Phone number'];


    echo "<script>document.getElementById('name').value = '$name2';</script>";
    echo "<script>document.getElementById('email').value = '$Email2';</script>";
    echo "<script>document.getElementById('tel').value = '$Phone2';</script>";
  }
}


?>

<script src="../Javasecript/page8.js"></script>

</html>
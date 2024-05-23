<?php
session_start();

$c = mysqli_connect("localhost", "root", "", "mini_project");
if (!$c) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id']) && isset($_POST['status'])) {
  $bookingRequestId = $_POST['id'];
  $status = $_POST['status'];

  $sql4 = "UPDATE bookingrequest SET RequestStatus='$status' WHERE BookingRequestID='$bookingRequestId'";
  $res = mysqli_query($c, $sql4);
}

$UserID = $_SESSION["UserID"];
$tripID = $_GET['id'];
$driverID = $_SESSION["DriverID"];
$tripID2 = $_SESSION["Trip"];

$sql = "SELECT * FROM trip WHERE TripID='$tripID' AND DriverID='$driverID'";
$result = mysqli_query($c, $sql);

$sql2 = "SELECT * FROM user WHERE UserID='$UserID'";
$res = mysqli_query($c, $sql2);

$sql3 = "SELECT bookingrequest.*,user.`User Name` FROM  bookingrequest JOIN user ON bookingrequest.UserID = user.UserID
       WHERE 
        bookingrequest.TripID = '$tripID2' 
        AND bookingrequest.UserID = '$UserID'
";

$res3 = mysqli_query($c, $sql3);


$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($res);
$row3 = mysqli_fetch_assoc($res3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="./automobile-1845650_1280.jpg" type="image/x-icon" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fast taxi</title>
  <link rel="stylesheet" href="../CSS/page6.css" />

</head>

<body>
  <div class="contenars">
    <div class="logo">
      <h2>Carpool<span>DZ...</span> </h2>
      <button type="submit" class="logout">log out</button>
    </div>

    <img class="ww" src="../img/Screenshot 2024-04-06 175108.png">

    <div class="content">
      <h2>Manage a journey</h2>
      <h3>Journey: <?php echo $row['DepartureDate'] . "/" . $row['DepartureLocation'] . "/" . $row['ArrivalLocation']; ?> </h3>

      <div class="tt">
        <table>
          <tbody>
            <?php
            if ($tripID == $tripID2) {
              if (($result->num_rows > 0) && ($res->num_rows > 0)) {
                if ($row3) {
                  echo '<tr id="row1">';
                  echo '<td>' . $row2['User Name'] . '</td>';
                  echo "<td>man</td>";
                  echo "<td>27</td>";
                  echo '<td>' . $row['ArrivalLocation'] . '</td>';
                  echo '<td class="tf">
                          <form action="" method="post" )">
                            <input type="hidden" name="id" value="' . $row3['BookingRequestID'] . '">
                            <input type="hidden" name="status" value="yes">
                            <button type="submit" class="Ok"  name="ok" >Ok</button>
                          </form>
                        </td>';
                  echo '<td class="tf">
                          <form action="" method="post" )">
                            <input type="hidden" name="id" value="' . $row3['BookingRequestID'] . '">
                            <input type="hidden" name="status" value="no">
                            <button type="submit" class="No"  name="no" >No</button>
                          </form>
                        </td>';
                  echo '</tr>';
                }
              }
            }
            if (isset($_POST['no']) || isset($_POST['ok'])) {

              echo "<script>document.getElementById('row1').style.display = 'none';</script>";
            }


            ?>
          </tbody>
        </table>
      </div>

      <button class="Return"><a href="page5.php">Return</a></button>
    </div>

    <div class="back">
      <nav>
        <h3>Contact:</h3>
        <ul>
          <li>Tel:99 99 99 99 99</li>
          <li>Mail:abcdefghij@gmail.com</li>
          <li>Adresse:side ammar Annaba 23000</li>
        </ul>
      </nav>

      <nav>
        <h3>Quick links:</h3>
        <ul>
          <li><a href="Register4.php">Register</a></li>
          <li><a href="#">Send a message</a></li>
          <li><a href="#">Who are we</a></li>
        </ul>
      </nav>

      <nav>
        <h3>Miscellaneous information:</h3>
        <ul>
          <li>our partners</li>
          <li>our regional headquarters</li>
        </ul>
      </nav>
    </div>
  </div>

  <script src="../Javascript/page6.js"></script>
</body>

</html>
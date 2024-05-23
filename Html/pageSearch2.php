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
    <link rel="stylesheet" href="../CSS/pageSearch2.css" />
</head>


<body>
    <div class="contenars">

        <div class="logo">
            <h2>CarpooI<span>DZ...</span> </h2>
            <img class="imgicon" src="../img/user-interface.png" />
            <h5 id="userIcon"> </h5>

            <select class="select">
                <option checked></option>
                <option value="Register" id="Register">Register</option>
                <option value="log in">log in</option>
            </select>
        </div>

        <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="hm">Log in</h2>
                <form action="" method="post" id="loginForm">
                    <input class="inn" type="email" placeholder="  Email" id="email" name="email" required />
                    <br /><br />
                    <input class="inn" type="password" placeholder="  Password" id="password" name="password" required />
                    <br /><br />
                    <button name="buttonlogin" class="button" type="submit">Log in</button>
                </form>
            </div>
        </div>






        <img class="ww" src="../img/Screenshot 2024-04-06 175108.png">


        <div class="ASearch">
            <form action="" method="post" class="Search">
                <input required id="Departure" class="a" type="text" placeholder="  Departure  " name="Departure" />

                <input required id="Distination" class="a" type="text" placeholder="  Distination  " name="Distination" />

                <input placeholder="  Date" required id="Date" class="a" type="Date" name="Date" />

                <input required id="Passenger" class="a" type="number" placeholder="  Passenger  " min="1" max="8" name="Passenger" />

                <input id="button" class="a" value="Search" type="submit" name="button2" />
            </form>
        </div>









        <div class="content">

            <div class="left">


                <form id="sortForm" class="ss" method="post">
                    <h2>Sort by :</h2>
                    <div>
                        <input id="c1" type="radio" name="sort" value="price" onclick="sortResults()">
                        <label for="c1">Lowest price </label>
                        <br>
                        <input id="c2" type="radio" name="sort" value="fastest" onclick="sortResults()">
                        <label for="c2">Fastest route</label>
                        <br>
                        <input id="c3" type="radio" name="sort" value="early" onclick="sortResults()">
                        <label for="c3">Early departure</label>
                    </div>
                </form>

                <br><br>
                <hr>

                <br><br>

                <form class="ss" method="post" action="">
                    <h2> Filters:</h2>
                    <nav>
                        <input id="directRoute" type="checkbox" name="directRoute" onchange="applyFilters()">
                        <label for="directRoute">Direct route</label>
                    </nav>

                    <nav>
                        <input id="noSmoking" type="checkbox" name="noSmoking" onchange="applyFilters()">
                        <label for="noSmoking">No Smoking</label>
                    </nav>

                    <nav>
                        <input id="certifiedDrive" type="checkbox" name="certifiedDriver" onchange="applyFilters()">
                        <label for="certifiedDrive">Certified driver</label>
                    </nav>

                </form>





            </div>



            <div class="right" id="tripResults">



                <?php

                $c = mysqli_connect("localhost", "root", "", "mini_project");
                if (!$c) {
                    die("Connection failed: " . mysqli_connect_error());
                }




                $Departure = $_POST["Departure"];
                $Distination = $_POST["Distination"];
                $date = $_POST["Date"];
                $Passenger = $_POST["Passenger"];



                $sql = "SELECT * FROM trip WHERE DepartureLocation='$Departure' AND ArrivalLocation='$Distination' AND DepartureDate='$date' AND AvailableSeats >= '$Passenger' ";




                $result = mysqli_query($c, $sql);




                if ($result && mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {



                        echo '<div class="box">';
                        echo '<div class="top">';
                        echo '<div>';
                        echo '<span>' . $row['DepartureTime'] . '</span><br>';
                        echo '<span>' . $row['AccessTime'] . '</span>';
                        echo '</div>';

                        echo "<img src='../img/Screenshot 2024-04-02 174021.png' />";
                        echo '<div class="vsp">';
                        echo '<span>' . $row['DepartureLocation'] . '</span><br><br>';
                        echo '<span>' . $row['ArrivalLocation'] . '</span>';
                        echo '</div>';



                        $driver_id = $row['DriverID'];
                        $sql2 = "SELECT * FROM driver WHERE DriverID='$driver_id'";
                        $result2 = mysqli_query($c, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);


                        echo '<div class="img3">';
                        if ($row2['DirectRoute']) {
                            echo '<img class="img" id="imgDirectroute" src="../img/icons8-route-50.png">';
                        }
                        if ($row2['NoSmoking']) {
                            echo '<img class="img" id="imgnosmoking" src="../img/icons8-no-smoking-64.png">';
                        }
                        if ($row2['CertifiedDriver']) {
                            echo '<img class="img" id="imgCertifieddriver" src="../img/icons8-driver-license-50.png">';
                        }
                        echo '</div>';






                        echo '</div>';
                        echo '<div class="under">';
                        echo "<img class='imgbus' src='../img/delivery-truck.png'>";
                        echo '<span>' . $row2['Driver Name'] . '</span>';
                        echo '<span>' . $row['Price'] . '</span>';


                        echo '<form action="page3.php" method="post">';
                        echo '<input type="hidden" name="departureTime" value="' . $row['DepartureTime'] . '">';
                        echo '<input type="hidden" name="arrivalTime" value="' . $row['AccessTime'] . '">';

                        echo '<input type="hidden" name="TripID" value="' . $row['TripID'] . '">';

                        echo '<input type="hidden" name="departureLocation" value="' . $row['DepartureLocation'] . '">';
                        echo '<input type="hidden" name="arrivalLocation" value="' . $row['ArrivalLocation'] . '">';
                        echo '<input type="hidden" name="price" value="' . $row['Price'] . '">';
                        echo '<input type="hidden" name="Drivername" value="' . $row2['Driver Name'] . '">';
                        echo '<input type="hidden" name="nomberphone" value="' . $row2['Phone Number'] . '">';

                        echo '<input type="hidden" name="imgDirectRoute" value="' . $row2['DirectRoute'] . '">';
                        echo '<input type="hidden" name="imgNoSmoking" value="' . $row2['NoSmoking'] . '">';
                        echo '<input type="hidden" name="imgCertifiedDriver" value="' . $row2['CertifiedDriver'] . '">';



                        echo '<button type="submit" class="box3"> Show details</button>';
                        echo '</form>';


                        echo '</div>';
                        echo '</div>';
                    }
                }

                ?>



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
<script src="../Javasecript/pageSearch2.js"></script>
<?php




if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    echo "<script>document.getElementById('userIcon').innerText = '$name';</script>";
}



?>


</html>
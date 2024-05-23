<?php
session_start();


$c = mysqli_connect("localhost", "root", "", "mini_project");

if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

$departureTime = isset($_POST["departureTime"]) ? $_POST["departureTime"] : "";
$arrivalTime = isset($_POST["arrivalTime"]) ? $_POST["arrivalTime"] : "";
$departureLocation = isset($_POST["departureLocation"]) ? $_POST["departureLocation"] : "";
$arrivalLocation = isset($_POST["arrivalLocation"]) ? $_POST["arrivalLocation"] : "";
$price = isset($_POST["price"]) ? $_POST["price"] : "";
$Drivername = isset($_POST["Drivername"]) ? $_POST["Drivername"] : "";
$nomberphone = isset($_POST["nomberphone"]) ? $_POST["nomberphone"] : "";

$imgDirectRoute = isset($_POST["imgDirectRoute"]) ? $_POST["imgDirectRoute"] : "";
$imgNoSmoking = isset($_POST["imgNoSmoking"]) ? $_POST["imgNoSmoking"] : "";
$imgCertifiedDriver = isset($_POST["imgCertifiedDriver"]) ? $_POST["imgCertifiedDriver"] : "";




$_SESSION["Trip"] = $_POST["TripID"];







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./automobile-1845650_1280.jpg" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fast taxi</title>
    <link rel="stylesheet" href="../CSS/page3.css" />
</head>


<body>
    <div class="contenars">

        <div class="logo">
            <h2>Carpool<span class="spana">DZ...</span> </h2>
            <img class="imgicon" src="../img/user-interface.png" />

            <h5 id="userIcon"> </h5>

            <select class="select">
                <option></option>
                <option value="Register" id="Register">Register</option>
                <option value="log in">log in</option>
            </select>


        </div>




        <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="hm">Log in</h2>
                <form action="page3.php" method="post" id="loginForm">
                    <input class="inn" type="email" placeholder="  Email" id="email" name="email" required />
                    <br /><br />
                    <input class="inn" type="password" placeholder="  Password" id="password" name="password" required />
                    <br /><br />
                    <button class="button" type="submit">Log in</button>
                </form>
            </div>
        </div>








        <img class="ww" src="../img/Screenshot 2024-04-06 175108.png">




        <div class="content">


            <h2>Journey details</h2>
            <br>
            <div class="face">

                <div class="dd">
                    <img class="imgbus" src="../img/delivery-truck.png">
                    <span><?php echo $Drivername; ?></span>
                </div>



                <div class="box">


                    <div class="top">

                        <div> <span> <?php echo $departureTime; ?></span><br>

                            <span> <?php echo $arrivalTime;   ?></span>
                        </div>

                        <img class="imgfo" src="../img/Screenshot 2024-04-02 174021.png">

                        <div class="vsp">
                            <span><?php echo  $departureLocation;   ?></span> <br><br>
                            <span><?php echo  $arrivalLocation;   ?></span>

                        </div>


                    </div>

                    <div class="under">

                        <?php
                        if ($imgDirectRoute) {
                        echo '<img class="img" id="imgDirectroute" src="../img/icons8-route-50.png">';
                        }
                        if ($imgNoSmoking) {
                        echo '<img class="img" id="imgnosmoking" src="../img/icons8-no-smoking-64.png">';
                        }
                        if ($imgCertifiedDriver) {
                        echo '<img class="img" id="imgCertifieddriver" src="../img/icons8-driver-license-50.png">';
                        }

                        ?>



                        <span><?php echo $price;   ?></span>
                    </div>

                </div>

                <span>Options:</span>

            </div>





            <div class="undercontent">

                <div>

                    <form>
                        <label>Evaluation:</label>
                        <span class="zz">****</span>
                        <br>
                        <label>Experience:</label>
                        <span class="zz">7 ans</span>
                        <br>
                        <label>Categorie conduite:</label>
                        <span class="zz">Habitue</span>
                        <br>
                        <label>Annulation and retard:</label>
                        <span class="zz">2/10</span>
                        <br>
                        <label>Contacter the conducter:</label>
                        <span class="zz"><?php echo $nomberphone; ?></span>

                    </form>
                </div>


                <div>

                    <form action="./page8.php" method="post"><button class="button1" type="submit" name="button1">
                            Reservation request
                        </button></form>


                    <br><br> <br>
                    <br><br>
                    <button class="button2">
                        Return
                    </button>



                </div>



                <div class="text">
                    <p>
                        Interdit de fumer Conducteur certifie Trajet direct
                    </p>

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

<?php

if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    echo "<script>document.getElementById('userIcon').innerText = '$name';</script>";
}



?>






<script src="../Javasecript/page3.js"></script>

</html>
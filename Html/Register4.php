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
    <link rel="stylesheet" href="../CSS/Register4.css" />
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

                <h2>Registration</h2>
                <br>







                <form action="Register4.php" method="post" id="registrationForm">


                    <nav class="nav1">
                        <nav class="nav2">
                            <label for="passenger">Passenger</label>
                            <input class="oo" id="passenger" type="radio" name="a" value="passenger" checked>
                        </nav>

                        <nav class="nav3">
                            <label for="driver">Driver</label>
                            <input class="oo" id="driver" type="radio" name="a" value="driver">
                        </nav>

                    </nav>

                    <nav><input required type="text" placeholder="   Name " name="Name"></nav> <br>
                    <nav><input required type="text" placeholder="   Phone " name="Phone"></nav><br>
                    <nav> <input required type="email" placeholder="  email " name="email"></nav><br>
                    <nav><input required type="password" placeholder="   Password" name="Password"></nav><br>


                    <nav id="driverFields" style="display:none;">
                        <input id="Date of Birth" type="date" placeholder="Date of Birth" name="Date of Birth"><br><br>
                        <input id="Gender" type="text" placeholder="Gender" name="Gender"><br><br>
                        <input id="Date of obtaining driving license" type="date" placeholder="Date of obtaining driving license" name="Date of obtaining driving license"><br><br>
                        <nav id="ch">
                            <label><input class="che" type="checkbox" name="DirectRoute" value="1"> Direct Route</label>
                            <label><input class="che" type="checkbox" name="NoSmoking" value="1"> No Smoking</label>
                            <label><input class="che" type="checkbox" name="CertifiedDriver" value="1"> Certified Driver</label>
                        </nav>
                        <br>
                    </nav>


                    <nav class="su"><input class="R" type="submit" value="Register" name="button"></nav><br>


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

<?php




$c = mysqli_connect("localhost", "root", "", "mini_project");

if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["button"])) {
    if ($_POST["a"] === "passenger") {
        if (isset($_POST["Name"]) && isset($_POST["Phone"]) && isset($_POST["email"]) && isset($_POST["Password"])) {
            $name = $_SESSION["name"] = $_POST["Name"];
            $phone = $_SESSION["Phone"] = $_POST["Phone"];
            $email = $_SESSION["email"] = $_POST["email"];
            $password = $_POST["Password"];
            $sql = "INSERT INTO `user` (`User Name`, `Phone number`, `Email`, `Password`) VALUES ('$name', '$phone', '$email', '$password')";
            if (mysqli_query($c, $sql)) {
                header("Location: page8.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($c);
            }
        }
    } elseif ($_POST["a"] === "driver") {
        if (isset($_POST["Name"]) && isset($_POST["Phone"]) && isset($_POST["email"]) && isset($_POST["Password"]) && isset($_POST["Date_of_Birth"]) && isset($_POST["Gender"]) && isset($_POST["Date_of_obtaining_driving_license"])) {
            $name2  = $_POST["Name"];
            $phone2 = $_SESSION["Phone2"] = $_POST["Phone"];
            $email2 = $_POST["email"];
            $password2 =  $_POST["Password"];
            $dob  = $_POST["Date_of_Birth"];
            $gender = $_POST["Gender"];
            $license_date = $_POST["Date_of_obtaining_driving_license"];

            $direct_route = isset($_POST["DirectRoute"]) ? 1 : 0;
            $no_smoking = isset($_POST["NoSmoking"]) ? 1 : 0;
            $certified_driver = isset($_POST["CertifiedDriver"]) ? 1 : 0;


            $sql = "INSERT INTO `driver` (`Driver Name`, `Phone Number`, `Email`, `Password`, `Date of Birth`, `Gender`, `Driver's License Issue Date`, `DirectRoute`, `NoSmoking`, `CertifiedDriver`) VALUES ('$name2', '$phone2', '$email2', '$password2', '$dob', '$gender', '$license_date','$direct_route', '$no_smoking', '$certified_driver')";
            if (mysqli_query($c, $sql)) {

                $sql2 = "SELECT * FROM driver WHERE Email='$email2' AND Password='$password2'";
                $res = mysqli_query($c, $sql2);
                if ($res->num_rows == 1) {
                    $row2 = mysqli_fetch_assoc($res);
                    $_SESSION["DriverID"] = $row2['DriverID'];
                }
                header("Location: page5.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($c);
            }
        }
    }
}

mysqli_close($c);






?>










<script src="../Javasecript/Register4.js"></script>

</html>
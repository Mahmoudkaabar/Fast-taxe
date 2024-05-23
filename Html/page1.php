<?php
session_start();


$c = mysqli_connect("localhost", "root", "", "mini_project");

if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST["buttonlogin"])) {
    $username = $_POST['email'];
    $password = $_POST['password'];



    $sql = "SELECT * FROM user WHERE Email='$username' AND Password='$password'";
    $res = mysqli_query($c, $sql);

   
                     //  mysqli_query($c, $query) ربط sql بقاعدة البيانات

    
        if ($res->num_rows > 0) {                    // num_rowعدد الصفوف المسترجعة    or ($result && mysqli_num_rows($result) > 0)
            $row = mysqli_fetch_assoc($res);                 //s mysqli_fetch_assoc($result)   queryجلب الصف المسترجع من 4
            $name = $row['User Name'];
            $UserID = $row['UserID'];
            $_SESSION["name"] = $name;
            $_SESSION["UserID"] = $UserID;

            $_SESSION["name"] = $name;

        } else {

        $s = "SELECT * FROM driver WHERE Email='$username' AND Password='$password'";
        $r = mysqli_query($c, $s);

        if ($r->num_rows == 1) {
            $row2 = mysqli_fetch_assoc($r);
            $_SESSION["Phone2"] = $row2['Phone Number'];
            $_SESSION["DriverID"] = $row2['DriverID'];
            header("Location:page5.php");
            exit();
        }
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
    <link rel="stylesheet" href="../CSS/Home.css" />
</head>

<body>
    <div class="contenars">
        <div class="logo">
            <h2>Carpool<span>DZ...</span></h2>

            <img class="imgicon" src="../img/user-interface.png" />
            <h5 id="userIcon"> </h5>
            


            <select class="select">
                <option></option>
                <option value="Register" id="Register">Registe</option>
                <option value="log in" id="login">log in</option>
            </select>
        </div>

        <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="hm">Log in</h2>
                <form action="./page1.php" method="post" id="loginForm">
                    <input class="inn" type="email" placeholder="  Email" id="email" name="email" required />
                    <br /><br />
                    <input class="inn" type="password" placeholder="  Password" id="password" name="password" required />
                    <br /><br />
                    <button name='buttonlogin' class="button" type="submit">Log in</button>
                </form>
            </div>
        </div>

        <img class="ww" src="../img/Screenshot 2024-04-06 175108.png" />

        <div class="ASearch">
            <form action="pageSearch2.php" method="post" class="Search">
                <input required id="Departure" class="a" type="text" placeholder="  Departure  " name="Departure" />

                <input required id="Distination" class="a" type="text" placeholder="  Distination  " name="Distination" />

                <input placeholder="  Date" required id="Date" class="a" type="Date" name="Date" />

                <input required id="Passenger" class="a" type="number" placeholder="  Passenger  " min="1" max="8" name="Passenger" />

                <input id="button" class="a" value="Search" type="submit" name="button1" />
            </form>
        </div>

        <div class="content">
            <div class="left">
                <img class="imgleft" src="../img/front-3-4.webp" />
                <br />
                <p>
                    We take the time to get to know our members and our partner bus
                    companies. We check reviews, profiles and IDs. So you know who you
                    are going to travel with
                </p>
                <br />
                <h2>Go everywhere with us !</h2>
            </div>

            <div class="right">
                <nav class="xxx">
                    <img class="img" src="../img/1.png" />

                    <p>I was looking for a service capable of offering trips!</p>
                </nav>

                <br />
                <br />
                <nav class="xxx">
                    <p>
                        I was looking for a service capable of offering trips from several
                        companies!
                    </p>
                    <img class="img" src="../img/2.png" />
                </nav>

                <br />
                <br />
                <nav class="xxx">
                    <img class="img" src="../img/3.png" />
                    <p class="resce">
                        << looking for a service capable of offering trips from several companies>>
                    </p>
                </nav>
            </div>
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
                    <li><a href="">Send a message</a></li>
                    <li><a href="">Who are we</a></li>
                </ul>
            </nav>

            <nav>
                <h3>miscellaneous information:</h3>
                <ul>
                    <li>our partners</li>
                    <li>our regional headquarters</li>
                </ul>
            </nav>
        </div>
    </div>


    <?php
    if (isset($name)) {
        
        echo "<script>document.getElementById('userIcon').innerText = '$name';</script>";
    }
    
    
    ?>


    <script src="../Javasecript/home.js"></script>
</body>

</html>
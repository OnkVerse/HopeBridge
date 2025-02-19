<?php

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$desc = $_POST["desc"];


if ($_POST["type"] == "Education") {

    $code = 1;
} else if ($_POST["type"] == "Health") {
    $code = 2;
} else {
    $code = 3;
}

$con = new mysqli('localhost', 'root', '', 'charity');

if ($con->connect_error) {
    die("Connection Failed : " . $conn->connect->error);
} else {
    $stmt = $con->prepare("insert into request(fname,  lname, description,code) values(?, ?, ?,?)");
    $stmt->bind_param("sssi", $fname,  $lname, $desc, $code);
    $stmt->execute();

    $stmt->close();
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Stylish&family=Zen+Antique&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">

    <title>Request</title>

    <style>
        .head {
            height: 60px !important;
        }

        hr {
            position: relative;
            left: 25%;
        }
    </style>
</head>


<body>

    <nav id="#navbar" class="navbar navbar-expand-lg bg-white py-0 fixed-top">
        <div class="container">
            <a href="../../index.html" class="navbar-brand text-dark logo">
                Charity
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="assets/html/about.html" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="assets/html/donateEdu.php" class="nav-link">Donate</a>
                        <div class="">
                            <ul class="hidden">
                                <li>
                                    <a href="../html/donateEdu.php">Education</a>
                                </li>
                                <li>
                                    <a href="../html/donateHealth.php">Health</a>
                                </li>
                                <li>
                                    <a href="../html/donateConst.php">Construction</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="../html/request.php" class="nav-link">Request Donation</a>
                    </li>

                    <li class="nav-item">
                        <a href="../html/view.php" class="nav-link">View Donations</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



<br> <br>
<h5 class="text-center">The full request is the following:</h5>




    <section class="mt-3">
        <div class="container">

            <p><?php
                $name1 = ucfirst($fname);
                $name2 = ucfirst($lname);
                echo $name1 . ' ' . $name2 . ' has requested donation for charity of type ' .  $_POST['type'];
                echo "<br>";
                echo 'description: ' . $desc;
                ?></p>

        </div>

    </section>

    <div class="container">
        <a href="../../index.html" class="text-danger">Return To main page</a>
    </div>








    

    <script src="../js/script.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</body>

</html>
</body>

</html>
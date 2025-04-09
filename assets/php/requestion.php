<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $con = new mysqli('localhost', 'root', '', 'charity');
    if ($con->connect_error) {
        die("Connection Failed: " . $con->connect_error);
    }

    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $mob = $_POST["mob"];
    $address = $_POST["address"];
    $amount = $_POST["amount"];
    $desc = $_POST["desc"];

    // Determine request type code
    $type = $_POST["type"];
    switch ($type) {
        case "Education":
            $code = 1;
            break;
        case "Health":
            $code = 2;
            break;
        default:
            $code = 3;
    }

    // Handle file upload
    $imageName = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "uploads/"; // Ensure this directory exists and has write permissions
        $imageName = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $imageName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ["jpg", "jpeg", "png", "pdf"];
        if (in_array($fileType, $allowedTypes)) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                die("Error uploading file.");
            }
        } else {
            die("Invalid file format. Only JPG, JPEG, PNG, and PDF allowed.");
        }
    }


    // Prepare and execute SQL statement
    $stmt = $con->prepare("INSERT INTO request (fname, lname, email, mob, address,amount, description, code, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssis", $fname, $lname, $email, $mob, $address,$amount, $desc, $code, $imageName);

    if ($stmt->execute()) {
        echo "Form submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

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
            <a href="../../index.php" class="navbar-brand text-dark logo">
                Charity
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="assets/html/about.php" class="nav-link">About us</a>
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
        <p>We'll Notify you via <b>email/Mobile number</b>, when your request approved!</p>
        <p>Thank you!</p>

        </div>

    </section>

    <div class="container">
        <a href="../../index.php" class="text-danger">Return To main page</a>
    </div>










    <script src="../js/script.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</body>

</html>
</body>

</html>
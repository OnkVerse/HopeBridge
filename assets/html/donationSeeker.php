<!DOCTYPE html>
<html lang="en">
<?php
// Database connection
$con = new mysqli('localhost', 'root', '', 'charity');

if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $phone = $con->real_escape_string($_POST['phone']);
    $reason = $con->real_escape_string($_POST['reason']);

    $sql = "INSERT INTO help_requests (name, email, phone, reason) VALUES ('$name', '$email', '$phone', '$reason')";

    if ($con->query($sql) === TRUE) {
        $success = "Your request has been submitted successfully!";
    } else {
        $error = "Error: " . $con->error;
    }
}

$con->close();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Stylish&family=Zen+Antique&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/indexStyle.css">

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
                        <a href="about.php" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="donateEdu.php" class="nav-link">Donate</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Request Donation</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Write the complete decription for your request</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
                    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reason for Help</label>
                            <textarea name="reason" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <footer>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-6">
                    <h5>Contact us</h5>
                    <hr>
                    <p>Phone number: +971 78947084</p>
                    <p>Email: charityforeveryone@gmail.com</p>
                </div>
                <div class="col-lg-6" style="border-left: 1px solid grey;">
                    <h5>Social media</h5>
                    <div class="social mt-5">
                        <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</body>

</html>
</body>

</html>
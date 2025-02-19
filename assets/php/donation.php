<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$phoneNumber = $_POST['phoneNumber'];
$cname = $_POST['cname'];




if ($cname == "blissic") {
    $char_id = 3;
} else if ($cname == "heroic") {
    $char_id = 4;
} else if ($cname == "constructex") {
    $char_id = 5;
} else if ($cname == "constructzilla") {
    $char_id = 6;
} else if ($cname == "educatry") {
    $char_id = 1;
} else {
    $char_id = 2;
}





$conn = new mysqli('localhost', 'root', '', 'charity');

if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect->error);
} else {
    $stmt = $conn->prepare("insert into donation(firstName, lastName, amount, phoneNumber, email, charity_id) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiisi", $firstName, $lastName, $amount, $phoneNumber, $email, $char_id);
    $stmt->execute();
    $stmt->close();

    $conn->close();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3bd17392ca.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Stylish&family=Zen+Antique&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <title>
        Payment
    </title>
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
                        <a href="../html/about.html" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="../html/donateEdu.php" class="nav-link">Donate</a>
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

    <div class="section-3">
    </div>

    <section class="mt-3 mb-5">
        <h1 class="text-dark  mt-3" style="text-align:center">Payments</h1>

        <div class="container">
            <form method="POST" action="../php/payment.php">
                <div class="form-group row">
                    <div class="form-group row">
                        <label for="">
                            Card Number
                            <input id="cnum" type="number" class="form-control form-control-lg" name="c_num">

                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="">
                            Security code
                            <input id="sec" class="form-control form-control-lg" type="number" name="sec_code">

                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="">
                            Name on card
                            <input id="sec" class="form-control form-control-lg" type="text" name="name_on_card">
                        </label>
                    </div>
                </div>

                <br>

                <div class="form-group row ">
                    <div class="form-group row ">
                        <label for="">
                            Expiry date
                            <input type="date" name="date">
                        </label>
                    </div>

                    <div class="form-group row">
                        <label for="">
                            Card Type
                            <select name="type" id="">
                                <?php
                                $con = mysqli_connecT('localhost', 'root', '', 'charity');
                                $query = 'SELECT * from type_payment';
                                $result = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value <?php echo '=' . $row['description_p'] . '' ?>> <?php echo $row['description_p'] ?></option>


                                <?php
                                }
                                ?>



                            </select>
                        </label>
                    </div>

                    <div class="form-group row">
                        <label for="">
                            Currency
                            <select name="currency" id="">
                                <?php
                                $con = mysqli_connecT('localhost', 'root', '', 'charity');
                                $query = 'SELECT * from currency';
                                $result = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value <?php echo '=' . $row['description_c'] . '' ?>> <?php echo $row['description_c'] ?></option>


                                <?php
                                }
                                ?>




                            </select>
                        </label>
                    </div>
                </div>



                <button id="submit" class="btn btn-danger mt-2" type="submit">Make payment</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container-fluid">
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
                        <a href="https://www.facebook.com" target="_blank"><i class="fa-brand fa-facebook"></i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
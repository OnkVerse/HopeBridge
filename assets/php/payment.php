<?php
$cardNum = $_POST['c_num'];
$SecCode = $_POST['sec_code'];
$nameOnCard = $_POST['name_on_card'];
$ExpiryDate = $_POST['date'];
$type = $_POST['type'];
$currency = $_POST['currency'];

$date = "" . $ExpiryDate;

if ($type == "Credit") {
    $code = 1;
} else if ($type == "Debit") {
    $code = 2;
} else {
    $code = 3;
}

if ($currency == "USD") {
    $cCurrency = 1;
} else if ($currency == "LBP") {
    $cCurrency = 2;
} else {
    $cCurrency = 3;
}



$conn = new mysqli('localhost', 'root', '', 'charity');

if ($conn->connect_error) {
    die("Could not connect");
} else {
    $query  = 'SELECT * FROM donation ';
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $dId = $row['id'];
        echo $dId;
    }

    $stmt = $conn->prepare("INSERT into payment(card_num, sec_code, name_on_card, e_date, code_type,codeCurrency, donation_id) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissiii", $cardNum, $SecCode, $nameOnCard, $date, $code, $cCurrency, $dId);
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
                        <a href="../html/about.php" class="nav-link">About us</a>
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
                        <a href="../html/request.html" class="nav-link">Request Donation</a>
                    </li>

                    <li class="nav-item">
                        <a href="../html/view.php" class="nav-link">View Donations</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>

    <div class="container mt-3">
        <h6>Your contributions have been assigned. The report is the following: </h6>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'charity');

            $query = 'SELECT donation.id, donation.firstName, donation.lastName, donation.amount, charity.c_name from donation 
            INNER JOIN charity
            ON donation.charity_id = charity.id
            ';
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                
                    <h6 class="text-secondary"><?php
                    if($row['id'] == $dId)
                            echo $row['firstName'] . ' ' . $row['lastName'] . ' has donated ' . $row['amount'] . '' . $currency . ' to charity '.$row['c_name'];
                        ?> </h6>
                
            <?php
            }

            ?>

        
    </div>
    <div class="container">
        <a href="../../index.php" class="text-danger">Return To main page</a>
    </div>

</body>

</html>
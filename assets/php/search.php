<?php
include '../php/connection.php'
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

    <title>Search</title>


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
                        <a href="../html/request.php" class="nav-link">Request Donation</a>
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
    <br>
    <br>



    <div class="container mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope='col'> first Name </th>
                    <th scope='col'> last Name </th>
                    <th scope='col'>    Amount</th>
                    <th scope='col'>    Charity</th>
                </tr>
            </thead>

            <?php
            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($con, $_POST['search']);
                $query = "SELECT donation.firstName, donation.lastName, donation.amount, charity.c_name 
                    FROM donation INNER JOIN charity ON donation.charity_id = charity.id WHERE donation.firstName LIKE '%$search%' ";
                $result2 = mysqli_query($con, $query);
                $queryResults = mysqli_num_rows($result2);

                echo "There are " . $queryResults . " result(s) for this search.";

                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {
                        echo

                        "         

                    
                    <tbody>
                    <tr>
                    <th scope='col'>" . $row['firstName'] . "</th>
                    <th scope='col'>" . $row['lastName'] . "</th>
                    <th scope='col'>" . $row['amount'] . "</th>
                    <th scope='col'>" . $row['c_name'] . "</th>
                    </tr>
                </tbody>";
            }
        } else {
            echo "There are no results matching your search";
        }
    }
    ?>
    </table>
    </div>

</body>
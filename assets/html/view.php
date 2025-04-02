
<?php
    include '../php/connection.php';
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

    <title>View Donations</title>
    <style>

    </style>
</head>
<style>

</style>
<body>
    <nav id="#navbar" class="navbar navbar-expand-lg bg-white py-0 fixed-top">
        <div class="container">
            <a href="" class="navbar-brand text-dark logo">
             <?php
                session_start(); // Start the session
                echo isset($_SESSION["admin_name"]) ? "Welcome, " . htmlspecialchars($_SESSION["admin_name"])."!" : "Admin Portal";
             ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a href="insert.php" class="nav-link">Add Donantion</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">View Donations</a>
                    </li>
                    <li class="nav-item">
                        <a href="showrequests.php" class="nav-link">Donor Requests</a>
                    </li>
                      <li class="nav-item">
                        <a href="studentRequest.php" class="nav-link">Student Request's</a>
                    </li>

                    <li class="nav-item">
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <a href="logout.php" class="nav-link"
                        style="border-radius: 20px;color: white !important; background-color: #DC2626; padding: 8px 15px; text-align: center; text-decoration: none; display: inline-block;">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="assets/html/adminlogin.php" class="nav-link"
                        style="border-radius: 20px;color: white !important; background-color: #16A34A; padding: 8px 15px; text-align: center; text-decoration: none; display: inline-block;">
                            Login
                        </a>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2 class="text-center mt-5" style="color:#3E7B27;">Donation list</h2>


    <div class="mt-5 container">
        <form action="../php/search.php" method="POST">
            <input type="search" name="search" placeholder="Search for a placeholder" method="POST">
            <input type="submit" class="btn btn-danger" name="submit-search">
        </form>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Charity</th>
                </tr>
            </thead>
            <?php
            $query = 'SELECT donation.firstName, donation.lastName, donation.amount, charity.c_name
                    FROM donation INNER JOIN charity ON donation.charity_id = charity.id';
            $result2 = mysqli_query($con, $query);
            $queryResults = mysqli_num_rows($result2);

            if($queryResults > 0){
            while ($row = mysqli_fetch_array($result2)) {



                    ?>

            <tr>

                <td><?php

                echo $row['firstName']
                ?> </td>
                                    <td><?php

                echo $row['lastName']
                ?> </td>
                                    <td><?php

                echo $row['amount']
                ?> </td>
                                    <td><?php

                echo $row['c_name']
                ?> </td>
                </tr>
                <?php

        }
    }
        ?>
        </table>
    </div>

</body>

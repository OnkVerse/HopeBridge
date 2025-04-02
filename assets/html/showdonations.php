
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
        /* Make the table responsive */
.table-container {
    width: 100%;
    overflow-x: auto; /* Enables horizontal scrolling */
}

/* Style the table to fit within the container */
.table {
    width: 100%;
    border-collapse: collapse; /* Ensures no extra spacing */
    white-space: nowrap; /* Prevents text wrapping */
}

/* Optional: Improve table readability */
.table th, .table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd; /* Adds subtle border */
}

.table th {
    background-color:rgb(0, 68, 16); /* Dark header */
    color: white;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2; /* Alternating row color */
}

/* Ensure the button remains visible and usable */
.send-email-btn {
    padding: 8px 16px;
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: 0.3s;
}

.send-email-btn:hover {
    background-color: #218838;
}

/* Ensure responsiveness on smaller screens */
@media (max-width: 768px) {
    .table th, .table td {
        font-size: 14px; /* Reduce font size for small screens */
        padding: 8px;
    }

    .send-email-btn {
        font-size: 12px;
        padding: 6px 12px;
    }
}

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
                        <a href="assets/html/about.php" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="assets/html/donateEdu.php" class="nav-link">Donate</a>

                    </li>
                    <li class="nav-item hov">
                        <a href="showdonations.php" class="nav-link">View donations</a>
                    </li>

                    <li class="nav-item">
                        <a href="request.php" class="nav-link">Request Donation</a>
                    </li>

                    <li class="nav-item">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="assets/html/logout.php" class="nav-link"
                        style="border-radius: 20px;color: white !important; background-color: #DC2626; padding: 8px 15px; text-align: center; text-decoration: none; display: inline-block;">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="assets/html/login.php" class="nav-link"
                        style="border-radius: 20px;color: white !important; background-color: #16A34A; padding: 8px 15px; text-align: center; text-decoration: none; display: inline-block;">
                            Login
                        </a>
                    <?php endif; ?>
                    </li>
                </ul>
        </div>
    </nav>  <nav id="#navbar" class="navbar navbar-expand-lg bg-white py-0 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand text-dark logo">
                Charity
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item hov">
                        <a href="showdonations.php" class="nav-link">View donations</a>
                    </li>

                    <li class="nav-item">
                        <a href="request.php" class="nav-link">Request Donation</a>
                    </li>

                    <li class="nav-item">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="nav-link"
                        style="border-radius: 20px;color: white !important; background-color: #DC2626; padding: 8px 15px; text-align: center; text-decoration: none; display: inline-block;">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="nav-link"
                        style="border-radius: 20px;color: white !important; background-color: #16A34A; padding: 8px 15px; text-align: center; text-decoration: none; display: inline-block;">
                            Login
                        </a>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <h2 class="text-center mt-5" style="color:#3E7B27;">Recieved Requests</h2>




    <?php
// Database connection
$servername = "localhost";
$username = "root"; // Change if different
$password = ""; // Change if set
$database = "charity"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the Donations table
$sql = "SELECT * FROM Donations";
$result = $conn->query($sql);
?>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            background-color:rgb(0, 178, 41);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color:rgb(0, 204, 54);
        }
    </style>


<table>
    <tr>
        <th>Donation ID</th>
        <th>Charity Name</th>
        <th>Charity Info</th>
        <th>Mobile No</th>
        <th>Address</th>
        <th>Donation Amount</th>
        <th>Request</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['donation_id']}</td>
                    <td>{$row['charity_name']}</td>
                    <td>{$row['charity_info']}</td>
                    <td>{$row['mobile_no']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['donation_amount']}</td>
                    <td><a href='request.php' class='btn' target='_blank'>Request</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
    $conn->close();
    ?>

</table>

</body>
</html>


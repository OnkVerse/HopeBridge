
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
                        <a href="insert.php" class="nav-link">Add Donantion</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">View Donations</a>
                    </li>
                    <li class="nav-item">
                        <a href="showrequests.php" class="nav-link">Show Requests</a>
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

    <h2 class="text-center mt-5" style="color:#3E7B27;">Recieved Requests</h2>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "charity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, phone, reason FROM help_requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div style='padding: 20px;'>";
    echo "<h2 style='text-align: center; color:rgb(12, 64, 0);'>Help Requests</h2>";
    echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #f9f9f9;'>";
    echo "<tr style='background-color:rgb(0, 111, 31); color: white;'>
            <th style='padding: 10px; border: 1px solid #ddd;'>ID</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>Name</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>Email</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>Phone</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>Reason</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr style='border: 1px solid #ddd;'>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["id"] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["name"] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["email"] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["phone"] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["reason"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "<p style='text-align: center; color: red;'>No requests found</p>";
}

$conn->close();
?>
    </tbody>
</table>

<?php mysqli_close($con); ?>


</body>

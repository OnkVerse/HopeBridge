
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
                        <a href="view.php" class="nav-link">View Donations</a>
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

    <h2 class="text-center mt-5" style="color:#3E7B27;">Recieved Requests</h2>



    <?php
$con = mysqli_connect('localhost', 'root', '', 'charity');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM request";
$result = mysqli_query($con, $query);
?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Address</th>
            <th scope="col">Request Type</th>
            <th scope="col">Description</th>
            <th scope="col">Aadhaar Card</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['fname']); ?></td>
                <td><?php echo htmlspecialchars($row['lname']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['mob']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td><?php echo htmlspecialchars($row['code']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>

                  <td>
                    <img src="<?php echo $row['image']; ?>" alt="Aadhar Card" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                <td>
                    <form action="send_email.php" method="POST">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
                        <button type="submit" class="btn btn-success">Send Mail(VERIFIED)</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php mysqli_close($con); ?>


</body>

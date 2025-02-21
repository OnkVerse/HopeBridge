<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "charity";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_name = $_POST["c_name"];
    $title = $_POST["title"];
    $text_desc = $_POST["text_desc"];
    $code_type = $_POST["code_type"];

    // Handling file upload
    if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
        $img = file_get_contents($_FILES["img"]["tmp_name"]); // Read image as binary
    } else {
        echo "<script>alert('Error uploading image!');</script>";
        exit;
    }

    // Prepare SQL statement
    $sql = "INSERT INTO charity (c_name, img, title, text_desc, code_type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("bsssi", $c_name, $img, $title, $text_desc, $code_type);

    if ($stmt->execute()) {
        echo "<script>alert('Data inserted successfully!'); window.location.href='inse.php';</script>";
    } else {
        echo "<script>alert('Error inserting data!');</script>";
    }

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
<style>/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

/* Body Styling */
body {
    min-height: 100vh;
    background: linear-gradient(to right,rgb(112, 255, 73), #ffffff);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Container */
.container {
    background: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    transition: transform 0.3s ease;
}

.container:hover {
    transform: translateY(-3px);
}

/* Title */
h2 {
    color: #333;
    font-size: 26px;
    margin-bottom: 25px;
    text-align: center;
    font-weight: 700;
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

/* Labels */
label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-size: 15px;
    font-weight: 600;
}

/* Input & Textarea */
input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    background-color: #fafafa;
    transition: all 0.3s ease;
}

input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 2px dashed #d0d0d0;
    border-radius: 8px;
    cursor: pointer;
    background-color: #fafafa;
}

/* Textarea */
textarea {
    min-height: 120px;
    resize: vertical;
}

/* Focus Effects */
input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0px 0px 8px rgba(59, 130, 246, 0.3);
}

/* Submit Button */
input[type="submit"] {
    background: linear-gradient(to right,rgb(0, 183, 27),rgb(118, 255, 139));
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(to right,rgb(12, 185, 0),rgb(116, 255, 130));
}

/* Responsive */
@media (max-width: 480px) {
    .container {
        padding: 25px;
    }

    h2 {
        font-size: 22px;
    }

    input[type="submit"] {
        font-size: 14px;
    }
}

    </style>
<body>
    <div class="container">
        <h2>Insert Charity Data</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Charity Name:</label>
                <input type="text" name="c_name" required>
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input type="file" name="img" accept="image/*" required>
            </div>

            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea name="text_desc" required></textarea>
            </div>

            <div class="form-group">
                <label>Code Type:</label>
                <input type="number" name="code_type" required>
            </div>

            <input type="submit" value="Insert">
        </form>
    </div>
</body>
</html>

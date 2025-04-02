
<?php
//We have to create the mail server here.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $to = $_POST['email'];
    $subject = "Donation Opportunity";
    $message = "You can donate now.";
    $headers = "From: onkarsathe96k@gmail.com"; // Change to your email

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Email sent successfully!');</script>";
    } else {
        echo "<script>alert('Failed to send email, but it will still appear as sent.');</script>";
    }
}
?>

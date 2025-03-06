<!DOCTYPE html>
<html lang="en">
<?php
require 'env.php';
// Include the Razorpay PHP library
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Initialize Razorpay with your key and secret
$api_key = getenv('RAZORPAY_KEY');
$api_secret = getenv('RAZORPAY_SECRET');

$api = new Api($api_key, $api_secret);
// Create an order
$order = $api->order->create([
    'amount' => 9900, // amount in paise (100 paise = 1 rupee)
    'currency' => 'INR',
    'receipt' => 'order_receipt_12asa3'
]);
// Get the order ID
$order_id = $order->id;

// Set your callback URL
$callback_url = "http://localhost:8000/success.html";
?>

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

    <title>Donate</title>

    <style>

    </style>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function startPayment() {
            var amount = document.getElementById('validationServer03').value * 100; // Convert to paise
            
            if (!amount || amount < 100) {
                alert("Please enter a valid amount (minimum ₹1)");
                return;
            }

            // Create a new order using an AJAX request
            fetch("create_order.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ amount: amount })
            })
            .then(response => response.json())
            .then(data => {
                var options = {
                    key: "<?php echo $api_key; ?>",
                    amount: amount,
                    currency: "INR",
                    name: "Your Company Name",
                    description: "Donation Payment",
                    image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
                    order_id: data.order_id,
                    theme: { "color": "#738276" },
                    callback_url: "<?php echo $callback_url; ?>"
                };
                var rzp = new Razorpay(options);
                rzp.open();
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
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
                        <a href="../html/donateEdu.php" class="nav-link">Donate</a>
                        <div class="">
                            <ul class="hidden">
                                <li>
                                    <a href="../html/donateEdu.html">Education</a>
                                </li>
                                <li>
                                    <a href="../html/donateHealth.html">Health</a>
                                </li>
                                <li>
                                    <a href="../html/donateConst.html">Construction</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="../html/request.html" class="nav-link">Request Donation</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <section class="mt-5 mb-5">
        <div class="container">
            <form method="POST" action="../php/donation.php">
                <div class="col-md-3 mb-3 mt-3">

                    <h2> <?php
                            $cname = $_POST['id'];
                            echo $cname; ?></h2>
                    <input style="display:none" type="text" name="cname" value <?php echo '=' . $cname . '' ?>>


                </div>



                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer01">First name</label>
                        <input type="text" class="form-control" id="validationServer01" placeholder="First name" name=" firstName" required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer02">Last name</label>
                        <input type="text" class="form-control" id="validationServer02" placeholder="Last name" name=" lastName" required>

                    </div>

                 </div>
                 <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer03">Amount</label>
                        <input type="number" class="form-control " id="validationServer03" placeholder="Amount" name=" amount" required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer04">Email</label>
                        <input type="text" class="form-control" id="validationServer04" placeholder="Email" name=" email" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer05">Phone Number</label>
                        <input type="text" class="form-control " id="validationServer05" placeholder="Phone number" name=" phoneNumber" required>
                    </div>
                </div>
                <button class="btn btn-danger" type="button" onclick="startPayment()">Pay with Razorpay</button>
                <button class="btn btn-danger" type="submit">Donate</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></scrip>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>


</body>

</html>
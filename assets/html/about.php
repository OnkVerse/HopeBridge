<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3bd17392ca.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Stylish&family=Zen+Antique&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/indexStyle.css">

    <title>About us</title>

    <style>
        .yelow>h2 {
            color: white;
            font-size: 6em;
            text-align: center;
            margin: auto;
        }
    </style>
</head>



<body>


    <nav id="#navbar" class="navbar navbar-expand-lg bg-white py-0 fixed-top">
        <div class="container">
            <a href="../../index.php" class="navbar-brand text-dark logo">
                Charity
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="donateEdu.php" class="nav-link">Donate</a>
                        <div class="">
                            <ul class="hidden">
                                <li>
                                    <a href="donateEdu.html">Education</a>
                                </li>
                                <li>
                                    <a href="donateHealth.html">Health</a>
                                </li>
                                <li>
                                    <a href="donateConst.html">Construction</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="request.php" class="nav-link">Request Donation</a>
                    </li>

                    <li class="nav-item">
                        <a href="view.php" class="nav-link">View Donations</a>
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
        </div>
    </nav>


    <br> <br>


    <section class="back-3">
        <div class="yelow">
            <h2>About Us</h2>
        </div>
    </section>


    <section>
        <div class="container">
            <p class="lead p-5">
                We recognize the **unique value** of children in our community and the urgent need for infrastructure
                improvements in various regions. Our mission is to expand and enhance our services, making them more
                accessible to ensure a **better quality of life** for all.

                We are deeply concerned about the rising prevalence of **special needs** among children and young
                adults. Addressing this issue requires **immediate action** at multiple levels—including nurseries,
                schools, universities, and workplaces—to ensure that these individuals receive the **support and
                opportunities** needed to become active, contributing members of society.

                By fostering inclusivity and accessibility, we aim to create a **healthier, more productive, and
                compassionate community** for future generations.
            </p>
        </div>
    </section>

    <footer>
        <div class="container-fluid ">
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
                        <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            /* Every time the window is scrolled ... */
            $(window).scroll(function () {

                /* Check the location of each desired element */
                $('.card').each(function (i) {

                    var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                    var bottom_of_window = $(window).scrollTop() + $(window).height();

                    /* If the object is completely visible in the window, fade it it */
                    if (bottom_of_window > bottom_of_object) {

                        $(this).animate({
                            'opacity': '1'
                        }, 750);

                    }

                });

            });

        });
    </script>

</body>

</html>
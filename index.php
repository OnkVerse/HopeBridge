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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/indexStyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Stylish&family=Zen+Antique&display=swap"
        rel="stylesheet">
    <title>Charity</title>
</head>


<body>


    <nav id="#navbar" class="navbar navbar-expand-lg bg-white py-0 fixed-top">
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
                        <a href="assets/html/about.php" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="assets/html/donateEdu.php" class="nav-link">Donate</a>
                        <div class="">
                            <ul class="hidden">
                                <li>
                                    <a href="assets/html/donateEdu.php">Education</a>
                                </li>
                                <li>
                                    <a href="assets/html/donateHealth.php">Health</a>
                                </li>
                                <li>
                                    <a href="assets/html/donateConst.php">Construction</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="assets/html/request.php" class="nav-link">Request Donation</a>
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




    <section class="section-1">
        <div class="container-fluid text-center">
            <div class="header-text">
            <h1>
                <?php
                if (isset($_SESSION['user_id'])) {
                    if (isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])) {
                        echo "Welcome, " . $_SESSION['firstname'] . "! Start making a contribution";
                    } else {
                        echo "Welcome, " . $_SESSION['email'] . "! Start making a contribution";
                    }
                } else {
                    echo "Start making a contribution";
                }
                ?>
            </h1>
                <h5>
                    Be part of a number of people and start making a change in this world. Change someone's life for
                    better.
                </h5>
                <div class="btn btn-light text-light"> <a href="assets/html/donateEdu.php" style="text-decoration:none">
                        Donate</a></div>
            </div>
        </div>
    </section>


    <section class="py-3 align-items-center  section-2  ">
        <div class="container-fluid ">
            <h1 class="text-center">
                Our Center
            </h1>
            <div class="row">
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/men/14.jpg" alt="">
                    <h3>Varane James</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, consequuntur repellat esse et
                        deserunt quibusdam debitis provident. Iure, recusandae sint!</p>
                </div>
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/men/16.jpg" alt="">
                    <h3>Kevin Harden</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus accusamus voluptatum
                        soluta suscipit veniam? Earum minus aspernatur laborum! Repellendus, quia!</p>
                </div>
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="">
                    <h3>Anastasia lea</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam incidunt earum dolorum aut
                        fugiat. Culpa, autem? Accusantium animi asperiores velit.</p>
                </div>
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="">
                    <h3>Anastasia lea</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam incidunt earum dolorum aut
                        fugiat. Culpa, autem? Accusantium animi asperiores velit.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-3  ">

    </section>

    <section class="  mb-5">
        <div class="container ">
            <h2 class="text-center third_h2">Different ways you can help</h2>
            <div class="row g-4 mt-4">
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/img/medical.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Medical services</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="assets/html/donateEdu.php" class="btn btn-light">Go to Education</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/img/health.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Health Charities</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="assets/html/donateHealth.php" class="btn btn-light">Go to Health</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/img/construction.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Construction charities</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="assets/html/donateConst.php" class="btn btn-light">Go to Construction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-5   ">

    </section>

    <section class="py-5 ">
        <div class="container text-center ">
            <h2 class="text-center">
                You can also make a request for donation
            </h2>
            <p class="lead">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse itaque sed nam minima. Ullam qui corporis
                non consectetur deserunt aspernatur in, tempore maxime similique blanditiis praesentium quaerat neque
                alias incidunt voluptas, eaque perferendis itaque hic aut. Cum expedita possimus aliquam?
            </p>
            <div class="btn btn-danger "> <a href="assets/html/request.php" class="text-light">Request</a> </div>
        </div>
    </section>

    <section class="section-7"> </section>



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
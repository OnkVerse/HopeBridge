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
                    echo "This is an educational charity website.";
                }
                ?>
            </h1>
                <h5>
                Welcome to Charity NGO, an educatory charity where every action counts towards building a better future. Together, we work to make a meaningful difference in the lives of those in need. Join us in our mission to create lasting change through compassion, innovation, and collaboration. Thank you for being a part of this journey!
                </h5>
                <div class="btn btn-light text-light"> <a href="assets/html/donateEdu.php" style="text-decoration:none">
                        Donate</a></div>
            </div>
        </div>
    </section>

    <section class="ngo-introduction py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">Who We Are</h2>
                    <p class="lead">
                        Charity NGO is a non-profit organization dedicated to creating positive change through targeted initiatives in education, healthcare, and infrastructure development. Since our establishment, we've been committed to bridging gaps and building stronger communities.
                    </p>
                    <div class="mt-4">
                        <h4>Our Impact</h4>
                        <div class="row mt-3">
                            <div class="col-md-4 text-center">
                                <h3 class="text-success">1200+</h3>
                                <p>Students Supported</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h3 class="text-success">460+</h3>
                                <p>Medical Aids</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h3 class="text-success">80+</h3>
                                <p>Construction Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-vision">
                        <div class="mission mb-4 p-4 bg-light rounded">
                            <h4 class="text-success">Our Mission</h4>
                            <p>To empower communities through sustainable development initiatives, focusing on education, healthcare, and infrastructure improvements that create lasting positive change.</p>
                        </div>
                        <div class="vision p-4 bg-light rounded">
                            <h4 class="text-success">Our Vision</h4>
                            <p>A world where every individual has access to quality education, proper healthcare, and safe infrastructure, enabling them to live dignified lives and reach their full potential.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-3 align-items-center  section-2  ">
        <div class="container-fluid ">
            <h1 class="text-center">
                Our Key Employees
            </h1>
            <div class="row">
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/men/14.jpg" alt="">
                    <h3>John Doe</h3>
                    <p> John's expertise in project management and his dedication to delivering impactful results make him a cornerstone of our success. His leadership ensures every initiative runs smoothly and efficiently.</p>
                </div>
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="">
                    <h3>Mark Lee</h3>
                    <p> Mark’s expertise in fundraising and building partnerships is vital to the sustainability of our NGO. His dedication to securing resources allows us to continue providing essential support to those in need.</p>
                </div>
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="">
                    <h3>Jane Smith</h3>
                    <p>Jane’s strategic approach and creative thinking have been pivotal in expanding our NGO's reach and raising awareness. Her passion for social change inspires everyone to work towards a better tomorrow.</p>
                </div>
                <div class="col-lg-4">
                    <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="">
                    <h3>Anastasia lea</h3>
                    <p>Emily’s deep understanding of community needs and her innovative program development are critical to our NGO’s success. She ensures that our efforts are both impactful and aligned with the values we stand for.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-3  ">

    </section>

    <section class="  mb-5">
        <div class="container ">
            <h2 class="text-center third_h2">Different ways you can help</h2>
            <div class="d-flex justify-content-center">
                <div class="row g-4 mt-4">
                    <div class="col-lg-4">
                        <div class="card" style="width: 20rem;">
                            <img src="assets/img/medical.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Educational charities</h5>
                                <p class="card-text">Your donation to educational institutions helps provide quality education, resources, and opportunities to underprivileged students, empowering them to build a brighter future.</p>
                                <a href="assets/html/donateEdu.php" class="btn btn-light">Go to Education</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-5   ">

    </section>

        <!-- After "Different ways you can help" section -->
    <section class="section-5"></section>

    <!-- New Impact & Helped Requests Section -->
    <section class="impact-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #85A947">Our Impact & Success Stories</h2>

            <!-- Statistics Row -->
            <div class="row mb-5">
                <div class="col-md-3 text-center mb-4">
                    <div class="impact-card p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-hands-helping mb-3" style="font-size: 2.5rem; color: #85A947"></i>
                        <h3 class="counter" style="color: #85A947">2500+</h3>
                        <p class="text-muted">Total Requests Helped</p>
                    </div>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="impact-card p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-graduation-cap mb-3" style="font-size: 2.5rem; color: #85A947"></i>
                        <h3 class="counter" style="color: #85A947">1200+</h3>
                        <p class="text-muted">Education Requests</p>
                    </div>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="impact-card p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-heartbeat mb-3" style="font-size: 2.5rem; color: #85A947"></i>
                        <h3 class="counter" style="color: #85A947">800+</h3>
                        <p class="text-muted">Healthcare Requests</p>
                    </div>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="impact-card p-4 bg-white rounded shadow-sm">
                        <i class="fas fa-home mb-3" style="font-size: 2.5rem; color: #85A947"></i>
                        <h3 class="counter" style="color: #85A947">500+</h3>
                        <p class="text-muted">Construction Projects</p>
                    </div>
                </div>
            </div>

            <!-- Recent Success Stories -->
            <h3 class="text-center mb-4" style="color: #85A947">Recent Success Stories</h3>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="success-story p-4 bg-white rounded shadow-sm">
                        <div class="story-header mb-3">
                            <span class="badge bg-success mb-2">Education</span>
                            <h5 style="color: #85A947">School Building Project</h5>
                        </div>
                        <p class="text-muted">Successfully constructed a new school building in rural area, benefiting over 200 students with modern educational facilities.</p>
                        <div class="story-footer">
                            <small class="text-muted">Completed: January 2024</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="success-story p-4 bg-white rounded shadow-sm">
                        <div class="story-header mb-3">
                            <span class="badge bg-danger mb-2">Education</span>
                            <h5 style="color: #85A947">Medical Camp Initiative</h5>
                        </div>
                        <p class="text-muted">Organized free medical camps in underserved communities, providing healthcare services to over 1000 individuals.</p>
                        <div class="story-footer">
                            <small class="text-muted">Completed: March 2024</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="success-story p-4 bg-white rounded shadow-sm">
                        <div class="story-header mb-3">
                            <span class="badge bg-warning mb-2">Education</span>
                            <h5 style="color: #85A947">Community Center</h5>
                        </div>
                        <p class="text-muted">Built a multipurpose community center serving as a hub for educational programs and community gatherings.</p>
                        <div class="story-footer">
                            <small class="text-muted">Completed: February 2024</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->

        </div>
    </section>

    <style>
         .ngo-introduction {
            background-color: #f8f9fa;
        }

        .ngo-introduction h2 {
            color: #333;
            font-weight: 600;
        }

        .mission-vision {
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .mission, .vision {
            transition: transform 0.3s ease;
        }

        .mission:hover, .vision:hover {
            transform: translateY(-5px);
        }

        .text-success {
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .mission-vision {
                margin-top: 2rem;
            }
        .impact-card {
            transition: transform 0.3s ease;
            border: 1px solid rgba(133, 169, 71, 0.2);
        }

        .impact-card:hover {
            transform: translateY(-5px);
        }

        .success-story {
            transition: transform 0.3s ease;
            border: 1px solid rgba(133, 169, 71, 0.2);
            height: 100%;
        }

        .success-story:hover {
            transform: translateY(-5px);
        }

        .counter {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .badge {
            padding: 8px 12px;
            font-weight: 500;
        }

        .btn-success {
            background-color: #85A947;
            border-color: #85A947;
        }

        .btn-outline-success {
            color: #85A947;
            border-color: #85A947;
        }

        .btn-outline-success:hover {
            background-color: #85A947;
            color: white;
        }
    </style>
    <section class="py-5 ">
        <div class="container text-center ">
            <h2 class="text-center">
                If you are in need of donation, make a request here,
            </h2>
            <p class="lead">
            If you're in need of support, we’re here to help. Our donation program is designed to assist individuals and organizations facing challenges in medical, educational, or construction-related areas. Please submit your request through the form below, and our team will review it promptly. Together, we can work towards building a brighter future for all.
            </p>
            <div class="text-center mt-5">
                <h4 class="mb-4" style="color: #85A947">Want to Make a Difference?</h4>
                <div class="d-flex justify-content-center gap-3">
                    <a href="assets/html/donateEdu.php" class="btn btn-success px-4">Donate Now</a>
                    <a href="assets/html/request.php" class="btn btn-outline-success px-4">Request Help</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-7"> </section>



    <footer>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-6">
                    <h5>Contact us</h5>
                    <hr>
                    <p>Phone number: +91 70280 30015</p>
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
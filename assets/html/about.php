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
                                    <a href="donateEdu.php">Education</a>
                                </li>
                                <li>
                                    <a href="donateHealth.php">Health</a>
                                </li>
                                <li>
                                    <a href="donateConst.php">Construction</a>
                                </li>
                            </ul>
                        </div>
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


    <br> <br>


    <section class="back-3">
        <div class="yelow">
            <h2>About Us</h2>
        </div>
    </section>

    <!DOCTYPE html>
<html lang="en">

<head>
    <!-- [Previous head content remains the same] -->
    <style>
        .section-padding {
            padding: 20px 0;
        }

        .section-title {
            color: #85A947;
            margin-bottom: 40px;
            text-align: center;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: #85A947;
            margin: 15px auto;
        }

        .card-custom {
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border: 1px solid rgba(133, 169, 71, 0.2);
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .timeline-item {
            position: relative;
            padding-left: 40px;
            margin-bottom: 40px;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 2px;
            background: #85A947;
        }

        .timeline-item:after {
            content: '';
            position: absolute;
            left: -6px;
            top: 0;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #85A947;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #3E7B27;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
        }

        .achievement-card {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .partner-logo {
            height: 200px;
            object-fit: contain;
           
            transition: filter 0.3s ease;
            border-radius: 50%;
            border: 4px solid #3E7B27;
            border-radius: 50%;
            margin: 30px;
        }

      
    </style>
</head>

<body>
   
 

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2 class="section-title">Welcome to Charity</h2>
                    <p class="lead">
                        Since 2017, we've been dedicated to making a positive impact in communities across the nation. 
                        Through education, healthcare, and infrastructure development, we work tirelessly to create 
                        lasting change and build a better future for all.
                    </p>
                </div>
            </div>
        </div>
    </section>

   
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">What We Do</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-custom">
                        <i class="fas fa-graduation-cap fa-3x mb-3" style="color: #85A947"></i>
                        <h4>Education Support</h4>
                        <p>Providing educational resources, scholarships, and infrastructure to empower future generations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom">
                        <i class="fas fa-heartbeat fa-3x mb-3" style="color: #85A947"></i>
                        <h4>Healthcare Initiatives</h4>
                        <p>Ensuring access to quality healthcare services and medical support for communities in need.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom">
                        <i class="fas fa-home fa-3x mb-3" style="color: #85A947"></i>
                        <h4>Infrastructure Development</h4>
                        <p>Building and improving community infrastructure for sustainable development.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Journey Section -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Our Journey</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <h4>2017 - Foundation</h4>
                    <p>Established with a vision to create positive change in communities.</p>
                </div>
                <div class="timeline-item">
                    <h4>2018 - First Major Project</h4>
                    <p>Launched our first educational support program reaching 500 students.</p>
                </div>
                <div class="timeline-item">
                    <h4>2020 - Expansion</h4>
                    <p>Extended our services to healthcare and infrastructure development.</p>
                </div>
                <div class="timeline-item">
                    <h4>2022 - Milestone Achievement</h4>
                    <p>Successfully completed 100+ projects across multiple sectors.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Our Impact</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="achievement-card">
                        <h3>2800+</h3>
                        <p>Lives Impacted</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="achievement-card">
                        <h3>₹1.3cr+</h3>
                        <p>Funds Raised</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="achievement-card">
                        <h3>180+</h3>
                        <p>Projects Completed</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="achievement-card">
                        <h3>25+</h3>
                        <p>Cities Reached</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Our Leadership Team</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/men/14.jpg" alt="Team Member">
                        <h4>John Doe</h4>
                        <p>Founder & CEO</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Team Member">
                        <h4>Anastasia lea</h4>
                        <p>Operations Director</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Team Member">
                        <h4>Mark Lee</h4>
                        <p>Program Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Our Partners</h2>
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="https://randomuser.me/api/portraits/men/7.jpg" alt="Partner 1" class="partner-logo">
                </div>
                <div class="col-md-3">
                    <img src="https://randomuser.me/api/portraits/women/90.jpg" alt="Partner 2" class="partner-logo">
                </div>
                <div class="col-md-3">
                    <img src="https://randomuser.me/api/portraits/men/51.jpg" alt="Partner 3" class="partner-logo">
                </div>
                <div class="col-md-3">
                    <img src="https://randomuser.me/api/portraits/women/11.jpg" alt="Partner 4" class="partner-logo">
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <p class="lead p-5">
                We recognize the unique value of children in our community and the urgent need for infrastructure
                improvements in various regions. Our mission is to expand and enhance our services, making them more
                accessible to ensure a better quality of life for all. We are deeply concerned about the rising prevalence of special needs among children and young
                adults. Addressing this issue requires immediate action at multiple levels—including nurseries,
                schools, universities, and workplaces—to ensure that these individuals receive the support and
                opportunities needed to become active, contributing members of society. By fostering inclusivity and accessibility, we aim to create a healthier, more productive, and
                compassionate community for future generations.
            </p>
        </div>
    </section>
    
    <section class="section-padding">
        <div class="container text-center">
            <h2 class="section-title">Join Our Mission</h2>
            <p class="lead mb-4">Together, we can make a difference in the lives of those who need it most.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="donateEdu.php" class="btn btn-success px-4 py-2">Donate Now</a>
                <a href="request.php" class="btn btn-outline-success px-4 py-2">Request Help</a>
            </div>
        </div>
    </section>
 </body>
</html>
    <footer>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-6">
                    <h5>Contact us</h5>
                    <hr>
                    <p>Phone number: +91 7028030015</p>
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
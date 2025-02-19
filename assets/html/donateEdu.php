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

    <title>Education</title>
</head>
<style>
    /* General Styling */
body {
    background-color: #f4fdf4; /* Light greenish background */
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}


</style>
<body>

    <nav id="#navbar" class="navbar navbar-expand-lg bg-white py-0 fixed-top">
        <div class="container">
            <a href="../../index.html" class="navbar-brand text-dark logo">
                Charity
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item hov">
                        <a href="donateEdu.php" class="nav-link">Donate</a>
                        <div class="">
                            <ul class="hidden">
                                <li>
                                    <a href="#">Education</a>
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
                        <a href="view.php" class="nav-link">View Donations</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>









    <?php
    $con = mysqli_connect('localhost', 'root', '', 'charity') or die("Could not connect");

    $query = "SELECT * from charity WHERE code_type=1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <section class=" mt-5 mb-5">
            <div class="container donations ">
                <h3 class="text-dark"><?php echo $row['title'] ?></h3>
                <h6><?php echo 'Charity: ' . $row['c_name'] ?></h6>
                <?php echo '<img src="data:image;base64,' . base64_encode($row['img']) . '"alt="image" style="width:600px; height:400px;"' ?>
                <br>
                <p> <?php echo $row['text_desc'] ?></p>

                <form action="../php/donate.php" method="POST">

                    <input style="display:none" type="text" name="id" value <?php echo '=' . $row['c_name'] . '' ?>>
                    <input type="submit" class="btn btn-danger" value="Donate">
                </form>
            </div>
        </section>
    <?php
    }
?>

    <!-- <section class=" mt-5">
        <div class="container donations ">
            <h3 class="text-dark">Uneducated people need your help</h3>
            <h6>Charity: Educatry</h6>
            <img class="img-fluid" src="../img/edu1.jpg" alt="">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ipsa quo iusto a tenetur odit dolor tempore, dolore quisquam sed? Maxime et a ab nihil velit aliquam. Dignissimos, praesentium inventore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laborum minus, error ullam, nulla facere consequuntur quod inventore facilis exercitationem hic soluta voluptas. Id rem ad perferendis recusandae ea aperiam!</p>
            <div class="btn">
                <a href="../php/donate.php"> Donate</a>
            </div>
        </div>
    </section>

    <section class=" mt-5">
        <div class="container donations ">
            <h3 class="text-dark">Help people get their diplomas</h3>
            <h6>Charity: Educatry</h6>
            <img class="img-fluid" src="../img/edu2.jpg" alt="">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ipsa quo iusto a tenetur odit dolor tempore, dolore quisquam sed? Maxime et a ab nihil velit aliquam. Dignissimos, praesentium inventore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laborum minus, error ullam, nulla facere consequuntur quod inventore facilis exercitationem hic soluta voluptas. Id rem ad perferendis recusandae ea aperiam!</p>
            <div class="btn">
                <a href="../php/donate.php"> Donate</a>
            </div>
        </div>
    </section>

    <section class=" mt-5">
        <div class="container donations ">
            <h3 class="text-dark">Get necessarys accessories for students</h3>
            <h6>Charity: Educatops</h6>

            <img class="img-fluid" src="../img/edu3.jpg" alt="">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ipsa quo iusto a tenetur odit dolor tempore, dolore quisquam sed? Maxime et a ab nihil velit aliquam. Dignissimos, praesentium inventore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laborum minus, error ullam, nulla facere consequuntur quod inventore facilis exercitationem hic soluta voluptas. Id rem ad perferendis recusandae ea aperiam!</p>
            <div class="btn">
                <a href="../php/donate.php"> Donate</a>
            </div>
        </div>
    </section> -->

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

                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>


</body>

</html>
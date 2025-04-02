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

    <title>Health</title>

    <style>

    </style>
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
                        <a href="donateEdu.php" class="nav-link">Donate</a>
                    </li>

                    <li class="nav-item">
                        <a href="request.php" class="nav-link">Request Donation</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="mt-5 back">
        <div class="text-center"></div>

    </div>


    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'charity');
    $query = "SELECT * FROM type_charity WHERE code=2 ";
    $result = mysqli_query($connection, $query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="mt-5 ">
            <hr>
            <h2 class="text-center"><?php echo $row['description']   ?></h2>
            <hr>

        </div>

    <?php
    }
    ?>

    <?php
    $con = mysqli_connect('localhost', 'root', '', 'charity') or die("Could not connect");

    $query = "SELECT * from charity WHERE code_type = 2";
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
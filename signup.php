<?php
require('sys.php');
if (isset($_POST["name"])) {
    $add = $db->prepare("INSERT INTO `patients` (`name`,`password`,`email`,`phone`,`surname`) VALUES (:name, :password, :email, :phone, :surname)");
    $add->execute(
        array(
            ':name' => $_POST["name"],
            ':password' => $_POST["password"],
            ':email' => $_POST["email"],
            ':phone' => $_POST["phone"],
            ':surname' => $_POST["surname"]
        )
    );
    $add = $add->fetchAll(PDO::FETCH_ASSOC);
    echo "<script>alert('Successfully signed-up!.');window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medova Hospital</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/navbar.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="mainNav">
        <div class="logo">
            <a href="index.php"><img decoding="async" src="assets/img/96.png" alt="Logo Image"></a>    
        </div>
        <div class="hamburger">
            <div class="bars1"></div>
            <div class="bars2"></div>
            <div class="bars3"></div>
        </div>
    </nav>
    <div class="container">
        <section class="page-section mt-lg-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="name" type="text" placeholder="Name"
                                    required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="surname" type="text" placeholder="Surname"
                                    required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="password" type="password" placeholder="Password"
                                    required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="email" type="email" placeholder="example@example.com"
                                    required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="phone" type="text" placeholder="5555555555"
                                    required="required" />
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" checked>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>





</body>
</head /
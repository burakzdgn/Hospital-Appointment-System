<?php
$sessionController = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
    $sessionController = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.00, minimum-scale=1.00, maximum-scale=1.00, user-scalable=no">
    <title>Medova Hospital</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/jquery.bxslider.js"></script>
    <link href="assets/css/jquery.bxslider.css" rel="stylesheet" />
    <script>
        $(function () {
            $('.bxslider').bxSlider({
                auto: true,
                autoControls: true,
                stopAutoOnClick: true,
                pager: true,
                slideWidth: 600
            });
        });
    </script>
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
        <ul class="nav-links">
            <li><button class="login-button" href="appointment.php"><a href="appointment.php">Get
                        Appointment</a></button></li>
            <li><button class="login-button" href="login.php"><a href="login.php">Login</a></button></li>
            <li><button class="login-button" href="user.php"><a href="user.php">Profile</a></button></li>
        </ul>
    </nav>
    <script src="assets/js/navbar.js"></script>
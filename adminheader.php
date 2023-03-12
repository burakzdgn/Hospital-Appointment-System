<?php
if (!isset($_SESSION['admin'])) {
    die("<script> window.location.href = 'adminlogin.php'; </script>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>Admin-Medova Hospital</title>
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
        <ul class="nav-links">
            <li><a href="adminpanel.php">Appointments</a></li>
            <li><a href="doctors.php">Doctors</a></li>
            <li><a href="patients.php">Patients</a></li>
            <li><a href="services.php">Services</a></li>
            <li><button class="login-button" href="exit.php"><a href="exit.php">Logout</a></button></li>
        </ul>
    </nav>
    <script src="assets/js/navbar.js"></script>
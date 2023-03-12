<?php
require('sys.php');
$sessionController = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
    $sessionController = true;
} else {
    die("<script> window.location.href = 'login.php'; </script>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>Medova Hospital</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery-1.9.1.js"></script>
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
            <li><button class="login-button" href="appointment.php"><a href="appointment.php">Get Appointment</a></button></li>
            <li><button class="login-button" href="exit.php"><a href="exit.php">Exit</a></button></li>;
        </ul>
    </nav>
    <script src="assets/js/navbar.js"></script>

    <section class="page-section mt-lg-5">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-black mb-0">Appointments</h2>
            <div class="divider-custom">
                <br>
            </div>
            <div class="row">
                <table class="table table-bordered  table-dark">
                    <tr>
                        <td>Patient Name</td>
                        <td>Patient Surname</td>
                        <td>Service Name</td>
                        <td>Doctor</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Date</td>
                        <td>Appointment Hour</td>
                        <td></td>
                    </tr>
                    <?php
                    $sql = $db->prepare("SELECT * FROM  appointments WHERE patientid=$id");
                    $sql->execute();
                    $patientInfo = $db->prepare("SELECT * FROM patients where id = $id");
                    $patientInfo ->execute();
                    $patientAllInfo = $patientInfo->fetch();
                    while ($row = $sql->fetch()) { ?>
                        <tr>
                            <td><?php echo $patientAllInfo["name"]; ?></td>
                            <td><?php echo $patientAllInfo["surname"]; ?></td>
                            <td><?php
                                $medServices = $db->prepare("SELECT * FROM medicalservices where id = '" . $row["service"] . "'");
                                $medServices->execute();$name = $medServices->fetch();
                                echo $name["serviceName"];
                                ?></td>
                            <td><?php
                                $docs = $db->prepare("SELECT * FROM doctors where id = '" . $row["docid"] . "'");$docs->execute();
                                $docName = $docs->fetch();
                                echo $docName["name"] . ' ' . $docName["surname"];
                                ?></td>
                            <td><?php echo $patientAllInfo["phone"]; ?></td>
                            <td><?php echo $patientAllInfo["email"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><?php echo $row["hour"]; ?></td>
                            <td><a class="btn btn-danger text-white"href="cancelappointment.php?id=<?php echo $row['id'] ?>" type="submit">Cancel Appointment</a></td>
                        </tr>
                        <?php }?>
                </table>
            </div>
        </div>
    </section>
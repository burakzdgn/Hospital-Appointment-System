<?php
require('sys.php');
if (!isset($_SESSION['user'])) {
    die("<script> window.location.href = 'login.php'; </script>");
}
if (isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
}
$check = $db->prepare("SELECT * FROM patients WHERE id = '$id'");
$check->execute();
$patient = $check->fetch(PDO::FETCH_ASSOC);
if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["serviceIdSelect"]) && isset($_POST["doctorId"]) && isset($_POST["timeid"])) {
    $add = $db->prepare("INSERT INTO `appointments` (`patientid`,`service`,`docid`,`date`,`hour`) VALUES (:patientid,  :service, :docid, :date, :hour)");
    $add->execute(
        array(
            ':patientid' => $patient["id"],
            ':service' => $_POST["serviceIdSelect"],
            ':docid' => $_POST["doctorId"],
            ':date' => $_POST["dateChoose"],
            ':hour' => $_POST["timeid"]
        )
    );
    $add = $add->fetchAll(PDO::FETCH_ASSOC);
    $addNotAvailableTime = $db->prepare("INSERT INTO `getdoctoravailabletime` (`docid`,`notAvailableDate`,`notAvailableTime`) VALUES (:docid, :notAvailableDate, :notAvailableTime)");
    $addNotAvailableTime->execute(
        array(
            'docid' => $_POST["doctorId"],
            'notAvailableDate' => $_POST["dateChoose"],
            'notAvailableTime' => $_POST["timeid"]
        )
    );
    $addNotAvailableTime = $addNotAvailableTime->fetchAll(PDO::FETCH_ASSOC);
    echo "<script>alert('The appointment successfully created.');window.location.href='user.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>Medova Hospital</title>
    <script src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/jquery-3.6.2.min.js" type="text/css"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        $(function () {
            $("#doctorId").hide();
            $("#timeid").hide();
            $("#serviceIdSelect").hide();
            var dateTime = $("#dateChoose").val();

            $("#dateChoose").change(function () {
                $("#serviceIdSelect").show();
                $("#doctorId").hide();
                $("#timeid").hide();
            });

            $("#serviceIdSelect").change(function () {
                var serviceIdSelect = $(this).val();
                $.ajax({
                    type: "post",
                    url: "ajax.php",
                    data: { "serviceIdSelect": serviceIdSelect },
                    success: function (data) {
                        $("#doctorId").show();
                        $("#timeid").show();
                        $("#doctorId").html(data);
                    }
                });
            })
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#doctorId").change(function () {
                var doctorIdSelect = $(this).val();
                var dateTime = $("#dateChoose").val();
                $.ajax({
                    type: "post",
                    url: "ajaxTime.php",
                    data: {
                        "doctorId": doctorIdSelect,
                        "dateChoose": dateTime
                    },
                    success: function (data) {
                        $("#timeid").html(data);
                    }
                });
            })
        });
    </script>
    <script>
        $(function () {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#dateChoose').attr('min', maxDate);
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
    </nav>
    <section class="page-section mt-lg-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form method="POST">
                    <div class="control-group">
                        <!--İSİM GÖSTERME-->
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="name" type="text" placeholder="Name" required="required" readonly value="<?= $patient['name'] ?>" />
                        </div>
                        <!--SOYİSİM GÖSTERME-->
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="surname" type="text" placeholder="Surname" required="required" readonly value="<?= $patient['surname'] ?>" />
                        </div>
                        <!--TARİH SEÇME-->
                        <div class="form-group controls mb-3 pb-2">
                            <input id="dateChoose" class="form-control" name="dateChoose" type="date" placeholder="Choose Your Appointment Date" required />
                        </div>
                        <!--SERVİS GÖSTERME-->
                        <div class="form-group controls mb-3 pb-2">
                            <select class="form-control" id="serviceIdSelect" name="serviceIdSelect" required>
                                <option value="0" disabled selected>Choose a service</option>
                                <?php
                                $sql = $db->query("SELECT * FROM medicalservices");
                                $count = $sql->rowCount();
                                if ($count > 0) {
                                    // her bir satırı döker
                                    while ($row = $sql->fetch()) {
                                ?>
                                <option value="<?php echo $row["id"] ?>"> <?php echo $row["serviceName"]; ?> </option>
                                <?php }
                                } ?> </select>
                        </div>
                        <!--DOKTOR GÖSTERME-->
                        <div class="form-group controls mb-3 pb-2">
                            <select class="form-control" id="doctorId" name="doctorId" required> <option value="0">Choose a doctor.</option> </select>
                        </div>
                        <!--RANDEVU SAATİ GÖSTERME-->
                        <div class="form-group controls mb-3 pb-2">
                            <select class="form-control" id="timeid" name="timeid" required> <option disabled selected value="0">Choose time.</option> </select>
                        </div>
                    </div>
                    <!--BUTON-->
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Create An Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</head>
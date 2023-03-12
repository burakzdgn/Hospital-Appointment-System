<?php
require('sys.php');
if (!isset($_SESSION['admin'])) {
    die("<script> window.location.href = 'adminlogin.php'; </script>");
}
?>
<div class="setTop">
    <?php
    include('adminheader.php')
        ?>
</div>
<section class="page-section mt-5">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-black mb-0">Appointments</h2>
        <div class="divider-custom">
            <br>
        </div>
        <div class="row">
            <table class="table table-bordered  table-dark mt-lg-5">
                <tr>
                    <td>Rez. ID</td>
                    <td>Patient ID</td>
                    <td>Patient Name</td>
                    <td>Service Name</td>
                    <td>Doctor</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Date</td>
                    <td>Appointment Hour</td>
                    <td></td>
                </tr>
                <?php
                $sql = $db->prepare("SELECT * FROM  appointments");
                $sql->execute();
                while ($row = $sql->fetch()) { ?>
                    <tr>
                        <?php $patientInfo = $db->prepare("SELECT * FROM patients where id = '" . $row["patientid"] . "'");
                        $patientInfo->execute();
                        $patientAllInfo = $patientInfo->fetch();
                        ?>
                        <td>
                            <?php echo $row["id"]; ?>
                        </td>
                        <td>
                            <?php echo $row["patientid"]; ?>
                        </td>
                        <td><?php echo $patientAllInfo["name"] . ' ' . $patientAllInfo["surname"]; ?></td>
                        <td>
                            <?php
                            $sql2 = $db->prepare("SELECT * FROM medicalservices where id = '" . $row["service"] . "'");
                            $sql2->execute();
                            $name = $sql2->fetch();
                            echo $name["serviceName"];
                            ?>
                        </td>
                        <td>
                            <?php
                            $sql3 = $db->prepare("SELECT * FROM doctors where id = '" . $row["docid"] . "'");
                            $sql3->execute();
                            $docName = $sql3->fetch();
                            echo $docName["name"] . ' ' . $docName["surname"];

                            ?>
                        </td>
                        <td>
                            <?php echo $patientAllInfo["phone"]; ?>
                        </td>
                        <td><?php echo $patientAllInfo["email"]; ?></td>
                        <td>
                            <?php echo $row["date"]; ?>
                        </td>
                        <td><?php echo $row["hour"]; ?></td>
                        <td><a class="btn btn-danger text-white" href="deleteappointment.php?id=<?php echo $row['id'] ?>"
                                type="submit">Cancel Appointment</a></td>
                    </tr>
                    <?php }
                ?>
            </table>
        </div>
    </div>
</section>
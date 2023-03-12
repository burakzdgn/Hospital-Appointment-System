<?php
require('sys.php');
?>
<div class="setTop">
    <?php
    include('adminheader.php')
        ?>

</div>
<section class="page-section mt-3">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-black mb-0">Patients</h2>
        <div class="divider-custom">
            <br>
            <a class="btn btn-success text-white" href="addpatient.php" type="submit">Add Patient</a>
            <br><br><br>
        </div>
        <div class="row">
            <table class="table table-bordered table-dark">
                <tr>
                    <td>Patient ID</td>
                    <td>Patient Name</td>
                    <td>Patient Surname</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td></td>
                </tr>
                <?php
                $sql = $db->prepare("SELECT * FROM  patients");
                $sql->execute();
                while ($row = $sql->fetch()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["surname"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><a class="btn btn-danger text-white" href="deletepatient.php?id=<?php echo $row['id'] ?>"type="submit">Delete</a></td>
                    </tr>
                    <?php }?>
            </table>
        </div>
    </div>
</section>
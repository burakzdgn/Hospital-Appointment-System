<?php
require('sys.php');
?>
<div class="setTop">
    <?php
    include('adminheader.php')
        ?>
</div>
<div class="adminFooter">
    <section class="page-section">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-black mb-0">Doctors</h2>
            <div class="divider-custom">
                <br>
                <a class="btn btn-success text-white" href="adddoctor.php" type="submit">Add Doctor</a>
                <br><br><br>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered  table-dark">
                <tr>
                    <td>Doctor ID</td>
                    <td>Doctor Name</td>
                    <td>Doctor Name</td>
                    <td>Service Name</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $sql = $db->prepare("SELECT * FROM  doctors");
                $sql->execute();
                while ($row = $sql->fetch()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["surname"]; ?></td>
                        <td>
                            <?php
                            $sql2 = $db->prepare("SELECT * FROM medicalservices where id = '" . $row["serviceId"] . "'");
                            $sql2->execute();
                            $name = $sql2->fetch();
                            echo $name["serviceName"];?> </td>
                        <td><a class="btn btn-success text-white" href="editdoctor.php?id=<?php echo $row['id'] ?>" type="submit">Edit</a></td>
                        <td><a class="btn btn-danger text-white" href="deletedoctor.php?id=<?php echo $row['id'] ?>" type="submit">Delete</a></td>
                    </tr>
                    <?php }
                ?>
            </table>
        </div>
    </section>
</div>
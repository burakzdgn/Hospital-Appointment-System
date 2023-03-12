<?php
require('sys.php');
?>
<div class="setTop">
    <?php
    include('adminheader.php')
        ?>
    <section class="page-section mt-3">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-black mb-0">Services</h2>
            <div class="divider-custom">
                <br>
                <a class="btn btn-success text-white" href="addservice.php" type="submit">Add Service</a>
                <br><br><br>
            </div>
            <div class="row">
                <table class="table table-bordered table-dark">
                    <tr>
                        <td>Service ID</td>
                        <td>Service Name</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    $sql = $db->prepare("SELECT * FROM  medicalservices");
                    $sql->execute();
                    while ($row = $sql->fetch()) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["serviceName"]; ?></td>
                            <td><a class="btn btn-success text-white" href="editservice.php?id=<?php echo $row['id'] ?>"type="submit">Edit</a></td>
                            <td><a class="btn btn-danger text-white" href="deleteservice.php?id=<?php echo $row['id'] ?>"type="submit">Delete</a></td>
                        </tr>
                        <?php }?>
                </table>
            </div>
        </div>
    </section>
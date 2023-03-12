<?php
require('sys.php');
if (isset($_POST["serviceName"])) {
    $add = $db->prepare("INSERT INTO medicalservices (serviceName) VALUES (:serviceName)");
    $add->execute(
        array(
            ':serviceName' => $_POST["serviceName"]
        )
    );
    $add = $add->fetchAll(PDO::FETCH_ASSOC);
    echo "<script>alert('Succesfully added: " . $_POST["serviceName"] . "');window.location.href='services.php';</script>";
}
?>
<div class="setTop">
    <?php
    include('adminheader.php')
        ?>

</div>
<div class="adminFooter">
    <section class="page-section">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Add Service</h2>
            <br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="serviceName" type="text" placeholder="Service Name"
                                    required="required" />
                            </div>
                            <div class="form-group girisbuton"><button class="btn btn-danger" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




</div>
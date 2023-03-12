<?php
require('sys.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $check = $db->prepare("SELECT * FROM doctors WHERE ID = ?");
    $check->execute([$id]);

    $doc = $check->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST["name"])) {
    $docN = $_POST["name"];
    $docS = $_POST["surname"];
    if(isset($_POST["serviceId"])){
        $docServ = $_POST["serviceId"];
    }
    else{
        $docServ = $doc["serviceId"];
    }
    $add = $db->prepare("UPDATE `doctors` SET `name` = '$docN', `surname` = '$docS' ,serviceId = $docServ where id=$id");
    $add->execute();
    $add = $add->fetchAll(PDO::FETCH_ASSOC);
    echo "<script>alert('The doctor successfully updated.');window.location.href='doctors.php';</script>";
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
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Edit Doctor</h2>
            <br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="name" type="text" placeholder="Name"
                                    required="required" value="<?php echo $doc["name"] ?>" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="surname" type="text" placeholder="Surname"
                                    required="required" value="<?php echo $doc["surname"]; ?>" />
                            </div>
                            <div class=" form-group controls mb-3 pb-2">
                                <select class="form-control" id="serviceId" name="serviceId">
                                    <option selected disabled value="<?php echo $doc["serviceId"]; ?>"><?php
                                       $serviceId = $doc["serviceId"];
                                       $sqlService = $db->prepare("SELECT * FROM medicalservices where id=$serviceId");
                                       $sqlService->execute();
                                       $rowService = $sqlService->fetch();
                                       echo $rowService["serviceName"]; ?>
                                    </option>
                                    <?php
                                    $sql = $db->prepare("SELECT * FROM medicalservices");
                                    $sql->execute();
                                    $count = $sql->rowCount();
                                    if ($count > 0) {
                                        while ($row = $sql->fetch()) {
                                    ?>
                                    <option name=" serviceId" value="<?php echo $row["id"] ?>"> <?php echo $row["serviceName"]; ?> </option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-lg-5"><button class="btn btn-success mt-lg-5" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
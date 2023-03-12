<?php
require('sys.php');
if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["serviceId"])) {
    $add = $db->prepare("INSERT INTO `doctors` (`name`,`surname`,`serviceId`) VALUES (:name, :surname, :serviceId)");
    $add->execute(array(
        ':name' => $_POST["name"],
        ':surname' => $_POST["surname"],
        ':serviceId' => $_POST["serviceId"]
    ));
    $add = $add->fetchAll(PDO::FETCH_ASSOC);
    echo "<script>alert('The doctor successfully added.');window.location.href='doctors.php';</script>";
}
?>
<div class="setTop">
    <?php
        include('adminheader.php')
    ?>
</div>
<div class="adminFooter">
    <section class="page-section" >
    <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Add Doctor</h2>
            <br>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="name" type="text" placeholder="Name" required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="surname" type="text" placeholder="Surname" required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <select class="form-control" id="serviceId" name="serviceId">
                             <?php
                                $sql = $db->prepare("SELECT * FROM medicalservices");
                                $sql->execute();
                                $count = $sql->rowCount();
                                if ($count > 0) {
                                while($row = $sql->fetch()) {
                                    ?>                          
                                <option name="serviceId" value="<?php echo $row["id"] ?>" > <?php echo $row["serviceName"]; ?> </option>
                            <?php }}  ?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group mt-lg-5"><button class="btn btn-danger mt-lg-5" type="submit">Add</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
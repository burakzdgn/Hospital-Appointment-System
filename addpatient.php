<?php
require('sys.php');

if (isset($_POST["name"])) {
    $add = $db->prepare("INSERT INTO `patients` (`name`,`surname`,`password`,`email`,`phone`) VALUES (:name, :surname, :password,:email,:phone)");
    $add->execute(array(
        ':name' => $_POST["name"],
        ':surname' => $_POST["surname"],
        ':password' => $_POST["password"],
        ':email' => $_POST["email"],
        ':phone' => $_POST["phone"]
    ));
    
    $add = $add->fetchAll(PDO::FETCH_ASSOC);

    echo "<script>alert('The patient successfully added.');window.location.href='patients.php';</script>";
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
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">Add Patient</h2>
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
                                <input class="form-control" name="password" type="text" placeholder="Password" required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="email" type="text" placeholder="E-Mail" required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="phone" type="text" placeholder="Phone Number" required="required" />
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="radio" name="gender" id="female" checked>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-lg-5"><button class="btn btn-danger" type="submit">Add</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
    

</div>
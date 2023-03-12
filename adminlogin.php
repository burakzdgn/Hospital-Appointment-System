<?php
require('sys.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Medova Hospital</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/navbar.js"></script>
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
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="username" type="text" placeholder="Username"
                                required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="password" type="password" placeholder="Password"
                                required="required" />
                        </div>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Login</button>
                        <a class="btn btn-danger text-white" href="adminsignup.php" type="submit">Sign Up</a>
                    </div>
                </form>
                <?php
                    if (isset($_POST['username']) && isset($_POST['password'])) {

                        $admincheck = $db->prepare("SELECT * FROM `admin` WHERE username = ? AND `password` = ?");
                        $admincheck->execute(array($_POST['username'], $_POST['password']));
                        $isAdmin = $admincheck->fetchAll(PDO::FETCH_ASSOC);
                        if (count($isAdmin) != 0) {
                            $isim = $_POST['username'];
                            $_SESSION['admin'] = true;
                            header("location:adminpanel.php");
                            exit();
                        } else {
                            echo 'The admin for the entered criteria could not be found!';
                        }
                    }
                    ?>
            </div>
        </div>
    </section>
</body>
</html>
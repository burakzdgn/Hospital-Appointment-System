<?php
require('sys.php');
if (isset($_SESSION['user'])) {
    die("<script> alert('You are already logged in!.');window.location.href = 'index.php'; </script>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medova Hospital</title>
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
    <br><br><br>
    <section class="page-section">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form method="POST">
                    <div class="control-group">
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="email" type="email" placeholder="example@example.com"
                                required="required" />
                        </div>
                        <div class="form-group controls mb-3 pb-2">
                            <input class="form-control" name="password" type="password" placeholder="Password"
                                required="required" />
                        </div>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="submit">Login</button>
                        <a class="btn btn-danger text-white" href="signup.php" type="submit">Sign Up</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $usercheck = $db->query("SELECT * FROM patients WHERE email = '$email' AND password = '$password'");
                    $isUser = $usercheck->fetch();
                    if (count($isUser) != 0) {
                        $_SESSION['user'] = true;
                        $id = $isUser['id'];
                        $_SESSION['loggedUserId'] = $id;
                        header("location:index.php");
                        exit();
                    } else {
                        echo 'The user for the entered criteria could not be found!';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</body>
</head /
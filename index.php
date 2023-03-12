<?php
include('header.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['loggedUserId'])) {
    $id = $_SESSION['loggedUserId'];
}
?>
<section class="indexSection" id="index">
    <div class="bxslider">
        <div><img src="assets/img/slider1.jpg"></div>
        <div><img src="assets/img/slider2.jpg"></div>
        <div><img src="assets/img/slider3.jpg"></div>
    </div>
</section>
<div class="footerBottom">
    <div class="container">
        <div class="thanksdiv">
            <h4>Health is everything!</h4>
        </div>
    </div>
</div>
<div class="footer-distributed">
    <div class="footer-right">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>
    </div>
    <div class="footer-left">
        <p>Burak Özdoğan &copy; 2022</p>
        <a href="adminpanel.php">Admin Panel</a>
    </div>
</div>
</body>
</html>
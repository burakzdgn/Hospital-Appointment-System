<?php 
require('sys.php');
if(isset($_GET['id'])){
    $query = ("SELECT * FROM  appointments where id = '" . $_GET['id'] . "'");
    $sql = $db->prepare("SELECT * FROM  appointments where id = '" . $_GET['id'] . "'");
    $sql->execute();
    $count = $sql->rowCount();
    if ($count > 0) {
        $docAvailable = $sql->fetch();
        $query = $db->prepare("DELETE FROM  appointments where id = '" . $_GET['id'] . "'");
        $query->execute();
        $dateAppointment = $docAvailable["date"];
        $hourAppointment = $docAvailable["hour"];
        $query2 = $db->prepare("DELETE FROM  getdoctoravailabletime where notAvailableDate = '$dateAppointment' and notAvailableTime = '$hourAppointment'");
        $query2->execute();
        echo "<script>alert('Appointment is cancelled.');window.location.href='user.php';</script>";
    }
    else{
        header("location:user.php");
        exit();
    }
}
else{
    header("location:user.php");
    exit();
}
?>
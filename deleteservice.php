<?php 
require('sys.php');
if(isset($_GET['id'])){
    $query = ("SELECT * FROM  medicalservices where id = '" . $_GET['id'] . "'");
    $sql = $db->prepare("SELECT * FROM  medicalservices where id = '" . $_GET['id'] . "'");
    $sql->execute();
    $count = $sql->rowCount();
    if ($count > 0) {
        $query = $db->prepare("DELETE FROM  medicalservices where id = '" . $_GET['id'] . "'");
        $query->execute();
        echo "<script>alert('The service is deleted.');window.location.href='services.php';</script>";
    }
    else{
        header("location:services.php");
        exit();
    }
}
else{
    header("location:services.php");
    exit();
}
?>
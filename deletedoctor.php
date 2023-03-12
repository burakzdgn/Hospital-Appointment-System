<?php 
require('sys.php');
if(isset($_GET['id'])){
    $query = ("SELECT * FROM  doctors where id = '" . $_GET['id'] . "'");
    $sql = $db->prepare("SELECT * FROM  doctors where id = '" . $_GET['id'] . "'");
    $sql->execute();
    $count = $sql->rowCount();
    if ($count > 0) {
        $query = $db->prepare("DELETE FROM  doctors where id = '" . $_GET['id'] . "'");
        $query->execute();
        echo "<script>alert('The doctor is deleted.');window.location.href='doctors.php';</script>";
        
    }
    else{
        header("location:doctors.php");
        exit();
    }
}
else{
    header("location:doctors.php");
    exit();
}
?>
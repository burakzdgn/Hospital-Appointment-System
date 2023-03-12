<?php 
require('sys.php');
if(isset($_GET['id'])){
    $query = ("SELECT * FROM  patients where id = '" . $_GET['id'] . "'");
    $sql = $db->prepare("SELECT * FROM  patients where id = '" . $_GET['id'] . "'");
    $sql->execute();
    $count = $sql->rowCount();
    if ($count > 0) {
        $query = $db->prepare("DELETE FROM  patients where id = '" . $_GET['id'] . "'");
        $query->execute();
        echo "<script>alert('The patients is deleted.');window.location.href='patients.php';</script>";  
    }
    else{
        header("location:patients.php");
        exit();
    }
}
else{
    header("location:patients.php");
    exit();
}
?>
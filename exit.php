<?php
    session_start();
    session_destroy();
    header('Location: index.php');
    unset($_SESSION["user"]);
    unset($_SESSION["loggedUserId"]);
    unset($_SESSION["admin"]);
    exit;
?>
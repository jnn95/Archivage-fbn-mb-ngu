<?php
    session_start();
    session_destroy();
    session_unset();

    header('location:Index.php');
    exit();
?>
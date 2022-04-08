<?php
    // Authentication check to prevent anonymous users from changing data
    // If session is empty, user has not logged in
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); 
    }

    // If no username session var, redirect to login & stop page execution
    if (empty($_SESSION['userName'])){
        header('location:login.php');
        exit();
    }
?>
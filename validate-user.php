<?php
    // Capture login form inputs
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Connect to the database
    require 'components/db.php';

    // Fetch the user based on userName
    $sql = "SELECT * FROM taskUsers WHERE userName = :userName";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':userName', $userName, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();

    // If user not found, display login page w/error
    if (!$user) {
        $db = null;
        header('location:login.php?invalid=true');
    }

    else {
        // If userName is found, use a built-in php method to hash and compare passwords
        if (!password_verify($password, $user['password'])) {
            // If passwords don't match, display login page w/error
            $db = null;
            header('location:login.php?invalid=true');
        }

        else {
            // If passwords match, store user identity in a SESSION object; redirect user to movies page
            // Must call session_start() before using session variables in PHP
            // Store username in a session variable so we can acccess it on any page
            session_start();
            $_SESSION['userName'] = $userName;
            $db = null;
            header('location:tasks.php');}
    }
?>
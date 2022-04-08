<?php
    // Access the current session
    session_start();

    // Clear all session data
    session_unset();

    // Get rid od this session
    session_destroy();

    // Redirect to login
    header('location:login.php');

?>
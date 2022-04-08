<?php
    $title = 'Saving your Account..';
    require 'components/header.php';

    // Capture inputs
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $isValid = true;

    // Validate inputs
    if (empty($userName)) {
        echo '<div class="wrn-txt"><p>Username is required.</p></div>';
        $isValid = false;
    }

    if (empty($password)) {
        echo '<div class="wrn-txt"><p>Password is required.</p></div>';
        $isValid = false;
    }

    if ($password != $confirm) {
        echo '<div class="wrn-txt"><p>Passwords do not match.</p></div>';
        $isValid = false;
    } 

    if ($isValid) {
        // Connect to SQL database
        require 'components/db.php';

        // Check for duplicate user
        $sql = "SELECT * FROM taskUsers WHERE userName = :userName";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':userName', $userName, PDO::PARAM_STR, 50);
        $cmd->execute();
        $user = $cmd->fetch();

        if ($user) {
            echo '<div class="wrn-txt"><p>User alreaday exists.</p></div>';
            $db = null;
            exit(); // Stop executing this block of PHP code
        }

        // Hash password e.g. Password1234 => 981203djasoaw01210182asndnosafawekq1
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Save new user
        $sql = "INSERT INTO taskUsers (userName, password) VALUES (:userName, :password)";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':userName', $userName, PDO::PARAM_STR, 50);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 150);
        $cmd->execute();

        // Disconnect
        $db = null;

        // Display message
        echo '<div class="sv-txt"><h3>User Saved!</h3></div>';
    }

?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Saving Course Info</title>
    <meta name="description" content="This page is for receiving input from the user and store data into the database table">
    <!-- CSS Stylesheet -->
    <link href="css/style.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;900&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        // Get form input
        $courseName = $_POST['courseName'];

        // Connect to SQL database
        require 'components/db.php';

        // Setup SQL INSERT command
        $sql = "INSERT INTO courses (courseName) VALUES (:courseName)";

        // Create command object using database connection & sql command
        $cmd = $db->prepare($sql);

        // Bind the parameter to insert form input into param
        $cmd->bindParam(':courseName', $courseName, PDO::PARAM_STR, 50);

        // Execute the command to save variables to database table
        $cmd->execute();

        // Disconnect
        $db = null;

        // Show confirmation
        echo '<div class="sv-txt"><h3>Course Saved!</h3></div>';
    ?>
</body>
</html>
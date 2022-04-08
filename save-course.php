<?php
    $title = 'Saving Course...';
    require 'components/header.php';

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
    
    require 'components/footer.php';
?>
</body>
</html>
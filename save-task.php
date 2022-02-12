<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title>Saving Task..</title>
        <meta name="description" content="This page is for capturing inputs and store values into the database table">
    </head>
    <body>
        <?php
            // Capture inputs from POST array and store each in a variable
            $presentDate = $_POST['presentDate'];
            $taskName = $_POST['taskName'];
            $descr = $_POST['descr'];
            $dueDate = $_POST['dueDate'];
            $stat = $_POST['stat'];
            $courseId = $_POST['courseId'];

            // Connect to SQL database
            $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

            // Setup SQL INSERT command
            $sql = "INSERT INTO tasks (presentDate, taskName, descr, dueDate, stat, courseId) VALUES (:presentDate, :taskName, :descr, :dueDate, :stat, :courseId)";

            // Create command object using database connection & sql command
            $cmd = $db->prepare($sql);

            // Populate each field with matching value from the variables
            $cmd->bindParam(':presentDate', $presentDate, PDO::PARAM_STR, 20);
            $cmd->bindParam(':taskName', $taskName, PDO::PARAM_STR, 100);
            $cmd->bindParam(':descr', $descr, PDO::PARAM_STR, 150);
            $cmd->bindParam(':dueDate', $dueDate, PDO::PARAM_STR, 20);
            $cmd->bindParam(':stat', $stat, PDO::PARAM_STR, 50);
            $cmd->bindParam(':courseId', $courseId, PDO::PARAM_INT);

            // Execute the command to save variables to database table
            $cmd->execute();

            // Disconnect
            $db = null;

            // Display confirmation message
            echo "Task Saved</br>";
            echo '<a href="tasks.php">Check it out!</a>';
        ?>
    </body>
</html>
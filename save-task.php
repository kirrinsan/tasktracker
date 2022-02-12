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

            // Indicate whether or not form inputs are valid
            $isValid = true;

            // Check for input validation
            if (empty($presentDate)) {
                echo 'Date is required.</br>';
                $isValid = false;
            } else {
                // If date is less than 2022, print invalid
                if ($presentDate < 2022) {
                    echo 'Present date is invalid. Try again.</br>';
                    $isValid = false;
                }
            }

            if (empty($taskName) || strlen($taskName > 100)) {
                echo 'Task name is required. Must be at MAX 100 characters.</br>';
                $isValid = false;
            }

            if (empty($descr) || strlen($taskName > 150)) {
                echo 'Description is required. Must be at MAX 150 characters.</br>';
                $isValid = false;
            } else {
                if (is_numeric($descr)) {
                    echo 'Description cannot be numeric.</br>';
                }
            }

            if (empty($dueDate)) {
                echo 'Due date is required.</br>';
                $isValid = false;
            } else {
                // If due date is less than 2022, print invalid
                if ($dueDate < 2022) {
                    echo 'Due date is invalid. Try again.</br>';
                    $isValid = false;
                } else if ($dueDate < $presentDate) {
                    echo 'Due date cannot be displayed before present date.</br>';
                    $isValid = false;
                }
            }

            // If all form inputs are valid, connect & save
            if ($isValid) {

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
                echo "Task saved</br>";
                echo '<a href="tasks.php">Return to the list</a>';
            }
        ?>
    </body>
</html>
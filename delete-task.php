<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8" />
        <title>Deleting Task...</title>
        <meta name="description" content="This page is for creating new courses">
        <!-- CSS Stylesheet -->
        <link href="css/style.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;900&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            // Get id primary key value from URL using $_GET array
            if (isset($_GET['id'])) {
                if (is_numeric($_GET['id'])) {
                    // If id is a number, proceed
                    $id = $_GET['id'];

                    // db Connection
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

                    // Setup SQL DELETE command
                    $sql = "DELETE FROM tasks WHERE id = :id";
                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':id', $id, PDO::PARAM_INT);

                    // Execute
                    $cmd->execute();

                    // Disconnect 
                    $bd = null;

                    echo '<h1>Task Successfully Deleted</h1>
                        <a href="tasks.php">Return to List of Tasks</a>';

                }
                else {
                    echo "Invalid Task";
                }
            }
            else {
                // id is missing
                echo "Invalid Task";
            }

        ?>
    </body>
</html>
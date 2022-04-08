<?php
    $title = 'Deleting Task..';
    require 'components/header.php';

    try {
        // Get id primary key value from URL using $_GET array
        if (isset($_GET['id'])) {
            if (is_numeric($_GET['id'])) {
                // If id is a number, proceed
                $id = $_GET['id'];

                // db Connection
                require 'components/db.php';

                // Setup SQL DELETE command
                $sql = "DELETE FROM tasks WHERE id = :id";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':id', $id, PDO::PARAM_INT);

                // Execute
                $cmd->execute();

                // Disconnect 
                $bd = null;

                echo '<div class="sv-txt"><h3>Task Successfully Deleted!</h3>
                    <a href="tasks.php">Return to List of Tasks</a></div>';

            }
            else { // If id is not a number
                echo '<div class="wrn-txt"><p>Invalid Task</p></div>';
            }
        }
        else {
            // If id is missing
            echo '<div class="wrn-txt"><p>Invalid Task</p></div>';
        }
    }
    catch (Exception $error) {
        header('location:error.php');
    }
        require 'components/footer.php';
    ?>
    </body>
</html>
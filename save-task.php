    <?php
        $title = 'Saving Task..';
        require 'components/header.php';

            // Capture inputs from POST array and store each in a variable
            $presentDate = $_POST['presentDate'];
            $taskName = $_POST['taskName'];
            $descr = $_POST['descr'];
            $dueDate = $_POST['dueDate'];
            $stat = $_POST['stat'];
            $courseId = $_POST['courseId'];
            $id = $_POST['id'];

            // Indicate whether or not form inputs are valid
            $isValid = true;

            // Check for input validation
            if (empty($presentDate)) {
                echo '<div class="wrn-txt"><p>Date is required.</p></div>';
                $isValid = false;
            } else {
                // If date is less than 2022, print invalid
                if ($presentDate < 2022) {
                    echo '<div class="wrn-txt"><p>Present date is invalid. Try again.</p></div>';
                    $isValid = false;
                }
            }

            // If task name is empty OR string length is less than 100
            if (empty($taskName) || strlen($taskName < 100)) {
                echo '<div class="wrn-txt"><p>Task name is required. Must be at MAX 100 characters.</p></div>';
                $isValid = false;
            }

            // If description is empty OR string length is less than 150
            if (empty($descr) || strlen($descr < 150)) {
                echo '<div class="wrn-txt"><p>Description is required. Must be at MAX 150 characters.</p></div>';
                $isValid = false;
            } else {
                // If description is numeric
                if (is_numeric($descr)) {
                    echo '<div class="wrn-txt"><p>Description cannot be numeric.</p></div>';
                }
            }

            // If due date is empty
            if (empty($dueDate)) {
                echo '<div class="wrn-txt"><p>Due date is required.</p></div>';
                $isValid = false;
            } else {
                // If due date is less than 2022, print invalid
                if ($dueDate < 2022) {
                    echo '<div class="wrn-txt"><p>Due date is invalid. Try again.</p></div>';
                    $isValid = false;
                //If due date is before present date, print invalid
                } else if ($dueDate < $presentDate) {
                    echo '<div class="wrn-txt"><p>Due date cannot be displayed before present date.</p></div>';
                    $isValid = false;
                }
            }

            // If all form inputs are valid, connect & save
            if ($isValid) {

                // Connect to SQL database
                require 'components/db.php';

                // If there is no id, setup SQL INSERT command
                if (empty($id)) {
                    $sql = "INSERT INTO tasks (presentDate, taskName, descr, dueDate, stat, courseId) VALUES (:presentDate, :taskName, :descr, :dueDate, :stat, :courseId)";    
                }
                // If id is available, SQL UPDATE instead
                else {
                    $sql = "UPDATE tasks SET presentDate = :presentDate, taskName = :taskName, descr = :descr, dueDate = :dueDate, stat = :stat, courseId = :courseId WHERE id = :id";
                }

                // Create command object using database connection & sql command
                $cmd = $db->prepare($sql);

                // Populate each field with matching value from the variables
                $cmd->bindParam(':presentDate', $presentDate, PDO::PARAM_STR, 20);
                $cmd->bindParam(':taskName', $taskName, PDO::PARAM_STR, 100);
                $cmd->bindParam(':descr', $descr, PDO::PARAM_STR, 150);
                $cmd->bindParam(':dueDate', $dueDate, PDO::PARAM_STR, 20);
                $cmd->bindParam(':stat', $stat, PDO::PARAM_STR, 50);
                $cmd->bindParam(':courseId', $courseId, PDO::PARAM_INT);

                // If we have id, bind it
                if (!empty($id)) {
                    $cmd->bindParam(':id', $id, PDO::PARAM_INT);
                }

                // Execute the command to save variables to database table
                $cmd->execute();

                // Disconnect
                $db = null;

                // Display confirmation message
                echo '<div class="sv-txt"><h3>Task Saved!</h3>
                        <a href="tasks.php" class="return-link">Return to List of Tasks</a></div>';
            }
        require 'components/footer.php';
    ?>
    </body>
</html>
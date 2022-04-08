    <?php
        $title = 'Creating Task..';
        require 'components/header.php';

        // Check for id in URL. If id exists, fetch selected task from db for display
        $id = null;
        $presentDate = null;
        $taskName = null;
        $descr = null;
        $dueDate = null;
        $stat = null;
        $courseId = null;

        if (isset($_GET['id'])) {
            if (is_numeric($_GET['id'])) {
                // If we have a number in URL, store in a variable
                $id = $_GET['id'];
    
                // Connect to SQL database
                require 'components/db.php';

                $sql = "SELECT * FROM tasks WHERE id = :id";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':id', $id, PDO::PARAM_INT);
                $cmd->execute();
    
                // Use PDO fetch command to get one row
                $task = $cmd->fetch();
                $presentDate = $task['presentDate'];
                $taskName = $task['taskName'];
                $descr = $task['descr'];
                $dueDate = $task['dueDate'];
                $stat = $task['stat'];
                $courseId = $task['courseId'];
    
                // Disconnect
                $db = null;
            }
        }
    ?>
    <body>
        <main>
            <h1>Create A Task</h1>
            <!-- Create form -->
            <form method="post" action="save-task.php">
                <fieldset>
                    <label for="presentDate">Date: </label>
                    <input name="presentDate" id="presentDate" type="date" min="2022-01-01" max="2032-01-01" value="<?php echo $presentDate; ?>"/>
                </fieldset>
                <fieldset>
                    <label for="taskName">Task: </label>
                    <input name="taskName" id="taskName" required maxlength="100" value="<?php echo $taskName; ?>"/>
                </fieldset>
                <fieldset>
                    <label for="descr">Description: </label>
                    <input name="descr" id="descr" required maxlength="150" value="<?php echo $descr; ?>"/>
                </fieldset>
                <fieldset>
                    <label for="dueDate">Due Date: </label>
                    <input name="dueDate" id="dueDate" type="date" value="<?php echo $dueDate; ?>"/>
                </fieldset>
                <fieldset>
                    <label for="stat">Status: </label>
                    <select name="stat" id="stat" value="<?php echo $stat; ?>">
                        <option value="ASSIGNED">ASSIGNED</option>
                        <option value="IN PROCESS">IN PROCESS</option>
                        <option value="COMPLETE">COMPLETE</option>
                        <option value="INCOMPLETE">INCOMPLETE</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="courseId" class="col-1">Course: </label>
                    <select name="courseId" id="courseId">
                        <?php
                            // Connect to the database
                            require 'components/db.php';

                            // Setup SQL query to fetch courses from courses table from the database and execute the query to store the results
                            $sql = "SELECT * FROM courses";
                            $cmd = $db->prepare($sql);
                            $cmd->execute();
                            $courses = $cmd->fetchAll();

                            // Loop through courses and display each record
                            foreach ($courses as $course) {
                                if ($course['id'] == $id) {
                                    echo '<option selected value="' . $course['courseId'] .'">' . $course['courseName'] . '</option>';
                                }
                                else {
                                    echo '<option value="' . $course['courseId'] .'">' . $course['courseName'] . '</option>';
                                } 
                            }

                            // Disconnect
                            $db = null;
                        ?>
                    </select>
                    <!-- Option to add new course to the list -->
                    <a href="course-info.php" class="nw-course-link">Add New Course</a>
                </fieldset>
                <br>
                <input name="id" id="id" value="<?php echo $id; ?>" type="hidden">
                <button class="save-btn">Save Task</button>
            </form>
            <!-- End Form -->
        </main>
    <?php
        require 'components/footer.php';
    ?>
    </body>
</html>
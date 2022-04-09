    <?php
        $title = 'Tasks';
        require 'components/header.php';
    ?>
        <main>
            <h1>List of Tasks</h1>
            <table id="tasks">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Course</th>
                        <?php
                            // If user is not logged in, hide the action
                            if (!empty($_SESSION['userName'])) {
                                echo '<th>Action</th>';
                            } 
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            // Connect to SQL database
                            require 'components/db.php';

                            // Setup SQL INSERT command
                            $sql = "SELECT * FROM tasks INNER JOIN courses ON tasks.courseId = courses.courseId";

                            // Create command object using db connection & sql command
                            $cmd = $db->prepare($sql);

                            // Execute the command to save the task to db table
                            $cmd->execute();

                            // Return an array that contains all rows of a result set
                            $tasks = $cmd->fetchAll();

                            // If unregistered user is present, hide tasks
                            if (!empty($_SESSION['userName'])){
                                // Loop through the tasks, new row for each task, new column for each value
                                foreach ($tasks as $task) {
                                    echo '<tr>
                                        <td>' . $task['presentDate'] . '</td>
                                        <td>' . $task['taskName'] . '</td>
                                        <td>' . $task['descr'] . '</td>
                                        <td>' . $task['dueDate'] . '</td>
                                        <td>' . $task['stat'] . '</td>
                                        <td>' . $task['courseName'] . '</td>';

                                        if (!empty($_SESSION['userName'])) {
                                            echo '<td>
                                            <a href="task-info.php?id=' . $task['id'] . '" class="edt-task">Edit</a>
                                            <a href="delete-task.php?id=' . $task['id'] . '" onclick="return Delete()" class="dlt-task">Delete</a>
                                        </td>';
                                        }                                    
                                        echo '</tr>';
                                }
                                // Disconnect
                                $db = null;
                            }
                            }
                        catch (Exception $error) {
                            // If error is caught, redirect user to the error page
                            header('location:error.php');
                        }
                    ?>
                </tbody>
            </table>
            <?php
                // If user is not registered, show message
                if(empty($_SESSION['userName'])) {
                    echo '<br><div class="sv-txt"><p><a href="login.php">Login</a> or <a href="register.php">Register</a> to start filling out your tasks.</p></div>';
                }
                else {
                    echo '';
                } 
            ?>
            <br>
            <?php
                // If user is not logged in, hide the link
                if (!empty($_SESSION['userName'])) {
                    echo '<a href="task-info.php" class="nw-task-link">Add a New Task</a>';
                } 
            ?>
            
        </main>
    <?php
        require 'components/footer.php';
    ?>
    </body>
</html>
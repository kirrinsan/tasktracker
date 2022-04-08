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
                        <th>Action</th>
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

                            // Loop through the tasks, new row for each task, new column for each value
                            foreach ($tasks as $task) {
                                echo '<tr>
                                    <td>' . $task['presentDate'] . '</td>
                                    <td>' . $task['taskName'] . '</td>
                                    <td>' . $task['descr'] . '</td>
                                    <td>' . $task['dueDate'] . '</td>
                                    <td>' . $task['stat'] . '</td>
                                    <td>' . $task['courseName'] . '</td>
                                    <td>
                                        <a href="task-info.php?id=' . $task['id'] . '" class="edt-task">Edit</a>
                                        <a href="delete-task.php?id=' . $task['id'] . '" onclick="return Delete()" class="dlt-task">Delete</a>
                                    </td>
                                    </tr>';
                            }

                            // Disconnect
                            $db = null;
                        }
                        catch (Exception $error) {
                            // If error is caught, redirect user to the error page
                            header('location:error.php');
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <a href="task-info.php" class="nw-task-link">Add a new task</a>
        </main>
    <?php
        require 'components/footer.php';
    ?>
    </body>
</html>
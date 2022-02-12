<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title>Tasks</title>
        <meta name="description" content="Display list of tasks by recieving data from the database">
    </head>
    <body>
        <h1>List of Tasks</h1>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to SQL database
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

                    // Setup SQL INSERT command
                    $sql = "SELECT * FROM tasks";

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
                            <td>' . $task['courseId'] . '</td>
                            </tr>';
                    }

                    // Disconnect
                    $db = null;
                ?>
            </tbody>
        </table>
        <a href="task-info.php">Add a new task</a>
    </body>
</html>
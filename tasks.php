<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title>Tasks</title>
        <meta name="description" content="Display list of tasks by recieving data from the database">
        <!-- CSS Stylesheet -->
        <link href="css/style.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;900&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
        <!-- Javascript -->
        <script src="js/script.js" type="text/javascript" defer></script>
    </head>
    <body>
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
                        // Connect to SQL database
                        $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

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
                                    <a href="delete-task.php?id=' . $task['id'] . '" onclick="return Delete()">Delete</a>
                                    <a href="task-info.php?id=' . $task['id'] . '">Edit</a>
                                </td>
                                </tr>';
                        }

                        // Disconnect
                        $db = null;
                    ?>
                </tbody>
            </table>
            <br>
            <a href="task-info.php" class="nw-task-link">Add a new task</a>
        </main>
    </body>
</html>
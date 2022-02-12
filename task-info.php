<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title>Task Info</title>
        <meta name="description" content="Create a form to store values for each field and send it into the database">
    </head>
    <body>
        <h1>Create A Task</h1>
        <!-- Create form -->
        <form method="post" action="save-task.php">
            <fieldset>
                <label for="presentDate">Date: </label>
                <input name="presentDate" id="presentDate" type="date"/>
            </fieldset>
            <fieldset>
                <label for="taskName">Task: </label>
                <input name="taskName" id="taskName"/>
            </fieldset>
            <fieldset>
                <label for="descr">Description: </label>
                <input name="descr" id="descr"/>
            </fieldset>
            <fieldset>
                <label for="dueDate">Due Date: </label>
                <input name="dueDate" id="dueDate" type="date"/>
            </fieldset>
            <fieldset>
                <label for="stat">Status: </label>
                <select name="stat" id="stat">
                    <option value="in-process">ASSIGNED</option>
                    <option value="in-process">IN PROCESS</option>
                    <option value="complete">COMPLETE</option>
                    <option value="incomplete">INCOMPLETE</option>
                </select>
            </fieldset>
            <fieldset>
                <label for="courseId">Course: </label>
                <select name="courseId" id="courseId">
                    <?php
                        // Connect to the database
                        $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

                        // Setup SQL query to fetch courses from courses table from the database and execute the query to store the results
                        $sql = "SELECT * FROM courses";
                        $cmd = $db->prepare($sql);
                        $cmd->execute();
                        $courses = $cmd->fetchAll();

                        // Loop through courses and display each record
                        foreach ($courses as $course) {
                            echo '<option value="' . $course['courseId'] .'">' . $course['courseName'] . '</option>';
                        }

                        // Disconnect
                        $db = null;
                    ?>
                </select>
                <!-- Option to add new course to the list -->
                <button><a href="course-info.php">Add new course</a></button>
            </fieldset>
            <button>Save</button>
        </form>
        <!-- End Form -->
    </body>
</html>
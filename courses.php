<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8"/>
        <title>Courses</title>
        <meta name="description" content="This page is for receiving course names from the database table to display list of names">
    </head>
    <body>
        <?php
            // Connect to the database
            $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

            // Setup SQL query to fetch courses from courses table from the database and execute the query to store the results
            $sql = "SELECT * FROM courses";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $courses = $cmd->fetchAll();

            // Loop through data and display each courses
            echo '<ul>';

            foreach ($courses as $course) {
                echo '<li>' . $course['courseName'] . '</li>';
            }

            echo '</ul>';

            // Disconnect
            $db = null;
        ?>
    </body>
</html>
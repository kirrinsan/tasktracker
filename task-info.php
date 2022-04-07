    <?php
        $title = 'Creating A Task';
        require 'components/header.php';
    ?>
        <main>
            <h1>Create A Task</h1>
            <!-- Create form -->
            <form method="post" action="save-task.php">
                <fieldset>
                    <label for="presentDate">Date: </label>
                    <input name="presentDate" id="presentDate" type="date" min="2022-01-01" max="2032-01-01"/>
                </fieldset>
                <fieldset>
                    <label for="taskName">Task: </label>
                    <input name="taskName" id="taskName" required maxlength="100"/>
                </fieldset>
                <fieldset>
                    <label for="descr">Description: </label>
                    <input name="descr" id="descr" required maxlength="150"/>
                </fieldset>
                <fieldset>
                    <label for="dueDate">Due Date: </label>
                    <input name="dueDate" id="dueDate" type="date"/>
                </fieldset>
                <fieldset>
                    <label for="stat">Status: </label>
                    <select name="stat" id="stat">
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
                                echo '<option value="' . $course['courseId'] .'">' . $course['courseName'] . '</option>';
                            }

                            // Disconnect
                            $db = null;
                        ?>
                    </select>
                    <!-- Option to add new course to the list -->
                    <a href="course-info.php" class="nw-course-link">Add new course</a>
                </fieldset>
                <br>
                <button class="save-btn">Save Task</button>
            </form>
            <!-- End Form -->
        </main>
        <!-- Footer -->
        <?php
            require 'components/footer.php';
        ?>
    </body>
</html>
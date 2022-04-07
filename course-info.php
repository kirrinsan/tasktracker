    <?php
        $title = 'Course Info';
        require 'components/header.php';
    ?>
    <main>
        <h1>Course Info</h1>
        <!-- Create Form -->
        <form method="post" action="save-course.php">
            <fieldset>
                <label for="courseName">Course:</label>
                <input name="courseName" id="courseName" required maxlength="50"/>
            </fieldset>
            <br>
            <button>Save</button>
        </form>
        <!-- End Form -->
    </main>
    <!-- Footer -->
    <?php
        require 'components/footer.php';
    ?>
</body>
</html>
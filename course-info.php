<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8" />
    <title>Course Info</title>
    <meta name="description" content="This page is for creating new courses">
</head>
<body>
    <h1>Course Info</h1>
    <!-- Create Form -->
    <form method="post" action="save-course.php">
        <fieldset>
            <label for="courseName">Course:</label>
            <input name="courseName" id="courseName" required maxlength="50"/>
        </fieldset>
        <button>Save</button>
    </form>
    <!-- End Form -->
</body>
</html>
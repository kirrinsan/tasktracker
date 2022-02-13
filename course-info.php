<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8" />
    <title>Course Info</title>
    <meta name="description" content="This page is for creating new courses">
    <!-- CSS Stylesheet -->
    <link href="css/style.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;900&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <h1>Course Info</h1>
        <!-- Create Form -->
        <form method="post" action="save-course.php">
            <fieldset>
                <label for="courseName">Course:</label>
                <input name="courseName" id="courseName" required maxlength="50"/>
            </fieldset>
            </br>
            <button>Save</button>
        </form>
        <!-- End Form -->
    </main>
</body>
</html>
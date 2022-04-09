<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title>TaskTracker | <?php echo $title; ?></title>
        <meta name="description" content="Display list of tasks by recieving data from the database">
        <!-- CSS Stylesheet -->
        <link href="css/style.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;900&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
        <!-- Javascript -->
        <script src="js/script.js" type="text/javascript" defer></script>
        <!--FontAwesome Icons-->
        <script src="https://kit.fontawesome.com/fb773317ff.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Header -->
        <header>
            <nav>
                <div>
                    <a href="index.php">TaskTracker</a>
                </div>
                <ul class="right-links">
                <?php
                    // Access the current session if not already accessed
                    if (session_status() == PHP_SESSION_NONE){
                        session_start();
                    }

                    if (empty($_SESSION['userName'])) {
                        echo '<li><a href="register.php">Register</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="tasks.php">Tasks</a></li>';
                    }
                    else {
                        echo '<li><a href="logout.php">Logout</a></li>
                        <li><a href="tasks.php">' . $_SESSION['userName'] . '</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
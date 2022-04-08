<?php
    $title = 'Login';
    require 'components/header.php';
?>

<main>
    <h1>Login</h1>
    <?php
    if (empty($_GET['invalid'])) {
        echo '<div class="wrn-txt"><p>Please enter your credentials</p></div>';
    }
    else {
        echo '<div class="wrn-txt"><p>Invalid Login</p></div>';
    }
    ?>
    <form method="post" action="validate-user.php">
        <fieldset>
            <label for="userName">Username:</label>
            <input name="userName" id="userName" required type="text" placeholder="scott50"/>
        </fieldset>
        <fieldset>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <div>
            <button>Login</button>
        </div>
    </form>
</main>

</body>
</html>
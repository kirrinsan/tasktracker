<?php
    $title = 'Register';
    require 'components/header.php';
?>

<main>
    <h1>Registration</h1>
    <p>Passwords must be a minimum of 8 characters, including 1 digit, 1 uppercase letter and 1 lowercase letter.</p>
    <form method="post" action="save-user.php">
        <fieldset>
            <label for="userName">Username:</label>
            <input name="userName" id="userName" required type="text" placeholder="scott50">
        </fieldset>
        <fieldset>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Dog12345">
        </fieldset>
        <fieldset>
            <label for="confirm">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
        </fieldset>
        <div>
            <button onclick="return matchingPasswords()">Register</button>
        </div>
    </form>
</main>

</body>
</html>
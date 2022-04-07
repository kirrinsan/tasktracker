<!-- Database connection -->
<?php
    // Database connection for use on any page
    $db = new PDO('mysql:host=172.31.22.43;dbname=Karen200266472', 'Karen200266472', 'nsJapNNQTJ');

    // Enable PDO error messages as these are hidden by default
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
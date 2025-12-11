<?php
    $conn = new mysqli("localhost", "krishien", "Krishien20", "crud_db");

    if($conn->connect_error)
    {
        die("Connection Failed: " . $conn->connect_error);
    }
?>
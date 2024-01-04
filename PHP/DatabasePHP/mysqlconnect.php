<?php
function connectToDatabase() {
    $host = "localhost";
    $username = "syaz";
    $password = "amirin123!";
    $database = "prestasi";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeDatabaseConnection($conn) {
    $conn->close();
}
?>

<?php
// Database connection function
function getDbConnection() {
    $servername = "localhost";
    $username = "root"; // Update with your DB username
    $password = ""; // Update with your DB password
    $dbname = "money_management"; // Update with your DB name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM app_booking WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("location:./app_view.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$con->close();
?>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['delete']))
{

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("location:./index.html");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}
}

$con->close();
?>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select data from database
$sql = "SELECT * FROM app_booking";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Blood Group</th>
    <th>Address</th>
    <th>Phone Number</th>
    <th>Category</th>
    <th>Subcategory</th>
    <th>Date</th>
    <th>Time</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["Fname"]."</td>
        <td>".$row["Mname"]."</td>
        <td>".$row["Lname"]."</td>
        <td>".$row["age"]."</td>
        <td>".$row["blood_group"]."</td>
        <td>".$row["address"]."</td>
        <td>".$row["Pnumber"]."</td>
        <td>".$row["category"]."</td>
        <td>".$row["subcategory"]."</td>
        <td>".$row["date"]."</td>
        <td>".$row["time"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

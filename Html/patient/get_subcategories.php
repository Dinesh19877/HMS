<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);



if (isset($_POST['department'])) {
    $department = $_POST['department'];
    $sql = "SELECT * FROM add_doctor WHERE department = $department";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $output = '';
        while ($row = $result->fetch_assoc()) {
            $output .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
        echo $output;
    } else {
        echo '<option value="">No Subcategories Found</option>';
    }
}

$conn->close();
?>

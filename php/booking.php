<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve form data
$Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
$Mname = mysqli_real_escape_string($conn, $_POST['Mname']);
$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$Pnumber = mysqli_real_escape_string($conn, $_POST['Pnumber']);
// $category1 = mysqli_real_escape_string($conn, $_POST['category']);
$selectedValue = $_POST['category'];
$category = '';

// Set the name based on the selected value
if ($selectedValue == '1') {
    $category = 'Gynecologist';
} elseif ($selectedValue == '2') {
    $category = 'Pediatrician';
}
elseif ($selectedValue == '3') {
    $category = 'Endocrinologist';
}
elseif ($selectedValue == '4') {
    $category = 'Oncologists';
}
elseif ($selectedValue == '5') {
    $category = 'Neurologists';
}elseif ($selectedValue == '6') {
    $category = 'Psychiatrists';
}elseif ($selectedValue == '7') {
    $category = 'Dermatologist';
}
elseif ($selectedValue == '8') {
    $category = 'Podiatrist';
}



$subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$time = mysqli_real_escape_string($conn, $_POST['time']);

// Insert data into database

$sql1 = "SELECT * FROM register ";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
$register_id = $row['id'];

$sql2 = "SELECT * FROM app_booking WHERE doctor_id = $subcategory AND time = '$time' AND date = '$date'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    echo 
    "<script type='text/javascript'>
    alert(' Appointment with the same doctor at the same time and date already exists. Please choose a different time or date.');
    window.location.href = '../Html/patient/Booking.php';
  </script>";

} else {
$sql = "INSERT INTO app_booking (Fname, Mname, Lname, age, blood_group, address, Pnumber, category, subcategory, date, time,doctor_id , user_id,action)
VALUES ('$Fname', '$Mname', '$Lname', '$age', '$blood_group', '$address', '$Pnumber', '$category', '$subcategory', '$date', '$time','$subcategory','$register_id','1')";
$result12 = mysqli_query($conn, $sql);

if ($result12) {
    echo " <script type='text/javascript'>
    alert('Booking successfully completed.');
    window.location.href = '../Html/patient/Booking.php';
  </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>



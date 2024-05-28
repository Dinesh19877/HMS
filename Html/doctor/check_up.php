<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["submit"])){
$Disease = $_POST['Disease'];
$Description = $_POST['Description'];
$Medicines = $_POST['Medicines'];


$row3 = $_SESSION['p_id'];

$q = "insert into check_up (Disease,Description,Medicines,p_id) Values('$Disease','$Description','$Medicines','$row3')";
$w = mysqli_query($con , $q);
}

?>
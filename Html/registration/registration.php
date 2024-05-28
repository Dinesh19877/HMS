<?php
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['name'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$password = $_POST['password'];
$token = bin2hex(random_bytes(15));
$query = "SELECT * FROM register WHERE email='$email'";
$result = mysqli_query ($conn, $query);
$prenet = mysqli_num_rows($result);
if($prenet >0){ 
    header("Location:registration1.php ");

}

else {
    header("Location:registration1.php ");
    $sql = "insert into register (name , email , pnumber , password , token) Values('$name','$email' , '$pnumber' , '$password' , '$token')";
    $run = mysqli_query($conn,$sql);
    if($run){
        $_SESSION['registration_success'] = true;
}
    }
}

$conn->close();

?>
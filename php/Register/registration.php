<?php
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$password = $_POST['password'];
$token = bin2hex(random_bytes(15));
$query = "select * from register where email = '$email'";
$result = mysqli_query ($conn, $query);
$present = mysqli_num_rows($result);

if($present >0){ 
    header("Location:../../Html/registration/registration.php ");
  
}

else {
    header("Location:../../Html/registration/registration.php ");
    $sql = "insert into register (name , email , pnumber , password , token) Values('$name','$email' , '$pnumber' , '$password' , '$token')";
    $run = mysqli_query($conn,$sql);
}

?>
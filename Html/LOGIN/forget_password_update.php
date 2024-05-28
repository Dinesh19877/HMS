<?php
session_start();

if(isset($_POST['submit'])){
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

$email = $_POST["email"];
$sql = "SELECT * from register WHERE email = '$email'";
$query1 = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query1);
if($data){

    $password = $_POST['password'];
    $updatequery = "UPDATE register SET password = '$password' WHERE email = '$email'";
    $query = mysqli_query($conn , $updatequery);
    header('location:./Patient_login.php');
   

  
}}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/REgister/forget.css">
    <style>
        .email{
    margin: 20px;
    width: 80%;
    padding: 12px;
    font-size: 20px;
}
.box{
    height: 50vh !important;
}
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="box">
            <h2 class="heading">Choose a new password</h2>
            <p class="sub_heading">Create a new password that is at least 6 characters long. A strong password is combination of letters, numbers..</p>
            <input type="email" name="email" hidden  value="<?php echo $_SESSION['email']?>" class="email" id="email" placeholder="New password "><br>
            
            <input type="text"  name="password" class="email" id="password" placeholder="New password "><br>

            <input type="submit" value="Cancel" name="" id="" class="btn1">
            <input type="submit" value="Update" name="submit" id="submit" class="btn">

        </div>
        </form>
    </div>
    
</body>
</html>
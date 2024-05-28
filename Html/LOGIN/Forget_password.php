<?php

session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// if (isset($_SESSION['user_id'])) {
//     header("Location: dashboard.php");
//     exit();
// }

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $_SESSION['email']=$email;

    $sql = "SELECT * FROM register WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);

    if ($data) {
        $otp = rand(100000, 999999); // creates random numberrs for opt code
        $otp_expiry = date("Y-m-d H:i:s", strtotime("+3 minute"));
        $subject= "Your MediCare account recovery code";
        $message="Enter the following password to reset code: $otp";

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dineshsharama7799@gmail.com'; //host email 
        $mail->Password = 'xvqrnueduqxytqss'; // app password of your host email
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        $mail->setFrom('example@gmail.com', 'MediCare Hospit1al');//Sender's Email & Name
        $mail->addAddress($email,$name); //Receiver's Email and Name
        $mail->Subject = ("$subject");
        $mail->Body = $message;
        $mail->send();

        $sql1 = "UPDATE register SET otp='$otp', otp_expiry='$otp_expiry' WHERE id=".$data['id'];
        $query1 = mysqli_query($conn, $sql1);

        $_SESSION['temp_user'] = ['id' => $data['id'], 'otp' => $otp];
        header("Location: otp_verification.php");
        exit();
    }
    else{
        echo "oops !! E-mail is not registered... ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/REgister/forget.css">
    <style>
        #email{
    margin: 20px;
    width: 80%;
    padding: 12px;
    font-size: 20px;
}
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="box">
            <h2 class="heading">Find your account</h2>
            <p class="sub_heading">Please enter your email to search for your account.</p>
            <input type="text" name="email" id="email" placeholder="Email "><br>
          <a href="">  <input type="submit" value="Cancel" name="" id="" class="btn1"></a>
            <input type="submit" value="Search" name="submit" id="submit" class="btn">

        </div>
        </form>
    </div>
    
</body>
</html>
<?php
session_start();

$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_otp = $_POST['otp'];
    $stored_otp = $_SESSION['temp_user']['otp'];
    $user_id = $_SESSION['temp_user']['id'];

    $sql = "SELECT * FROM register WHERE id='$user_id' AND otp='$user_otp'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);

    if ($data) {
        $otp_expiry = strtotime($data['otp_expiry']);
        if ($otp_expiry >= time()) {
            $_SESSION['user_id'] = $data['id'];
            unset($_SESSION['temp_user']);
            header("Location: ./forget_password_update.php");
            exit();
        } 
        else {
  echo  'dcndv';
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="../../CSS/REgister/forget.css">

    <style type="text/css">
        .email{
    margin: 20px;
    width: 80%;
    padding: 12px;
    font-size: 20px;
}
.box{
    width: 36.5% !important;
   
}
     
        button{
            background-color:  rgba(0, 128, 0, 0.621) ;
            width: 100px;
            padding: 10px;
            margin-left: 400px;
            color: white;
            border-radius:5px;
            outline:none;
            border:none;
        }
        button:hover{
            cursor: pointer;
            opacity: .9;
        }
    </style>
</head>
<body>
   


<div class="container">
        <form action="otp_verification.php" method="post">
        <div class="box">
            <p class="sub_heading">Enter the 6 Digit OTP Code that has been sent <br> to your email address: <?php echo $_SESSION['email']; ?>..</p>
            <label class="sub_heading" style="font-weight: bold; font-size: 18px;" for="otp">Enter OTP Code:</label><br>
         
            <input type="text" name="otp" class="email" id="email" placeholder="Six-Digit OTP "><br>

          <button type="submit">Verify OTP</button>

        </div>
        </form>
    </div>

</body>
</html>



<?php 
session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");
if(isset($_POST["submit"])){
  
$pnumber = $_POST['pnumber'];
$password = $_POST['password'];
$q = "select * from add_doctor where pnumber = '$pnumber' && password = '$password'";
if($r= mysqli_num_rows(mysqli_query($conn,$q))){
  $fetch_id = "SELECT id FROM add_doctor WHERE pnumber = '$pnumber' ";
  $result = mysqli_query($conn,$fetch_id);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['myuser'] = $row['id'];

  header('location:../../Html/doctor/Doc_dashboard.php');

}

else{
$error[] = 'Incorrect Number or password';

}
}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="../../CSS/REgister/registration.css" />
  <link rel="stylesheet" href="../../Html/doctor/Doc_dashboard.html">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <style>
       
    .forget{
        font-size: 1.5rem;
        text-decoration: none;
    }
    .form{
        width: 47rem;
    }
    .textfield{
  width: 30rem !important;
 

}
.button-11{
	width: 15rem !important;
    font-size: 2rem;
}
.button-1:hover{
	background-color: rgb(144, 221, 144) !important;
	color: black;
	}
    .account11{
        position: relative;
        left: 3rem;
    }
    .pass{
  width: 26rem !important;

    }
    .error_msg{
      height: 5rem;
      width: 80%;
      background-color:rgb(240, 97, 8);
      font-size:2rem;
      color:white;
      line-height:5rem;
      text-align:center;
      margin:auto;
      margin-top:1rem;
      display: block;

    }
    .topbar{
      position: absolute;
      display: flex;
      top: 20px;
      left: 30px;
      width: 100px;
      height: 40px;
background-color: rgba(0, 128, 0, 0.596);
border-radius: 10px;

    }
    .topbar a{
      font-size: 20px;
      font-weight: bold;
      text-decoration: none;
      text-transform: capitalize;
      color:white ;
 margin: auto; 
 margin-left: -5px;  
    line-height: 40px;


    }
    .topbar i{
      font-size: 20px;
      line-height: 40px;
      color: white;
      margin: 0 10px;
    }
  </style>
</head>

<body>
<div class="container"></div>
<div class="topbar">
  <i class="fa-solid fa-arrow-left"></i>
    <a href="../../index.html">home</a>
  </div>
  <!-- ======form ======= -->
  <form action="" method="post" name="FORM"  id="form" class="form" autocomplete="on">
    <h1 class="head"> Doctor Login </h1>
    <?php
    if(isset($error)){
      foreach($error as $error){
        echo '<span class="error_msg">'.$error.'</span>';
  
      };
    };
    
    
    ?>
<!-- <span class="error_msg">Incorrect email or password</span> -->

    <!-- ===========================email============================== -->
    <div class="form_con">
      <input type="text" name="pnumber" id="pnumber" class="textfield"  placeholder=" " />
      <label class="form-label">Enter Number</label>
      <i class="fa-solid fa-envelope icon"></i>
      <p class="error" id="pnumber_error"></p>

 </div>
    <!-- ===========================password============================== -->
    <div class="form_con">
      <input type="password" name="password" id="password" class="textfield pass"  placeholder=" " />
      <label class="form-label">Enter Password</label>
      <i class="fa-solid fa-lock icon"></i>
      <i class="bi bi-eye-slash passshow" id="togglePassword"></i>
      <p class="error" id="password_error"></p>
    </div>

    
    <div class="form_con btn" >
      <input type="submit" name="submit" id="submit" class="button-1 button-11" value="Login"  />
    </div>

  </form>
</body>
<script src="../../Js/register/registration.js"></script>

</html>
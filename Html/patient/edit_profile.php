<?php
session_start();
if(isset($_POST['submit']))
{
  $con = mysqli_connect('localhost', 'root', '', 'hms');
  $email = $_POST['email'];
  $sql = "select * from register where email = '$email'";
  $query = mysqli_query($con, $sql);
  $rst = mysqli_fetch_array($query);
  if($rst)
  {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $pnumber = $_POST['pnumber'];

    $_SESSION['username']=$name;
    $_SESSION['password1']=$password;
    $_SESSION['pnumber1']=$pnumber;

    $update = "UPDATE register SET name ='$name' , password ='$password' , pnumber ='$pnumber' WHERE email = '$email' ";
    $update1 = mysqli_query($con , $update);
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
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
  <!--========bcg image for form ===========  -->
  <div class="container"></div>

  <!-- ======form ======= -->
  <form action="" method="post" name="FORM" onsubmit="return validform()" id="form" class="form" autocomplete="on">
    <h1 class="head">Edit profile </h1>

    <!-- =======================username===================== -->
    
    <div class="form_con">
      <input type="text" name="name" id="name" class="textfield"  value="<?php echo $_SESSION['username']; ?>" placeholder=" " />
      <label class="form-label">Enter your full name</label>
      <i class="fa-solid fa-user icon"></i>
      <p class="error" id="name_error"></p>
    </div>
    <!-- ===========================email============================== -->
    <div class="form_con">
      <input type="email" name="email" id="email" class="textfield"  value="<?php echo $_SESSION['email1']; ?>" readonly placeholder=" " />
      <label class="form-label">Enter your E-mail</label>
      <i class="fa-solid fa-envelope icon"></i>
      <p class="error" id="email_error"></p>

    </div>
    <!-- ===========================phone number============================== -->
    <div class="form_con">
      <input type="text" maxlength="10" name="pnumber" id="pnumber" class="textfield" value="<?php echo $_SESSION['pnumber1']; ?>"   placeholder=" " />
      <label class="form-label">Enter your Phone number</label>
      <i class="fa-solid fa-phone icon"></i>
      <p class="error" id="pnumber_error"></p>
    </div>
    <!-- ===========================password============================== -->
    <div class="form_con">
      <input type="password" name="password" id="password" value="<?php echo $_SESSION['password1']; ?>" class="textfield pass"  placeholder=" " />
      <label class="form-label">Enter Password</label>
      <i class="fa-solid fa-lock icon"></i>
      <i class="bi bi-eye-slash passshow" id="togglePassword"></i>
      <p class="error" id="password_error"></p>
    </div>
    <!-- ===========================re-password=========================== -->
    

    <div class="form_con btn" >
      <input type="submit" name="submit" id="submit" class="button-1" value="Update" placeholder="" />
    </div>
    <div class="form_con btn" >
   <a href="./del_own.php?">   <input type="submit" name="delete" style="margin-top: -18px;" id="delete" class="button-1" value="Delete" placeholder="" /></a>
    </div>

   
  </form>
</body>
<script src="./edit_profile_validate.js"></script>
</html>

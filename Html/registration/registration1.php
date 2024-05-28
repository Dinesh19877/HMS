
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="../../CSS/REgister/registration.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="script.js" defer></script>

  <script>
        $(document).ready(function() {
            $('#email').blur(function() {
                var email = $(this).val();
                $.ajax({
                    url: 'email_error.php',
                    type: 'POST',
                    data: {email: email},
                    success: function(response) {
                        $('#email_error').html(response);
                    }
                });
            });
        });
    </script>
</head>

<body>
  <!--========bcg image for form ===========  -->
  <div class="container"></div>

  <!-- ======form ======= -->
  <form action="registration.php"  method="post" name="FORM" onsubmit="return validform()" id="form" class="form" autocomplete="on">
    <h1 class="head">Register here</h1>

    <!-- =======================username===================== -->

    <div class="form_con">
      <input type="text" name="name" id="name" class="textfield"  placeholder=" " />
      <label class="form-label">Enter your full name</label>
      <i class="fa-solid fa-user icon"></i>
      <p class="error" id="name_error"></p>
    </div>
    <!-- ===========================email============================== -->
    
    <div class="form_con">
      <input type="email" name="email" id="email" class="textfield"  placeholder=" " />
      <label class="form-label">Enter your E-mail</label>
      <i class="fa-solid fa-envelope icon"></i>
      <p class="error" id="email_error"></p>

    </div>
    <!-- ===========================phone number============================== -->
    <div class="form_con">
      <input type="text" maxlength="10" name="pnumber" id="pnumber" class="textfield"  placeholder=" " />
      <label class="form-label">Enter your Phone number</label>
      <i class="fa-solid fa-phone icon"></i>
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
    <!-- ===========================re-password=========================== -->
    <div class="form_con">
      <input type="password" name="repassword" id="repassword" class="textfield pass"  placeholder=" " />
      <label class="form-label">Enter confirm Password</label>
      <i class="bi bi-eye-slash passshow" id="togglePassword1"></i>
      <i class="fa-solid fa-lock icon"></i>
      <p class="error" id="repassword_error"></p>
    </div>

    <div class="form_con btn" >
      <input type="submit" name="sumb" id="submit success" class="button-1 btn" value="Register" placeholder=""  />
    </div>

    <div class="form_con btn" >
<p class="account">Already have an account ? <a href="../../Html/LOGIN/Patient_login.php">Log in</a></p>    </div>
  </form>
</body>
<script src="../../Js/register/registration.js"></script>


</html>

 <?php
 session_start();
 if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
     echo '<script>
     Swal.fire({
      text: "Registration Successful",
      icon: "success"
    });
     </script>';
     $_SESSION['registration_success'] = false; // Reset the session variable
 }
 ?>
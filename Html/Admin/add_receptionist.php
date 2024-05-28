<?php
 if(isset($_POST['submit'])){
 $con= mysqli_connect("localhost","root","","HMS");

$name = $_POST['name'];
$date = $_POST['date'];
$address= $_POST['address'];
$pnumber = $_POST['pnumber'];
$email = $_POST['email'];
$password = $_POST['password'];



$query = "insert into Add_recp(name,date,address,pnumber,email,password) Values('$name','$date','$address','$pnumber','$email','$password')";
$result=mysqli_query($con,$query);
if($result)
{
	echo 'data submmite'; 

}
else 
{
	echo 'Something went wrong'; 
}
}

		


	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../CSS/Admin/Admin.css">
    <link rel="stylesheet" href="../../CSS/dashboard/booking.css">
    <link rel="stylesheet" href="../../CSS/Admin/add_doc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


</head>

<body>
    <nav class="navbar">
        <div class="logo">mediCare</div>

        <!-- =========search bar======== -->
        <div class="search">
            <i class="fa-solid fa-magnifying-glass  search_icon"></i>
            <input type="search" id="search_bar" placeholder="Search">
        </div>


        <!-- =========profile============== -->
        <div class="profile">
            <input type="checkbox" name="check1" id="check1">
            <label for="check1" class="menu-list">
                <img src="../../img_file/profile.png" class="profile_pic" alt="">
                <i class="fa-solid fa-caret-down drop"></i>
            </label>
            <!-- =======================profile====================== -->
            <div class="profile_contents">
                <div class="profile_name">
                    <p class="patients_name"> Admin
                    </p>


                </div>
                <div class="sideNav_menu1">
                    <i class="fa-solid fa-screwdriver-wrench icon3"></i>
                    <a href="" class="dashboard1">Edit profile</a>
                    <i class="fa-solid fa-chevron-right icon3 enter"></i>
                </div>
                <div class="sideNav_menu1">
                    <i class="fa-solid fa-gear icon3"></i>
                    <a href="" class="dashboard1">Setting & privacy</a>
                    <i class="fa-solid fa-chevron-right icon3 enter"></i>
                </div>
                <div class="sideNav_menu1">
                    <i class="fa-solid fa-circle-question icon3"></i>
                    <a href="" class="dashboard1">Help & support</a>
                    <i class="fa-solid fa-chevron-right icon3 enter"></i>
                </div>
                <div class="sideNav_menu1">
                    <i class="fa-solid fa-right-from-bracket icon3 "></i>
                    <a href="../../php/logout.php" class="dashboard1">Log out</a>
                </div>
                <div class="privacyInfo">
                    <p class="privacy">Privacy. Terms . Advertising. Ad choices<span></span>. Cookies . More . DD &#169
                        2024</p>
                </div>
            </div>
        </div>
    </nav>


    <!-- =============working space============ -->
    <div class="container">
        <!-- side nav -->
        <div class="side_nav">

<div class="sideNav_menu">
    <i class="fa-solid fa-house icon "></i>
    <a href="./admin_dashboard.php" class="dashboard">Dashboard</a>
</div>
<div class="sideNav_menu">
    <i class="fas fa-user icon "></i>
    <a href="./app_view.php" class="dashboard">View Booking</a>
</div>


<div class="sideNav_menu">
    <i class="fas fa-user-md icon "></i>
    <input type="checkbox" name="check2" id="check2">
    <label for="check2" class="menu-list dashboard doctor_list">Doctor</label>
    <ul class="menulist">
        <li><a href="./add_doctor.php"> Add Doctor</a></li>
        <li><a href="./view_doctor.php"> View Doctor</a></li>

    </ul>


</div>
<div class="sideNav_menu">
    <i class="fas fa-hospital-user icon "></i>
    <input type="checkbox" name="check3" id="check3">
    <label for="check3" class="menu-list dashboard recep_list">Receptionist</label>
    <ul class="menulist recep">
        <li><a href="./add_receptionist.php"> Add Receptionist</a></li>
        <li><a href="./view_receptionist.php"> View Receptionist</a></li>

    </ul>
</div>
<div class="sideNav_menu">
    <i class="fas fa-user-plus icon "></i>
    <a href="./register_patient.php" class="dashboard">Register Patient</a>
</div>
<div class=" sideNav_menu sideNav_menu11">
    <i class="fa-solid fa-right-from-bracket icon "></i>
    <a href="../../php/logout.php" class="dashboard">log Out</a>

</div>
</div>
        <div class="workSpace">


            <form action="" class="booking_form" name="FORM" method="post" class="FORM" id="FORM"
                onsubmit="return validform()"  enctype="multipart/form-data">

                <p class="booking_form_heading">Add  Receptionist</p>
                <div class="image_form">
                    <div id="form1">






                        <p class="sub_heading">Personal details</p>
                        <div class="input_box">
                            <div class="f_name1 ">
                                <label for="">Name</label>
                                <input class="doc_full_name" type="text" id="name" name="name">
                                <p class="error" id="full_name_error"></p>
                            </div>

                        </div>

                        <div class="input_box IInd_line">
                            <div class="l_name">
                                <label for="">DOB</label>
                                <input type="date" class="department DOB" id="date" name="date">
                                <p class="error" id="date_error"> </p>
                            </div>

                            <div class="f_name">
                                <label for="">Address</label>
                                <input type="text" id="address" name="address">
                                <p class="error" id="address_error"></p>
                            </div>

                        </div>
                        <div class="input_box third_line">
                            <div class="l_name">
                                <label for="">Mobile No.</label>
                                <input type="text" id="Pnumber" name="pnumber">
                                <p class="error" id="pnumber_error"></p>
                            </div>
                            <div class="gender_option1">
                                <label for="">Gender</label>
                                <div class="gender_option">
                                    <div class="gender_opt">
                                        <input type="radio" name="gender" id="check_male" checked>
                                        <label for="check_male">Male</label>
                                    </div>
                                    <div class="gender_opt female">
                                        <input type="radio" name="gender" id="check_female">
                                        <label for="check_female">Female</label>
                                    </div>
                                    <div class="gender_opt">
                                        <input type="radio" name="gender" id="check_other">
                                        <label for="check_other">Others</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  

                </div><br>



                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">E-mail</label>
                        <input type="text" id="email" name="email">
                        <p class="error" id="email_error"> </p>

                    </div>
                    <div class="m_name">
                        <label for="">Password</label>
                        <input type="text" class="department" id="password" name="password">
                        <p class="error" id="password_error"> </p>

                    </div>
                    
            
                <div class="input_box">
                    <input type="submit" name="submit" value="Add" class="Booking_btn">
                </div>

            </form>
        </div>


    </div>

</body>
<script src="../../Js/Add_doc.js"></script>

</html>
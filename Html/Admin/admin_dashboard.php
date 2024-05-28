<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="../../CSS/dashboard/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../CSS/Admin/Admin.css">

</head>

<body>
    <nav class="navbar">
        <div class="logo">mediCare  </div>

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

            <div class="box">
            <div class="sub_box">

<h3 class="title">Book Appointment View</h3>
<img src="../../img_file/Appointment.png" width="70%" class="title_img" alt="">

</div>
              
                <div class="sub_box">

<h3 class="title">Doctor</h3>
<img src="../../img_file/doctor.png" width="70%" class="title_img" alt="">

</div> 
 <div class="sub_box">
                    <h3 class="title">Receptionist</h3>
                    <img src="../../img_file/patient.png" width="70%" class="title_img" alt="">
                </div>
                <div class="sub_box">

                <h3 class="title">View Patient</h3>
                    <i class="fas fa-user-plus  title_img " style="font-size: 115px;color: darkorange;"></i>

                </div>
             
                
             
            </div>




        </div>
    </div>

</body>


</html>
<?php

session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

if(!isset($_SESSION['username'])){
    header('loaction:../../Html/LOGIN/Patient_login.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="../../CSS/dashboard/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

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
            <div class="profile_contents">
                <div class="profile_name">
                    <p class="patients_name">
                        <?php echo $_SESSION['username']; ?>
                    </p>


                </div>

                <div class="sideNav_menu1">
                    <i class="fa-solid fa-screwdriver-wrench icon3"></i>
                    <a href="./edit_profile.php" class="dashboard1">Edit profile</a>
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
        <div class="side_nav animation loading">

            <div class="sideNav_menu">
                <i class="fa-solid fa-house icon "></i>
                <a href="#" class="dashboard">Dashboard</a>
            </div>
            <div class="sideNav_menu">
                <i class="fa-regular fa-calendar-check icon "></i>
                <a href="./Booking.php" class="dashboard">Book Appointment</a>
            </div>
            <div class="sideNav_menu">
                <i class="fa-solid fa-user-doctor icon "></i>
                <a href="./doctor_list.php" class="dashboard">Doctor's List</a>
            </div>
            <div class="sideNav_menu">
                <i class="fa-solid fa-clock-rotate-left icon"></i>
                <a href="./history.php" class="dashboard">My History</a>
            </div>
            <div class="sideNav_menu">
                <i class="fa-solid fa-file-medical icon"></i>
                <a href="./prescription.php" class="dashboard">Prescription</a>
            </div>

            <div class=" sideNav_menu sideNav_menu11">
                <i class="fa-solid fa-right-from-bracket icon "></i>
                <a href="../../php/logout.php" class="dashboard">log Out</a>

            </div>
        </div>
        <div class="workSpace">

            <div class="box loading">

                <div class="sub_box">
                    <div class="title1">
                        <h3 class="title">My Profile</h3>
                    </div>
                    <div class="thumbnail">
                        <img src="../../img_file/patient.png" width="70%" class="title_img" alt="">
                    </div>
                </div>
                <div class="sub_box">

                    <h3 class="title">Book Appointment</h3>
                    <div class="thumbnail">

                        <img src="../../img_file/Appointment.png" width="70%" class="title_img" alt="">
                    </div>
                </div>
                <div class="sub_box">

                    <h3 class="title">Doctor's List</h3>
                    <div class="thumbnail">
                        <img src="../../img_file/doctor.png" width="70%" class="title_img" alt="">
                    </div>
                </div>
                <div class="sub_box">

                    <h3 class="title">My History</h3>
                    <div class="thumbnail">
                        <img src="../../img_file/history.png" width="70%" class="title_img" alt="">
                    </div>
                </div>
                <div class="sub_box">

                    <h3 class="title">Prescription</h3>
                    <div class="thumbnail">
                        <img src="../../img_file/prescription.png" width="70%" class="title_img" alt="">
                    </div>
                </div>
            </div>




        </div>
    </div>
    </div>

</body>
<script>
    setTimeout(function () {
        document.querySelector(".box").classList.remove("loading")
    }, 3000)

    setTimeout(function () {
        document.querySelector(".animation").classList.remove("loading")
    }, 3000)
</script>

</html>
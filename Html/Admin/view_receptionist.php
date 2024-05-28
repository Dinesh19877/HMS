<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../CSS/Admin/Admin.css">
    <link rel="stylesheet" href="../../CSS/dashboard/history.css">
<style>
th,td{
    font-size:16px;
}
</style>

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

      
<div class="history_box">
    <h3 class="heading">View Receptionist</h3>

    <table border="1px" class="table" >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th style="width:300px;">Email</th>
                        <th>Password</th>
                        <th>Number</th>


                        
            
            
                    </tr>
     <?php
     $conn = mysqli_connect('localhost','root','','hms');
     $query = "select * from add_recp ";
     $data = mysqli_query($conn,$query);
     $total = mysqli_num_rows($data);
            
    while ($row = mysqli_fetch_assoc($data)) {?>
        <tr>

        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name']?></td>

        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['address'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['password'];?></td>
        <td><?php echo $row['pnumber'];?></td>
            ?>
      

        </tr>
        <?php

    }

?>


                </table>
</div>




        </div>
    </div>
    </div>

</body>

</html>
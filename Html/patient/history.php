<?php

session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

if(!isset($_SESSION['username'])){
    header('loaction:../../Html/LOGIN/Patient_login.php');

}



$email = $_SESSION['email1'];
$query = mysqli_query($conn,"select * from register where email = '$email'");
$rowr =mysqli_fetch_array($query);
$id = $rowr['id']; 




$query1 = mysqli_query($conn,"select * from app_booking where user_id = '$id'");

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="../../CSS/dashboard/history.css">
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
                <<div class="profile_name">
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
        <div class="side_nav">

            <div class="sideNav_menu">
                <i class="fa-solid fa-house icon "></i>
                <a href="./patient_dashboard.php"  class="dashboard">Dashboard</a>
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
                <a href="" class="dashboard">log Out</a>
            </div>
        </div>
        <div class="workSpace">

<div class="history_box">
    <h3 class="heading">Patient History</h3>

    <table border="1px" class="table" >
                    <tr>
                        <th>Patient_ID</th>
                        <th>Patient's Name</th>
                        <th>Speciality</th>
                        <th>Applied Date</th>
                        <th>Applied Time</th>
                        <th>Action</th>
                        <th>Patient's Details</th>

                        
            
            
                    </tr>
     <?php
       
        if ($query1) {
            
    while ($row = mysqli_fetch_assoc($query1)) {?>
        <tr>

        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['Fname'] . ' ' . $row['Lname']; ?></td>

        <td><?php echo $row['category'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['time'];?></td>
        <td>
              <?php 
              $action = "";
              switch ($row["action"]) {
                case 1:
                  $action = "Pending";
                  break;
                case 2:
                  $action = "Accept";
                  break;
                case 3:
                  $action = "Completed";
                  break;
                  case 4:
                    $action = "Reject";
                    break;
              }
              echo $action;
            ?>
            </td>
      
        <td> <a href="view_Details.php?id=<?php echo $row['id'];?>">View Details</a></td>";

        </tr>
        <?php

    }
} 

?>


                </table>
</div>




        </div>
    </div>
    </div>

</body>

</html>
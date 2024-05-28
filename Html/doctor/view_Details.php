<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = new mysqli($servername, $username, $password, $dbname);
$id = $_GET['id'];
$res = mysqli_query($con, "SELECT * FROM app_booking WHERE id=$id LIMIT 1");
$row = mysqli_fetch_array($res);
$i=0
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="../../CSS/dashboard/booking.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../CSS/dashboard/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
       textarea{
        font-size: 20px;
        resize:none;
    
    padding: 1rem;
    }
    label{
        font-size: 16px;
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
            <div class="profile_contents">
                <div class="profile_name">
                    <p class="patients_name"> Doctor
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
                <i class="fa-regular fa-calendar-check icon "></i>
                <a href="./Booking.html" class="dashboard">View Appointment</a>
            </div>
            
            
         

            <div class=" sideNav_menu sideNav_menu11">
                <i class="fa-solid fa-right-from-bracket icon "></i>
                <a href="../../php/logout.php" class="dashboard">log Out</a>

            </div>
        </div>
        <div class="workSpace">
        
            <div class = "invoice-wrapper" id = "print-area">
            
                <div class = "invoice">
                    <div class = "invoice-container">
                        <div class = "invoice-head">
                            <div class = "invoice-head-top">
                                
                                <div class = "invoice-head-top-left text-start">
    <img src="../../img_file/logo.png" alt="">
                                </div>
    
                                <div class = "invoice-head-bottom-left">
                                    <ul>
                                        <li>E-mail :medicare123@gmail.com</li>
                                        <li>Phone NO : 9847019877</li>
                                        <li>Phone NO : 9847019877</li>
    
                                    </ul>
                                </div>
                                <div class = "invoice-head-bottom-right">
                                    <ul class = "text-end">
                                        <li>Location : Sunwal -7 , Nawalparasi</li>
                                        <li>website : www.medicare.com</li>
                                    </ul>
                                </div>
                                <div class = "invoice-head-top-right text-end">
                                    <h3>Prescription</h3>
                                </div>
                            </div>
                            <div class = "hr"></div>
                            <div class = "invoice-head-middle">
                                <div class = "invoice-head-middle-left text-start">
                                    <p><span class = "text-bold">Date & Time </span>: <?php echo $row['reg_date']; ?></p>
                                </div>
                                <div class = "invoice-head-middle-right text-end">
                                    <p><spanf class = "text-bold">Prescription No: </span><?php 
                                    echo $row['id']; 
                                    $_SESSION['p_id'] = $row['id'];
                                    ?>
                                    </p>
                                </div>
                            </div>

                            
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id" id="id">
                            <div class = "hr"></div>
                            <div class = "invoice-head-bottom">
                                <div class = "invoice-head-bottom-left">
                                    <ul>

                                        <li class = 'text-bold'>patient</li>
                                        <li>Name : <?php echo $row['Fname'] . ' ' . $row['Lname']; ?> </li>
                                        <li>Age :<?php echo $row['age']; ?></li>
                                        <li>Location : <?php echo $row['address']; ?></li>
                                        <li>Phone NO : <?php echo $row['Pnumber']; ?></li>
                                        <li>blood Group : <?php echo $row['blood_group']; ?></li>
                                    </ul>
                                </div>
                                <div class = "invoice-head-bottom-right">
                                    <ul class = "text-end">
                                        <li class = 'text-bold'>Doctor</li>
                                        <li>ID : <?php echo $row['subcategory']; ?></li>
                                        <li>Speciality : <?php echo $row['category']; ?></li>
                                        <li> Date :  <?php echo $row['date']; ?></li>
                                        <li> Time : <?php echo $row['time']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class = "overflow-view">
     


<form action="./check_up.php" method="post">

    <label for="">Disease</label>
<textarea name="Disease" id="Disease" cols="50" rows="5"></textarea>
    <label for="">Description</label>
<textarea name="Description" id="Description" cols="50" rows="5"></textarea>

    <label for="">Medicines</label>
<textarea name="Medicines" id="Medicines" cols="50" rows="5"></textarea>

<input type="submit" id="submit" name="submit">
</form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
    
</body>
<script src="../../Js/booking.js" defer></script>
</html>
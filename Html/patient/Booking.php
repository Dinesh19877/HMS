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
    <link rel="stylesheet" href="../../CSS/dashboard/booking.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <script>
        $(document).ready(function(){
            $('#category').change(function(){
                var department = $(this).val();
                $.ajax({
                    url: 'get_subcategories.php',
                    type: 'post',
                    data: {department: department},
                    success: function(response){
                        $('#subcategory').html(response);
                    }
                });
            });
        });
    </script>
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
        <div class="side_nav">

            <div class="sideNav_menu">
                <i class="fa-solid fa-house icon "></i>
                <a href="./patient_dashboard.php" class="dashboard">Dashboard</a>
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
                <a href="../../php/logout.php" class="dashboard">log Out</a>mjm                                                            
            </div>
        </div>




        <!-- =================================Appointment booking=============================== -->
        <div class="workSpace">
            <form action="../../php/booking.php" method="post" class="booking_form FORM" name="FORM" onsubmit="return validform1()" id="form" autocomplete="on">
                <p class="booking_form_heading">New Appointment</p>

                <p class="sub_heading">Patient's details</p>
                <div class="input_box">
                    <div class="f_name">
                        <label for="">First Name</label>
                        <input type="text" id="Fname" name="Fname">
                        <p class="error" id="Fname_error"></p>
                    </div>
                    <div class="m_name">
                        <label for="">Middle Name</label>
                        <input type="text" id="Mname" name="Mname">
                        <p class="error" id="Mname_error"></p>

                    </div>
                    <div class="l_name">
                        <label for="">Last Name</label>
                        <input type="text" id="Lname" name="Lname">
                        <p class="error" id="Lname_error"></p>

                    </div>
                </div>
 
                <div class="input_box IInd_line">
                    <div class="f_name">
                        <label for="">DOB</label>
                        <input type="text" class="age" id="age" name="age">
                        <p class="error" id="age_error"></p>

                    </div>
                    <div class="l_name">
                        <label for="">Blood Group</label>
                        <input type="text" id="blood_group" name="blood_group">
                        <p class="error" id="bgroup_error"></p>

                    </div>
                    <div class="gender_option1">
                        <label for="">Gender</label>
                        <div class="gender_option">
                            <div class="gender_opt">
                                <input type="radio" name="gender" id="check_male" checked >
                                <label for="check_male">Male</label>
                            </div>
                            <div class="gender_opt female">
                                <input type="radio" name="gender" id="check_female" >
                                <label for="check_female">Female</label>
                            </div>
                            <div class="gender_opt">
                                <input type="radio" name="gender" id="check_other" >
                                <label for="check_other">Others</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input_box third_line">
                    <div class="f_name">
                        <label for="">Address</label>
                        <input type="text" id="address" name="address">
                        <p class="error" id="address_error"></p>

                    </div>
                    <div class="l_name">
                        <label for="">Mobile No.</label>
                        <input type="text" id="Pnumber" name="Pnumber" >
                        <p class="error" id="pnumber_error"></p>

                    </div>
                </div><br><br><br>

                <p class="sub_heading">Appointment details</p>
                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">Speciality</label>
                        <select class="department" id="category" name="category">
                            <option hidden>Select Speciality</option>
                            <option value="1">Gynecologist</option>
                            <option value="2">Pediatrician</option>
                            <option value="3">Endocrinologist</option>
                            <option value="4">Oncologists</option>
                            <option value="5">Neurologists</option>
                            <option value="6">Psychiatrists</option>
                            <option value="7">Dermatologist</option>
                            <option value="8">Podiatrist</option>

                        </select>
                        <p class="error" id="department_error"></p>

                    </div>
                    <div class="m_name">
                        <label for="">Doctor</label>
                        <select class="doctor_list department" id="subcategory" name="subcategory">


                           
                        </select>
                       
                        <p class="error" id="doctor_department_error"></p>

                    </div>
                    <div class="l_name">
                        <label for="">Date</label>
                        <input type="date" class="department" name="date" id="date">
                        <p class="error" id="date_error"></p>

                    </div>
                </div>
                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">Time</label>
                        <select class="department" id="time" name="time">
                            <option hidden></option>
                            <option value="10:00-10:20">10:00-10:20</option>
                            <option value="10:20-10:40">10:20-10:40</option>
                            <option value="10:40-11:00">10:40-11:00</option>
                            <option value="11:00-11:20">11:00-11:20</option>
                        </select>
                        <p class="error" id="time_error"></p>

                    </div>
                </div>
                <div class="input_box">
                  <input type="submit" name="submit" id="submit" value="Submit & pay" class="Booking_btn">
                </div>
            </form>
    
        </div>
    </div>
    
</body>
<script src="../../Js/booking.js" defer></script>
</html>

<?php
 if (isset($_SESSION['registration_success1']) && $_SESSION['registration_success1']) {
     echo '<script>
     Swal.fire({
      text: "Booking Successful",
      icon: "success"
    });
     </script>';
     $_SESSION['registration_success1'] = false; // Reset the session variable
 }
 ?>
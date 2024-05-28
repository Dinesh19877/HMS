<?php
 if(isset($_POST['submit'])){
 $con= mysqli_connect("localhost","root","","HMS");

$name = $_POST['name'];
$date = $_POST['date'];
$address= $_POST['address'];
$pnumber = $_POST['pnumber'];
$department = $_POST['department'];
$NMC = $_POST['NMC'];
$Qualifications = $_POST['Qualifications'];
$time = $_POST['time'];
$gender = $_POST['gender'];

$folder = 'upload/';
$image_file=$_FILES['file']['name'];
 $file = $_FILES['file']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
 function generateRandomPassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $password;
}

$password = generateRandomPassword(8);

$selectedValue = $_POST['department'];
$category = '';

// Set the name based on the selected value
if ($selectedValue == '1') {
    $category = 'Gynecologist';
} elseif ($selectedValue == '2') {
    $category = 'Pediatrician';
}
elseif ($selectedValue == '3') {
    $category = 'Endocrinologist';
}
elseif ($selectedValue == '4') {
    $category = 'Oncologists';
}
elseif ($selectedValue == '5') {
    $category = 'Neurologists';
}elseif ($selectedValue == '6') {
    $category = 'Psychiatrists';
}elseif ($selectedValue == '7') {
    $category = 'Dermatologist';
}
elseif ($selectedValue == '8') {
    $category = 'Podiatrist';
}


if(!isset($error))
{
move_uploaded_file($file,$target_file); 
$query = "insert into Add_doctor(name,date,address,pnumber,department,NMC,Qualifications,time,gender,file,password,category) Values('$name','$date','$address','$pnumber','$department','$NMC','$Qualifications','$time','$gender','$target_file','$password','$category')";
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

                <p class="booking_form_heading">Add New Doctor</p>
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
                    <div class="image">

                        <div class="container1">
                            <input type="file" id="file" name="file" accept='image/*' hidden />
                            <div class="img-area" data-img="">
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div>
                            <p class="select-image">Select Image</p>
                            <p class="error" id="img_error"></p>
                        </div>
                    </div>

                </div><br><br><br>

                <p class="sub_heading">Qualifications</p>


                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">Department</label>
                        
                        <select class="department" id="department"  name="department">
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
                        <p class="error" id="department_error"> </p>

                    </div>
                    <div class="m_name">
                        <label for="">NMC.No</label>
                        <input type="text" class="department" id="NMC" name="NMC">
                        <p class="error" id="nmc_error"> </p>

                    </div>
                    <div class="l_name">
                        <label for="">Qualifications</label>
                        <input type="text" class="department" id="Qualifications" name="Qualifications">
                        <p class="error" id="Qualifications_error"> </p>

                    </div>
                </div>
                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">Available Time</label>
                        <input type="text" class="department" id="time" name="time">
                        <p class="error" id="time_error"></p>

                    </div>
                </div>
                <div class="input_box">
                    <input type="submit" name="submit" value="Add" class="Booking_btn">
                </div>

            </form>
        </div>


    </div>

</body>
<!-- <script src="../../Js/Add_doc.js"></script> -->

</html>
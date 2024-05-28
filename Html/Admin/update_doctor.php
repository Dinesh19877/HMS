


<?php
$con = mysqli_connect("localhost", "root", "", "HMS");
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $address= $_POST['address'];
    $pnumber = $_POST['pnumber'];
    $department = $_POST['department'];
    $NMC = $_POST['NMC'];
    $Qualifications = $_POST['Qualifications'];
    $time = $_POST['time'];
    $gender = $_POST['gender'];
    $folder = "upload/";

   

    $image_file = $_FILES['file']['name'];
    $file = $_FILES['file']['tmp_name'];
    $path = $folder . $image_file;
    $target_file = $folder . basename($image_file);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($file != '') {
     

        $res = mysqli_query($con, "SELECT * FROM Add_doctor WHERE id=$id LIMIT 1");
        if ($row = mysqli_fetch_array($res)) {
            $deleteimage = $row['file'];
        }

        unlink( $deleteimage);
        move_uploaded_file($file, $target_file);

        $query = "UPDATE Add_doctor SET file='$target_file', name='$name', date='$date', address='$address', pnumber='$pnumber',department='$department', NMC='$NMC',Qualifications='$Qualifications',time='$time' WHERE id='$id'";
    } else {
        $query = "UPDATE Add_doctor SET name='$name', date='$date', address='$address', pnumber='$pnumber',department='$department', NMC='$NMC',Qualifications='$Qualifications',time='$time'  WHERE id='$id'";
    }

    if (!isset($error)) {
        $sql = mysqli_query($con, $query);
        if ($sql) {
            echo "update";
        } else {
            echo 'Something went wrong';
        }
    }
}

$res = mysqli_query($con, "SELECT * FROM Add_doctor WHERE id=$id LIMIT 1");
$row = mysqli_fetch_array($res);
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

                <p class="booking_form_heading">Update Doctor</p>
                <div class="image_form">
                    <div id="form1">






                        <p class="sub_heading">Personal details</p>
                        <div class="input_box">
                            <div class="f_name1 ">
                                <label for="">Name</label>
                                <input class="doc_full_name" value="<?php echo $row['name']; ?>" type="text" id="name" name="name">
                                <p class="error" id="full_name_error"></p>
                            </div>
                            <div class="l_name">
                                <label for="">Mobile No.</label>
                                <input type="text" id="Pnumber" value="<?php echo $row['pnumber']; ?>" name="pnumber">
                                <p class="error" id="pnumber_error"></p>
                            </div>

                        </div>

                        <div class="input_box IInd_line">
                            <div class="l_name">
                                <label for="">DOB</label>
                                <input type="date" class="department DOB" value="<?php echo $row['date']; ?>" id="date" name="date">
                                <p class="error" id="date_error"> </p>
                            </div>

                            <div class="f_name">
                                <label for="">Address</label>
                                <input type="text" id="address" value="<?php echo $row['address']; ?>" name="address">
                                <p class="error" id="address_error"></p>
                            </div>

                        </div>
                        
                    </div>
                    <div class="image">

                        <div class="container1">
                            <input type="file" id="file" name="file" accept='image/*' hidden />
                            <div class="img-area" data-img="">
                               
                                <img src='<?php echo $row['file']; ?>' width='50px' alt=''>
                            </div>
                            <p class="select-image">Select Image</p>
                        </div>
                    </div>

                </div><br><br><br><br><br><br>

                <p class="sub_heading">Qualifications</p>

                <br><br><br>
                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">Department</label>


                        
                        <input type="text" id="department" value="<?php echo $row['category']; ?>" name="department">
                        <p class="error" id="department_error"> </p>

                    </div>
                    <div class="m_name">
                        <label for="">NMC.No</label>
                        <input type="text" class="department" value="<?php echo $row['NMC']; ?>" id="NMC" name="NMC">
                        <p class="error" id="nmc_error"> </p>

                    </div>
                    <div class="l_name">
                        <label for="">Qualifications</label>
                        <input type="text" class="department" id="Qualifications" value="<?php echo $row['Qualifications']; ?>" name="Qualifications">
                        <p class="error" id="Qualifications_error"> </p>

                    </div>
                </div>
                <div class="input_box">
                    <div class="f_name Speciality_options">
                        <label for="">Available Time</label>
                        <input type="text" class="department" id="time" value="<?php echo $row['time']; ?>" name="time">
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
<script src="../../Js/Add_doc.js"></script>

</html>
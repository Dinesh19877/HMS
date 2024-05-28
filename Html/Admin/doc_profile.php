<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/dashboard/patient.css">
    <link rel="stylesheet" href="../../CSS/dashboard/Doc_profile.css">
    <style>
        .seemorebtn .btn{
    text-align: center;
    margin-top: -20px;
    padding: 5px;
    text-transform: capitalize;
    font-size: 16px;
    margin: 17px 60px;
    background: transparent;
    width: 119px;
    outline: none;
border: none;
background-color: rgba(0, 128, 0, 0.596);
color: white;
border-radius: 5px;
}
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">mediCare</div>
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
    <div class="doc_container">
        <?php
$conn = mysqli_connect('localhost','root','','hms');
$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM Add_doctor WHERE id=$id LIMIT 1");
$row = mysqli_fetch_array($res);

    ?>
        <div class="doc_detail">
            <h3 class="doc_title">Dr. <?php echo $row["name"];?></h3>
            <div class="detail_image">
                <div class="doc_info">
                    <table>
                        <tr>
                            <td style="font-weight: bold;">Department</td>
                            <td style="font-weight: bold;">:</td>
                            <td><?php echo $row["category"];?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">NMC No </td>
                            <td style="font-weight: bold;">:</td>
                            <td><?php echo $row["NMC"];?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Qualification </td>
                            <td style="font-weight: bold;">:</td>
                            <td><?php echo $row["Qualifications"];?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Available Time    </td>
                            <td style="font-weight: bold;">:</td>
                            <td> <?php echo $row["time"];?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">password    </td>
                            <td style="font-weight: bold;">:</td>
                            <td> <?php echo $row["password"];?></td>
                        </tr>

                        <tr><td>
<a href='./del_doctor.php?id=<?php echo $row["id"];?>' class='seemorebtn'><button class='btn'>Delete</button></a>
<a href='./update_doctor.php?id=<?php echo $row["id"];?>' class='seemorebtn'><button class='btn'>Update</button></a>

                            

                        </td></tr>
                    </table>
                </div>
                <div class="doc_img">
                
                <img src='../Admin/<?php echo $row["file"];?> ' width="100%" height="100%"  >
                </div>
            </div>
        </div>
      
    </div>
</body>

</html>




<?php
session_start();
if(!isset($_SESSION['username1'])){
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
<link rel="stylesheet" href="../../CSS/doctor/doc_dashboard.css">
<style>
            .seemorebtn .btn{
    text-align: center;
    margin-top: -20px;
    padding: 5px;
    text-transform: capitalize;
    font-size: 16px;
    margin: 17px 60px;
    background: transparent;
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
                    <p class="patients_name">  Doctor 
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
                <a href="./Doc_dashboard.php" class="dashboard">View Appointment</a>
            </div>
            
            
         

            <div class=" sideNav_menu sideNav_menu11">
                <i class="fa-solid fa-right-from-bracket icon "></i>
                <a href="../../php/logout.php" class="dashboard">log Out</a>

            </div>
        </div>
        <div class="workSpace">

            <div class="history_box">
                <h3 class="heading">Appointment Schedule</h3>
                <table border="1px" class="table" >
                    <tr>
                        <th>Patient_ID</th>
                        <th>Patient's Name</th>
                        <th>Applied Date</th>
                        <th>Applied Time</th>
                        <th>action</th>
                        <th>Patient's Details</th>
            
            
                    </tr>

                    <?php
$conn = mysqli_connect('localhost', 'root', '', 'hms');


$query = "SELECT * FROM app_booking WHERE doctor_id= $_SESSION[myuser]";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
         ?>
        <tr>
        <td><?php echo$row['id'];?></td>
        <td><?php echo$row['Fname'];?></td>
        <td><?php echo$row['date'];?></td>
        <td><?php echo$row['time'];?></td>
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
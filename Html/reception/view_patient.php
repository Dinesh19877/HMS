<?php

session_start();
$conn = mysqli_connect("localhost" , "root" , "" , "HMS");

if(!isset($_SESSION['username'])){
    header('loaction:../../Html/LOGIN/Patient_login.php');

}

?>
<?php
// Database connectivity
$conn= mysqli_connect('localhost', 'root', '', 'hms');
$sql = mysqli_query($conn, "select * from app_booking");

// Get Update id and action using POST method (more secure)
if (isset($_POST['id']) && isset($_POST['action'])) {
  $id = $_POST['id'];
  $action = $_POST['action'];

  mysqli_query($conn, "update app_booking set action='$action' where id='$id'");
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
    <link rel="stylesheet" href="../../CSS/Receptionist/recep_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../CSS/Admin/Admin.css">
<link rel="stylesheet" href="../../CSS/dashboard/history.css">
<style>
    style>
.Booking_btn{
    padding: 1rem;
    height: 4rem;
    width: 14rem;

outline: none;
border: none;
background-color: rgba(0, 128, 0, 0.596);
color: white;
border-radius: 1rem;
font-size: 1.5rem;
}

.btn{
    padding: 1rem;
    height: 4rem;
    width: 14rem;

outline: none;
border: none;
background-color: rgba(0, 128, 0, 0.596);
color: white;
border-radius: 1rem;
font-size: 1.5rem;
margin-left: 20px;
}
.pagination{
    width: 300px;
    font-size: 30px; 
    position:absolute ;
    right:180px;
margin-top: 30px;
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
                    <p class="patients_name">Receptionist
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
    <a href="./recep_dashboard.php" class="dashboard">Dashboard</a>
</div>
<div class="sideNav_menu">
    <i class="fas fa-user-md icon "></i>
    <a href="./doctorList.php" class="dashboard">View Doctor</a>
</div>
<div class="sideNav_menu">
    <i class="fas fa-user-plus icon "></i>
    <a href="../LOGIN/Patient_login.php" class="dashboard">Add Patient</a>
</div>
<div class="sideNav_menu">
    <i class="fas fa-user icon "></i>
    <a href="./view_patient.php" class="dashboard">View Patient</a>
</div>
<div class="sideNav_menu">
    <i class="fas fa-calendar-alt icon "></i>
    <a href="./view_booking.php" class="dashboard">View Booking</a>
</div>

<div class=" sideNav_menu sideNav_menu11">
    <i class="fa-solid fa-right-from-bracket icon "></i>
    <a href="../../php/logout.php" class="dashboard">log Out</a>

</div>

<div class=" sideNav_menu sideNav_menu11">
    <i class="fa-solid fa-right-from-bracket icon "></i>
    <a href="../../php/logout.php" class="dashboard">log Out</a>

</div>
</div>
        <div class="workSpace">

           
        <div class="history_box">
                <h3 class="heading">Register Patient</h3>
                <div class="search_box" style="position: relative;top: -15px;">
             <form method="get">
             <input type="text" name="search_name" style="padding:10px;background: transparent;border: 1px solid;width: 400px;" placeholder="Search by name">
                <input type="submit" value="Search" class="Booking_btn">
                </form>
                </div>
                <table border="1px" class="table" >
                    <tr>
                    <th style="width: 52px;">Id</th>
                        <th>Name</th>
                        <th  style="width: 400px;">Email</th>
                        <th  style="width:200px;">Phone NO</th>
                        <th>Password</th>
            
            
                    </tr>
                    <?php
$conn = mysqli_connect('localhost', 'root', '', 'hms');



$records_per_page = 6;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// Default query to fetch all records
$query = "SELECT * FROM register";

// Check if search form is submitted
if (isset($_GET['search_name'])) {
    // Get the search query
    $search_name = $_GET['search_name'];
    // Modify the query to filter results by name
    $query = "SELECT * FROM register WHERE name LIKE '%$search_name%'";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$total = mysqli_num_rows($result);
$offset = ($current_page - 1) * $records_per_page; // Calculate the offset
$query = $query . " LIMIT $offset, $records_per_page";
$result = mysqli_query($conn, $query);



while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['pnumber']}</td>";
    echo "<td>{$row['password']}</td>";
    echo "</tr>";
}

echo "</table>";

$total_pages = ceil($total / $records_per_page);

$prev_page = max(1, $current_page - 1);
$next_page = min($total_pages, $current_page + 1);

echo "<div class='pagination'>";
if ($current_page > 1) {
    echo "<a class='btn' href='?page=$prev_page'>Previous</a>";
}
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a class='btn'  href='?page=$i'>$i</a>";
}
if ($current_page < $total_pages) {
    echo "<a class='btn'  href='?page=$next_page'>Next</a>";
}
echo "</div>";

mysqli_close($conn);
?>
          
                
                </table>
            </div>
            
            
           

            
        </div>


    </div>

</body>


</html>
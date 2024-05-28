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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../CSS/Admin/Admin.css">
    <link rel="stylesheet" href="../../CSS/dashboard/history.css">


<style>
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
th{
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
                <h3 class="heading"> Patient</h3>
                <div class="search_box" style="position: relative;top: -15px;">
             <form method="get">
             <input type="text" name="search_name" style="padding:10px;background: transparent;border: 1px solid;width: 400px;" placeholder="Search by name">
                <input type="submit" value="Search" class="Booking_btn">
                </form>
                </div>
                <table border="1px" class="table" >
                    <tr>
                    <th>Patient_ID</th>
                        <th>Patient's Name</th>
                        <th>Speciality</th>
                        <th>Applied Date</th>
                        <th>Applied Time</th>
                        <th>Action</th>
                        <th>Patient's Details</th>
                        <th>Delete</th>
                        <th>Change</th>

            
            
                    </tr>
                    <?php
$conn = mysqli_connect('localhost', 'root', '', 'hms');



$records_per_page = 6;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// Default query to fetch all records
$query = "SELECT * FROM app_booking";

// Check if search form is submitted
if (isset($_GET['search_name'])) {
    // Get the search query
    $search_name = $_GET['search_name'];
    // Modify the query to filter results by name
    $query = "SELECT * FROM app_booking WHERE Fname LIKE '%$search_name%'";
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
    echo "<td>{$row['Fname']}</td>";
    echo "<td>{$row['category']}</td>";
    echo "<td>{$row['date']}</td>";
    echo "<td>{$row['time']}</td>";

    ?> 
      <td>
    
    <?php
    $actionText = "";
    switch ($row["action"]) {
      case 1:
        $actionText = "Pending";
        break;
      case 2:
        $actionText = "Accept";
        break;
        case 3:
            $actionText = "Completed";
            break;
      case 4:
        $actionText = "Reject";
        break;
    }
    echo $actionText;
    ?>
      <td> <a href="view_app.php?id=<?php echo $row['id'];?>">View Details</a></td>";
      <td> <a href="del_app_booking.php?id=<?php echo $row['id'];?>">Delete</a></td>";

  </td>
  

  
  <td>
              <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <select style="padding: 5px;" name="action" onchange="this.form.submit()">
                  <option   value="1" <?php if ($row["action"] == 1) echo "selected"; ?>>Pending</option>
                 
                  <option    value="2" <?php if ($row["action"] == 2) echo "selected"; ?>>Accept</option>
                 
                  <option    value="3" <?php if ($row["action"] == 3) echo "selected"; ?>>Completed</option>
                  <option    value="4" <?php if ($row["action"] ==4) echo "selected"; ?>>Reject</option>
                </select>
              </form>
            </td>';
<?php

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




<?php
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
    .invoice-wrapper{
        padding: 35px;
    }
    ul{
        line-height:20px;
    }
    
.invoice-head-top-left img {
    width: 225px;
    position: relative;
    top: -6px;
    left: -17px;}
</style>
</head>

<body>

        
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
                                    <p><spanf class = "text-bold">Prescription No: </span><?php echo $row[$i++]; ?></p>
                                </div>
                            </div>

                            
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id" id="id"><br>
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
     


<form action="" method="post">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$conn = new mysqli($servername, $username, $password, $dbname);
$id1 = $_GET['id'];
$res1 = mysqli_query($conn, "SELECT * FROM check_up WHERE p_id=$id LIMIT 1");
$row1 = mysqli_fetch_array($res1);
?>
<input type="hidden" value="<?php echo $row1['id']; ?>" name="id" id="id"><br>

    <label for="">Disease</label>
    <textarea name="Disease" id="Disease" cols="50" rows="2" readonly><?php echo isset($row1['Disease']) ? $row1['Disease'] : ''; ?></textarea>

    <label for="">Description</label>
<textarea name="Description" id="Description"  cols="50" readonly rows="2"><?php echo isset($row1['Disease']) ? $row1['Disease'] : ''; ?></textarea>

    <label for="">Medicines</label>
<textarea name="Medicines" id="Medicines" cols="50" readonly  rows="2" > <?php echo isset($row1['Disease']) ? $row1['Disease'] : ''; ?></textarea>

</form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>


      
    
</body>
<script src="../../Js/booking.js" defer></script>
</html>
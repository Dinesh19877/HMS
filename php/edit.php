<?php
$con = mysqli_connect("localhost", "root", "", "hms");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $password = $_POST['password'];


    $query = "UPDATE register SET  name='$name', pnumber='$pnumber', password='$password' WHERE , email='$email'";
    $sql = mysqli_query($con, $query);
    if($sql){
        echo "Data updated";
    }
    else{
        echo "Data not updated";
    }

?>
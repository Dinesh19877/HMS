<?php 
 $con= mysqli_connect("localhost","root","","hms");

$id=$_GET['id']; 
		$res=mysqli_query($con,"SELECT* from Add_doctor WHERE id=$id limit 1");
if($row=mysqli_fetch_array($res)) 
{
$deleteimage=$row['file']; 
}
$folder="upload/";
unlink($folder.$deleteimage);
$result=mysqli_query($con,"DELETE from Add_doctor WHERE id=$id") ; 
if($result)
{
	 header("location:view_doctor.php");
}
?> 
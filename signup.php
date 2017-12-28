<?php
include("dbcon.php");
$name = $_POST['name'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$sql = "INSERT INTO `seller_table`(`fullname`, `password`, `cpassword`, `email`, `pnumber`, `status`) VALUES ('$name','$pass','$cpass','$email','$pnumber','0')";
$result = mysqli_query($con,$sql);
if($result)
echo "Data have been Saved";
else 
echo "kuch kharab hai";
?>
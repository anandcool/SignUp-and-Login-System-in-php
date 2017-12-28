<?php
include("dbcon.php");
if(isset($_POST['login']))
{
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM `seller_table` WHERE fullname = '$uname' && password = '$pass'";
$result = mysqli_query($con,$sql);
$row = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);
$id = $data['id'];
$email = $data['email'];
if($row!=0)
{
if($data['status'] == '0')
{
include("dbcon.php");
$sql = "UPDATE `seller_table` SET `status`='1' WHERE id = '$id'";
mysqli_query($con,$sql);
session_start();
$_SESSION['uid'] = $data['id'];
header('location:seller_dashboard.php');
}
else
{
//echo "Aap ki Id koi aur login kar raha hai";// In this Area i write for sent an email
$to = $email;
$sub = "test mail";
$msg = "Your Id has been login by other.Do You Want Continue it";
$headers = "From anand9412868527@gmail.com";
if(mail($to,$sub,$msg,$headers))
echo "Thanks You for giving your email";
else "bhadd me jaoo"; 
}
}
else
header('location:login.html');
}
?>
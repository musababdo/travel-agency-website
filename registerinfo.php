<?php 
session_start();
$con=mysqli_connect('localhost','root');

if($con){
    echo "Connection Success";
}else{
    echo "No Connection";
}

mysqli_select_db($con,'flight_booking_db');

$name     = $_POST['name'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$email    = $_POST['email'];
$password = $_POST['password'];

$query="insert into login (name,phone,address,email,password) values ('$name','$phone','$address','$email','$password')";

mysqli_query($con,$query);

header('location:index.php?page=login');

?>
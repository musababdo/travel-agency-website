<?php 
session_start();
$con=mysqli_connect('localhost','root');

if($con){
    echo "Connection Success";
}else{
    echo "No Connection";
}

mysqli_select_db($con,'flight_booking_db');

$name            = $_POST['name'];
$phone           = $_POST['phone'];
$desination_city = $_POST['desination_city'];
$departure_time  = $_POST['departure_time'];
$return_time     = $_POST['return_time'];
$type            = $_POST['type'];
$weight          = $_POST['weight'];
$id              = $_GET['id'];

$query="insert into booked_flight (name,phone,desination_city,departure_time,return_time,type,weight,u_id) 
       values ('$name','$phone','$desination_city','$departure_time','$return_time','$type','$weight','$id')";

mysqli_query($con,$query);

header('location:index.php?page=flights');

?>
<?php 

$con=mysqli_connect('localhost','root');

if($con){
    echo "Connection Success";
}else{
    echo "No Connection";
}

mysqli_select_db($con,'flight_booking_db');

$number = $_POST['number'];
$weight = $_POST['weight'];
$things = $_POST['things'];
$place  = $_POST['place'];
$type   = $_POST['type'];
$name   = $_POST['name'];
$phone  = $_POST['phone'];
$id     = $_GET['id'];

$query="insert into charge (number,weight,things,place,type,name,phone,u_id) 
       values ('$number','$weight','$things','$place','$type','$name','$phone','$id')";

mysqli_query($con,$query);

header('location:index.php?page=charge');

?>
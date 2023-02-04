<?php 

$con=mysqli_connect('localhost','root');

if($con){
    echo "Connection Success";
}else{
    echo "No Connection";
}

mysqli_select_db($con,'flight_booking_db');

$type    = $_POST['type'];
$comname = $_POST['comname'];
$address = $_POST['address'];
$name    = $_POST['name'];
$phone   = $_POST['phone'];
$id      = $_GET['id'];

$query="insert into insurance (type,comname,address,name,phone,u_id) 
       values ('$type','$comname','$address','$name','$phone','$id')";

mysqli_query($con,$query);

header('location:index.php?page=insurance');

?>
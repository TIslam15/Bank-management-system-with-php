<?php
session_start();
$con=mysqli_connect('localhost','root');
if($con)
{
    echo"connection";
}
else{
    echo"no connection";
}
mysqli_select_db($con,'youtubeuserdata');

$user=$_POST['user'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$comments=$_POST['comments'];
$query="insert into userinfodata( user, email, phone, address, comments)
values ('$user','$email','$phone','$address','$comments')";
echo"$query";
mysqli_query($con,$query);
header('location:index.php');

?>
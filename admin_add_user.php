<?php

$servername="localhost"; 
$username="root"; 
$password=""; 
$database="safarnydb"; 
$conn=new mysqli($servername, $username, $password, $database);

$name = ($_POST['name']);
$email = ($_POST['email']);
$dob = ($_POST['dob']);
$gender=($_POST['gender']);
$city=($_POST['city']);
$phone=($_POST['phone']);
$passport = password_hash($_POST['passport'], PASSWORD_BCRYPT);
$username=($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$conpassword = password_hash($_POST['conpassword'], PASSWORD_BCRYPT);

if (!password_verify($_POST['password'], $conpassword)) {
  echo "Passwords do not match!";
  exit();
}

$sql= "INSERT INTO user (Name, user_gender, user_mail, user_dob, user_address, user_phone,passport) VALUES ('$name', '$gender', '$email', '$dob', '$city','$phone','$passport')";
$sql2= "INSERT INTO account (username, password) VALUES ('$username', '$password')";



if (mysqli_query($conn, $sql))
{
    echo"Account Created sucessfuly";
} else{
    echo"Error" . $sql . "<br>".
mysqli_error($conn);
}
  
if (mysqli_query($conn, $sql2))
{
    echo"Account Created sucessfuly";
} else{
    echo"Error" . $sql . "<br>".
mysqli_error($conn);
}
  $conn->close();
  ?>
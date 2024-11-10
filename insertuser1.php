<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "safarnydb";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$passport = password_hash($_POST['passport'], PASSWORD_BCRYPT);
$username = $_POST['username'];
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];

if ($password !== $conpassword) {
    echo "Passwords do not match!";
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO user (Name, user_gender, user_mail, user_dob, user_address, user_phone, passport) VALUES ('$name', '$gender', '$email', '$dob', '$city', '$phone', '$passport')";

if (mysqli_query($conn, $sql)) {
    $userId = $conn->insert_id;  // Get the last inserted ID
    $sql2 = "INSERT INTO account (user_id, username, password) VALUES ('$userId', '$username', '$hashedPassword')";

    if (mysqli_query($conn, $sql2)) {
        // Redirect to index.html with a success parameter
        header('Location: index.html?status=success');
        exit();
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>

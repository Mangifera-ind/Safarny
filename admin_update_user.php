<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_user_address = $_POST['new_user_address'];
    $new_user_gender = $_POST['new_user_gender'];
    $new_user_phone = $_POST['new_user_phone'];
    $new_user_mail = $_POST['new_user_mail'];
    $new_user_dob = $_POST['new_user_dob'];
    $new_passport = $_POST['new_passport'];
    $new_subscription = $_POST['new_subscription'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "safarnydb";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update data in the database
    $sql = "UPDATE user SET 
                user_address = '$new_user_address', 
                user_gender = '$new_user_gender', 
                user_phone = '$new_user_phone', 
                user_mail = '$new_user_mail', 
                user_dob = '$new_user_dob', 
                passport = '$new_passport', 
                subscription = '$new_subscription' 
            WHERE user_id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

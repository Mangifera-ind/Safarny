<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_id = $_POST['account_id'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $new_user_id = $_POST['new_user_id'];

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
    $sql = "UPDATE account SET 
                username = '$new_username', 
                password = '$new_password', 
                user_id = '$new_user_id'
            WHERE account_id = '$account_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Account updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

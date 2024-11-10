<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visa_id = $_POST['visa_id'];

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

    // Delete data from the database
    $sql = "DELETE FROM visa WHERE visa_id = '$visa_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Visa deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

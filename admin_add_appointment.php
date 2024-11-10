<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    $office_id = $_POST['office_id'];

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

    // Insert data into the database
    $sql = "INSERT INTO appointment (day, time, status, office_id)
            VALUES ('$day', '$time', '$status', '$office_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New appointment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

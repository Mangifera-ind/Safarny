<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_fee = $_POST['service_fee'];
    $cancellation_policy = $_POST['cancellation_policy'];
    $appointment_id = $_POST['appointment_id'];

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
    $sql = "INSERT INTO appointment_service (service_fee, cancellation_policy, appointment_id)
            VALUES ('$service_fee', '$cancellation_policy', '$appointment_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New appointment service added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

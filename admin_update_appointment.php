<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = $_POST['appointment_id'];
    $new_day = $_POST['new_day'];
    $new_time = $_POST['new_time'];
    $new_status = $_POST['new_status'];
    $new_office_id = $_POST['new_office_id'];

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
    $sql = "UPDATE appointment SET 
                day = '$new_day', 
                time = '$new_time', 
                status = '$new_status', 
                office_id = '$new_office_id' 
            WHERE appointment_id = '$appointment_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

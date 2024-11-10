<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentservice_id = $_POST['appointmentservice_id'];
    $new_service_fee = $_POST['new_service_fee'];
    $new_cancellation_policy = $_POST['new_cancellation_policy'];
    $new_appointment_id = $_POST['new_appointment_id'];

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
    $sql = "UPDATE appointment_service SET 
                service_fee = '$new_service_fee', 
                cancellation_policy = '$new_cancellation_policy', 
                appointment_id = '$new_appointment_id' 
            WHERE appointmentservice_id = '$appointmentservice_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment service updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

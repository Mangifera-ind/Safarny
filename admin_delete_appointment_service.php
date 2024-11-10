<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentservice_id = $_POST['appointmentservice_id'];

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
$sql = "DELETE FROM appointment_service WHERE appointmentservice_id = '$appointmentservice_id'";

if ($conn->query($sql) === TRUE) {
    echo "Appointment service deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
} else {
echo "Invalid request method.";
}
?>


   

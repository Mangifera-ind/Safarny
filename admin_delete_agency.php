<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agency_id = $_POST['agency_id'];

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
    $sql = "DELETE FROM travel_agency WHERE agency_id = '$agency_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Agency deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

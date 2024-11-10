<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visatype_id = $_POST['visatype_id'];

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
    $sql = "DELETE FROM visa_types WHERE visatype_id = '$visatype_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Visa type deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visatype_id = $_POST['visatype_id'];
    $new_visatype_name = $_POST['new_visatype_name'];

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
    $sql = "UPDATE visa_types SET visatype_name = '$new_visatype_name' WHERE visatype_id = '$visatype_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Visa type updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

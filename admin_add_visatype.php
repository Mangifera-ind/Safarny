<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visatype_id = $_POST['visatype_id'];
    $visatype_name = $_POST['visatype_name'];

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
    $sql = "INSERT INTO visa_types (visatype_id, visatype_name) VALUES ('$visatype_id', '$visatype_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New visa type added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

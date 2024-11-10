<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $office_name = $_POST['office_name'];
    $office_location = $_POST['office_location'];
    $opening_time = $_POST['opening_time'];
    $closing_time = $_POST['closing_time'];
    $country_id = $_POST['country_id'];

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
    $sql = "INSERT INTO issuing_office (office_name, office_location, opening_time, closeing_time, country_id)
            VALUES ('$office_name', '$office_location', '$opening_time', '$closing_time', '$country_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New issuing office added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

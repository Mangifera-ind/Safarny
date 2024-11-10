<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $office_id = $_POST['office_id'];
    $new_office_name = $_POST['new_office_name'];
    $new_office_location = $_POST['new_office_location'];
    $new_opening_time = $_POST['new_opening_time'];
    $new_closing_time = $_POST['new_closing_time'];
    $new_country_id = $_POST['new_country_id'];

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
    $sql = "UPDATE issuing_office SET 
                office_name = '$new_office_name', 
                office_location = '$new_office_location', 
                opening_time = '$new_opening_time', 
                closeing_time = '$new_closing_time', 
                country_id = '$new_country_id' 
            WHERE office_id = '$office_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Issuing office updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visa_id = $_POST['visa_id'];
    $new_issuing_country = $_POST['new_issuing_country'];
    $new_visa_fee = $_POST['new_visa_fee'];
    $new_expiration_date = $_POST['new_expiration_date'];
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
    $sql = "UPDATE visa SET 
                issuing_country = '$new_issuing_country', 
                visa_fee = '$new_visa_fee', 
                expiration_date = '$new_expiration_date', 
                country_id = '$new_country_id'
            WHERE visa_id = '$visa_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Visa updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

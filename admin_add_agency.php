<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agency_name = $_POST['agency_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $referral_links = $_POST['referal_links'];
    $agency_description = $_POST['agency_description'];
    $feedback = $_POST['feedback'];

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
    $sql = "INSERT INTO travel_agency (agency_name, address, phone_number, email, referal_links, agency_description, feedback)
            VALUES ('$agency_name', '$address', '$phone_number', '$email', '$referral_links', '$agency_description', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "New agency added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agency_id = $_POST['agency_id'];
    $new_agency_name = $_POST['new_agency_name'];
    $new_address = $_POST['new_address'];
    $new_phone_number = $_POST['new_phone_number'];
    $new_email = $_POST['new_email'];
    $new_referral_links = $_POST['new_referral_links'];
    $new_agency_description = $_POST['new_agency_description'];
    $new_feedback = $_POST['new_feedback'];

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
    $sql = "UPDATE travel_agency SET 
                agency_name = '$new_agency_name', 
                address = '$new_address', 
                phone_number = '$new_phone_number', 
                email = '$new_email', 
                referal_links = '$new_referral_links', 
                agency_description = '$new_agency_description', 
                feedback = '$new_feedback' 
            WHERE agency_id = '$agency_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Agency updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

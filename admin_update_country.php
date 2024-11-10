<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country_id = $_POST['country_id'];
    $new_country_name = $_POST['new_country_name'];
    $new_region = $_POST['new_region'];
    $new_language = $_POST['new_language'];
    $new_currency = $_POST['new_currency'];

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
    $sql = "UPDATE country SET 
                country_name = '$new_country_name', 
                region = '$new_region', 
                language = '$new_language', 
                currency = '$new_currency'
            WHERE country_id = '$country_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Country updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

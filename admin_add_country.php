<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country_name = $_POST['country_name'];
    $region = $_POST['region'];
    $language = $_POST['language'];
    $currency = $_POST['currency'];

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
    $sql = "INSERT INTO country (country_name, region, language, currency)
            VALUES ('$country_name', '$region', '$language', '$currency')";

    if ($conn->query($sql) === TRUE) {
        echo "New country added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

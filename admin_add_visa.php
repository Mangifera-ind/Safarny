<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $issuing_country = $_POST['issuing_country'];
    $visa_fee = $_POST['visa_fee'];
    $expiration_date = $_POST['expiration_date'];
    $country_id = $_POST['country_id'];
    $visa_id = $_POST['visa_id'];

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
    $sql = "INSERT INTO visa (issuing_country, visa_fee, expiration_date, country_id, visa_id)
            VALUES ('$issuing_country', '$visa_fee', '$expiration_date', '$country_id', '$visa_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New visa added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

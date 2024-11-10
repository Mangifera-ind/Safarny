<?php

// Execute the Python script and capture the output
$command = escapeshellcmd('python C:\xampp\\htdocs\\Scraping\\china.py');
$output = shell_exec($command . ' 2>&1');

// Check if output is not empty
if (!empty($output)) {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "safarnydb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the Country_id for Sweden
    $country_name = 'China';
    $stmt = $conn->prepare("SELECT country_id FROM country WHERE country_name = ?");
    $stmt->bind_param("s", $country_name);
    $stmt->execute();
    $stmt->bind_result($country_id);
    $stmt->fetch();
    $stmt->close();

    if (empty($country_id)) {
        die("Country 'China' not found in the country table.");
    }

    // Prepare and bind the statement for inserting into visa_requirments
    $sql = "INSERT INTO visa_requirments (requirements, Country_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("si", $output, $country_id);
 
    // Execute the statement
    if ($stmt->execute() === false) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    echo "Data inserted successfully";

    $stmt->close();
    $conn->close();
} else {
    echo "No data was scraped. Output: " . $output;
}

?>

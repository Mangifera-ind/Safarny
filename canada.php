<?php
// Execute the Python script and capture its output
$output = shell_exec("canada.py");

// Check if output is not empty
if (!empty($output)) {
    // Echo the output
    echo nl2br(htmlspecialchars($output));
} else {
    echo "No data was scraped.";
}
?>
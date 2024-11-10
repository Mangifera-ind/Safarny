<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback_id = $_POST['feedback_id'];
    $new_email = $_POST['new_email'];
    $new_name = $_POST['new_name'];
    $new_comment = $_POST['new_comment'];
    $new_date = $_POST['new_date'];

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
    $sql = "UPDATE feedback SET 
                email = '$new_email', 
                name = '$new_name', 
                comment = '$new_comment', 
                date = '$new_date'
            WHERE feedback_id = '$feedback_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['user_id'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_id = $_POST['user_id'];

        // Database connection
        $servername = "localhost";
        $usernameDB = "root";
        $passwordDB = "";
        $database = "safarnydb";

        $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO account (username, password, user_id)
                VALUES ('$username', '$password', '$user_id')";

        if ($conn->query($sql) === TRUE) {
            echo "New account added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Required fields are not set.";
    }
} else {
    echo "Invalid request method.";
}
?>

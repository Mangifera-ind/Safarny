<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "safarnydb"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT username, password FROM account WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($_POST['password'], $row['password'])) {
        echo "<h3>Welcome " . htmlspecialchars($row['username']) . "</h3>";
    } else {
        echo "Login failed. Invalid username or password.";
    }
} else {
    echo "Login failed. Invalid username or password.";
}

$stmt->close();
$conn->close();
?>

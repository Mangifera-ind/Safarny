<?php
session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "safarnydb"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password']; // Plain text password from the form

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT user_id, password FROM account WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Verify the plaintext password against the hashed password in the database
    if (password_verify($pass, $row['password'])) {
        // Successful login, set session variables
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $user;
        
        // Redirect to homepage or any other secured page
        header("Location: index.html");
        exit(); // Ensure script stops executing after redirection
    } else {
        echo "Login failed. Invalid username or password.";
    }
} else {
    echo "Login failed. Invalid username or password.";
}

$stmt->close();
$conn->close();
?>

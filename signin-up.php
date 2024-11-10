<?php
session_start();

// Your database connection setup
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "safarnydb"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle sign-in logic
if (isset($_POST['signin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Retrieve user data from the database
    $stmt = $conn->prepare("SELECT id, username, password, subscription FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id_from_database, $username_from_database, $hashed_password_from_database, $subscription_from_database);
        $stmt->fetch();

        // Verify the password
        if (password_verify($pass, $hashed_password_from_database)) {
            // Set session variables
            $_SESSION['user_id'] = $user_id_from_database;
            $_SESSION['username'] = $username_from_database;

            // Redirect to a secured page
            header("Location: index.html");
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Invalid username or password";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in || Sign up form</title>
    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
    <link rel="stylesheet" href="css/signin-up.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <h1><img src="media/SAFARNY.png" alt="Logo" class="navbar-logo"></h1>
        <ul>
            <li><i class="fa fa-house"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-briefcase"></i><a href="Service.html">Services</a></li>
            <li><i class="fa fa-circle-info"></i><a href="About.html">About</a></li>
            <li><i class="fa-solid fa-address-book"></i><a class="helloBtn">Contact</a></li>
        </ul>
        <a href="signin-up.php"><button class="btn01" id="sign">User</button></a>
        <a href="Admin_form_tryout.html"><button class="btn01" id="sign">Admin</button></a>
    </header>

    <!-- Sign in/Sign up Form -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="insertuser1.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <div class="infield">
                    <input type="text" name="name" placeholder="Name" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="email" name="email" placeholder="Email" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="date" name="dob" placeholder="Date Of Birth" required />
                    <label></label>
                </div>
                <div class="infield">
                    <div class="gender-container">
                        Male <input type="radio" name="gender" value="0" required />
                        Female <input type="radio" name="gender" value="1" required />
                    </div>
                </div>
                <div class="infield">
                    <input type="text" name="city" placeholder="Address" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="text" name="phone" placeholder="Phone" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="text" name="username" placeholder="Username" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" name="password" placeholder="Password" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" name="conpassword" placeholder="Confirm Password" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="text" name="passport" placeholder="Passport" required />
                    <label></label>
                </div>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="loginuser.php" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <div class="infield">
                    <input type="text" placeholder="Username" name="username" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="password" required />
                    <label></label>
                </div>
                <a href="#" class="forgot">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button>Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button>Sign Up</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>
    <br>

    <!-- Footer -->
    <footer>
        <div class="f01">
            <div class="main">
                <div class="title">
                    <h1><img src="media/SAFARNYwi.png" alt="Logo" class="navbar-logo"></h1>
                    <p>Hustle Free Traveling Experience.</p>
                </div>
                <div class="social">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-behance"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
            <div class="links">
                <section>
                    <h3>Project</h3>
                    <ul>
                        <li><a href="#">Vitrine</a></li>
                        <li><a href="#">Status</a></li>
                        <li><a href="#">License</a></li>
                    </ul>
                </section>
                <section>
                    <h3>Help</h3>
                    <ul>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Troubleshooting</a></li>
                    </ul>
                </section>
                <section>
                    <h3>Others</h3>
                    <ul>
                        <li><a href="#">Terms of services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">License</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </footer>

    <!-- JS code -->
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');
            overlayBtn.classList.remove('btnScaled');
            window.requestAnimationFrame(() => {
                overlayBtn.classList.add('btnScaled');
            });
        });
    </script>
</body>
</html>
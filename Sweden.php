<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <div id="blur">

            <header>
                <h1><img src="/media/SAFARNY.png" alt="Logo" class="navbar-logo"></h1>
    
                <ul>
                    <li>
                        <i class="fa fa-house"></i>
                        <a href="index.html">Home</a>
                    </li>
    
                    <li>
                        <i class="fa fa-briefcase"></i>
                        <a href="/Service.html">Services</a>
                    </li>
    
                    <li>
                        <i class="fa fa-circle-info"></i>
                        <a href="/About.html">About</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-address-book"></i>
                        <a class="helloBtn">Contact</a>
                    </li>
                </ul>
    
                <a href="signin-up.php"><button class="btn01" id="sign">User</button></a>
                <a href="Admin_form_tryout.html"><button class="btn01" id="sign">Admin</button></a>
            </header>

            <div class="countryInfo">
                <h1>Sweden</h1>

                <section>
                    <!-- <div class="country01">
                        p
                    </div>
                    <div class="country02">

                    </div> -->

                    <div class="description">
                        <h4>Embark on a scenic boat tour through the striking Nærøyfjord and travel along the steep
                            Flåm
                            Railway. Join this self-guided day tour to marvel at the natural beauty of Norway's
                            fjord
                            landscape.</h4>
                        <div class="experience">
                            <table>
                                <tr>
                                    <th>Highlights</th>
                                    <td>
                                        <ul>
                                            <li>Marvel at the incredible hanging valleys and towering mountains of
                                                Nærøyfjord</li>
                                            <li>Admire panoramic views of Norway's natural scenery as you ride
                                                toward
                                                Voss
                                            </li>
                                            <li>Hop on a modern electric boat to enjoy a relaxing and scenic fjord
                                                cruise
                                            </li>
                                            <li>Ride aboard the famously steep Flåm Railway all the way to the town
                                                of
                                                Myrdal</li>
                                            <li>Seize the opportunity observe the Kjosfossen Waterfall from a close
                                                distance
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Important Information</th>
                                    <td>
                                        What to bring:
                                        <ul>
                                            <li>Comfortable shoes</li>
                                            <li>Weather-appropriate clothing</li>
                                        </ul>
                                        Know before you go:
                                        <ul>
                                            <li>This self-guided tour will take place rain or shine</li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Full Description</th>
                                    <td>
                                    <?php
            $output = exec('python C:\\Xampp\\htdocs\\Scraping\\sweden.py');
        
            $conn = mysqli_connect("localhost", "root", "", "safarnydb");
        
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
            $stmt = "SELECT requirements FROM visa_requirments WHERE country_id = 3";
            $result = mysqli_query($conn, $stmt);
        
            if ($result) {
                $row = mysqli_fetch_array($result);
                if ($row) {
                    echo "Requirements: " . $row['requirements'];
                } else {
                    echo "No requirements found.";
                }
            } else {
                echo "Error executing query: " . mysqli_error($conn);
            }
        
            mysqli_close($conn);
        ?>

                                </tr>
                                <tr>
                                    <th>Appointments</th>
                                    <td>
                                        No Available Appointments
                                    </td>
                                    <td><img src="/media/Swedish%20embassy%20location%20.png" class="image"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="placeImg">
                        <div class="slideshow-container">
                            <div class="mySlides fade">
                                <img src="media/Trip1.jpg" style="width:100%">
                            </div>
                            <div class="mySlides fade">
                                <img src="media/Trip2.jpg" style="width:100%">
                            </div>
                            <div class="mySlides fade">
                                <img src="media/Trip3.jpg" style="width:100%">
                            </div>
                        </div>

                    </div>

                </section>
            </div>
            
            <footer>
                <div class="f01">
                    <div class="main">
                        <div class="title">
                            <h1><img src="/media/SAFARNYwi.png" alt="Logo" class="navbar-logo"></h1>
                            <p>Choose your favorite destination</p>
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
                                <li>
                                    <a href="#">Vitrine</a>
                                </li>
                                <li>
                                    <a href="#">Status</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                            </ul>
                        </section>
                        <section>
                            <h3>Help</h3>
                            <ul>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                                <li>
                                    <a href="#">Troubleshooting</a>
                                </li>
                               
                            </ul>
                        </section>
                        <section>
                            <h3>Others</h3>
                            <ul>
                                <li>
                                    <a href="#">Terms of services</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </footer>
        </div>


        <div class="hello" id="hello-form">
            <span class="close">&times;</span>
            <h3>Say Hello!</h3>
            <p>Send us a message!</p>
            <br>
            <form action="">
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="text" placeholder="Subject">
                <textarea placeholder="Message"></textarea>
                <input type="submit" value="Send" class="bn632-hover bn25">
            </form>
        </div>

        <script src="script/script.js"></script>
    </body>

</html>
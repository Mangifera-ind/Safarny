<?php
            $output = exec("Python C:\\xampp\\htdocs\\Scraping\\thailand.py");
        
            $conn = mysqli_connect("localhost", "root", "", "safarnydb");
        
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
            $stmt = "SELECT requirements FROM visa_requirments WHERE country_id = 4";
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

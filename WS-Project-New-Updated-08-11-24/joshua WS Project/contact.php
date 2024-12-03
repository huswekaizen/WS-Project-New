<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Output the request method for debugging

// Allow cross-origin requests (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// If it's a preflight OPTIONS request, we respond with a 200 OK
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Ensure the data is valid
    if ($name && $email && $phone && $message) {
        // Prepare the SQL query to insert data
        $sql = "INSERT INTO client_tbl (Name, Email, Phone, Message) VALUES ('$name', '$email', '$phone', '$message')";

        // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: All fields are required!";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="contact.css">
</head>
<style>

.form-success{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: auto;
    background-color: white;
    padding: 40px 0 40px 0;
    margin-bottom: 40px;
    color: #33e933;
    line-height: 15px;
    border: 2px solid #ddd;
    border-radius: 10px;
    box-shadow: 0px 0px 30px 1px rgba(194,190,194,1);
}

.form-success h1{
    font-size: 35px;
    margin-top: 20px;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
}

.form-success h3{
    margin-top: 15px;
    margin-bottom: 20px;
    letter-spacing: 1px;
    color: #919191;
    font-style: italic;
    font-weight: bolder;
    font-size: 15px;
}

.backBotton{
    background-color: #dfdfdf;
    color: rgba(0, 0, 0, 0.74);
    font-size: 16px;
    border: none;
    border-radius: 40px;
    padding: 16px 24px;
    cursor: pointer;    
} .backBotton:hover{
    transition: ease 0.4s;
    background-color: #c7c7c7;
}

.backBotton a{
    text-decoration: none;
    color: black;
    font-weight: lighter;
}

</style>
<body>
    <div class="web">
        <header>
            <div class="logo">
                <a href="home.html"><img src="img/wslogo.png" alt=""></a>
            </div>
            <nav class="nav-links">
                <a href="home.html">Home</a>
                <a href="about.html">About</a>
                <a href="projects.html">Projects</a>
                <a href="contact.html">Contact</a>
            </nav>
            <button class="emailButton">Send email <i class="fa-regular fa-envelope"></i></button>
            <div class="hamburger" id="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </header>        
    </div>

    <section class="contact-bg" style="background-color: white;">
        <div class="web">
            <div class="form-success">
                <div class="success-img">
                    <img src="img/check.png" alt="">
                </div>
                <h1>Thank you!</h1>
                <h3>We will get back to you later!</h3>     
                <button class="backBotton" ><a href="contact.html">Go back</a></button>       
            </div>
        </div>
    </section>
    
    <script src="hamburger.js"></script>          
</body>
<footer class="footer-bg">
    <div class="web">
        <div class="footer">
            <div class="upper-footer">
                <div class="upper-footer-right">
                    <h1>Lets create and design your ideas together</h1>
                    <button><i class="fa-solid fa-phone"></i> Book a call</button>
                </div>
                <div class="upper-footer-left">
                    <h3>We help you design and develop websites, graphic design, build custom
                        software solutions, and more.</h3>
                    <div class="social-media">
                        <button><i class="fa-brands fa-facebook"></i> Facebook</button>
                        <button><i class="fa-brands fa-linkedin"></i> LinkedIn</button>
                        <button><i class="fa-regular fa-envelope"></i> Email</button>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <nav>
                    <a href="home.html">Home</a>
                    <a href="about.html">About</a>
                    <a href="projects.html">Projects</a>
                    <a href="contact.html">Contact</a>
                </nav>
                <p>@ 2023 Design&DevCo. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
</html>

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "car_rent"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST["user-type"];

    if ($user_type == "customer") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM c_reg WHERE email='$email' AND password='$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Customer login successful!";
        } else {
            echo "Customer login failed. Please check your email and password.";
        }
    } elseif ($user_type == "agency") {
       
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM agencies WHERE email='$email' AND password='$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
      
            echo "Agency login successful!";
        } else {
            echo "Agency login failed. Please check your email and password.";
        }
    }
}

$conn->close();
?>

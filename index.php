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
    if (isset($_POST["user-type"])) {
    $user_type = $_POST["user-type"];

    if ($user_type == "customer") {
        $customer_name = $_POST["customer_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO c_reg(customer_name, email, password) VALUES ('$customer_name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Customer registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($user_type == "agency") {
        $customer_name = $_POST["customer_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO agencies(customer_name, email, password) VALUES ('$customer_name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Agency registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>

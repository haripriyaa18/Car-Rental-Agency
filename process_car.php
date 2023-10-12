
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_model = $_POST["vehicle_model"];
    $vehicle_number = $_POST["vehicle_number"];
    $seating_capacity = $_POST["seating_capacity"];
    $rent_per_day = $_POST["rent_per_day"];
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $dbname = "car_rent"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO car_details (vehicle_model, vehicle_number, seating_capacity, rent_per_day) VALUES ('$vehicle_model', '$vehicle_number', $seating_capacity, $rent_per_day)";

    if ($conn->query($sql) === TRUE) {
        echo "Car details saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>


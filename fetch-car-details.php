<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "car_rent"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$carId = $_POST['id'];
$sql = "SELECT * FROM car_details WHERE car_id = $carId"; 

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["vehicle_model"] . "</td>";
        echo "<td>" . $row["vehicle_number"] . "</td>";
        echo "<td>" . $row["seating_capacity"] . "</td>";
        echo "<td>" . $row["rent_per_day"] . "</td>";
        echo "<td>";
        echo '<button class="btn btn-primary"><a href="agency-view-booked-cars.html" style="color: white;">Rent Car</a></button>';
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

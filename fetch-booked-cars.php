<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "car_rent"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT vehicle_model, vehicle_number, customer_name, booking_date FROM bookings WHERE email = 'email'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<table class="table table-striped">
        <thead>
            <tr>
                <th>Vehicle Model</th>
                <th>Vehicle Number</th>
                <th>Customer Name</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["vehicle_model"] . '</td>
                <td>' . $row["vehicle_number"] . '</td>
                <td>' . $row["customer_name"] . '</td>
                <td>' . $row["booking_date"] . '</td>
            </tr>';
    }
    echo '</tbody></table>';
} else {
    echo "No booked cars found for your agency.";
}

$conn->close();
?>

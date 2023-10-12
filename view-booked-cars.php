<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "car_rent";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the car ID from the form
    $car_id = $_POST["car_id"];
    $sql = "SELECT customers.customer_name, bookings.booking_date
            FROM bookings
            JOIN customers ON bookings.customer_id = customers.customer_id
            WHERE bookings.car_id = $car_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Booking Date</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['customer_name'] . '</td>
                    <td>' . $row['booking_date'] . '</td>
                  </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo "No bookings found for this car.";
    }
}
$conn->close();
?>

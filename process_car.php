<?php

include('db-connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add_car') {
            $carModel = $_POST['car_model'];
            $carNumber = $_POST['car_number'];
            $seatingCapacity = $_POST['seating_capacity'];
            $rentPerDay = $_POST['rent_per_day'];

            $sql = "INSERT INTO cars (car_model, car_number, seating_capacity, rent_per_day) 
                    VALUES ('$carModel', '$carNumber', '$seatingCapacity', '$rentPerDay')";

            if (mysqli_query($conn, $sql)) {
                echo "Car added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } elseif ($action === 'update_car') {
            $carId = $_POST['car_id'];
            $carModel = $_POST['car_model'];
            $carNumber = $_POST['car_number'];
            $seatingCapacity = $_POST['seating_capacity'];
            $rentPerDay = $_POST['rent_per_day'];

            // Perform SQL update to modify car information
            $sql = "UPDATE cars 
                    SET car_model='$carModel', car_number='$carNumber', seating_capacity='$seatingCapacity', rent_per_day='$rentPerDay' 
                    WHERE id=$carId";

            if (mysqli_query($conn, $sql)) {
                echo "Car updated successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } elseif ($action === 'delete_car') {
            $carId = $_POST['car_id'];

            $sql = "DELETE FROM cars WHERE id=$carId";

            if (mysqli_query($conn, $sql)) {
                echo "Car deleted successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
} else {
    echo "Invalid request.";
}
mysqli_close($conn);
?>

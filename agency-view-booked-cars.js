
document.addEventListener('DOMContentLoaded', function () {
    fetchBookedCarsForAgency();
});

function fetchBookedCarsForAgency() {
    fetch('fetch-booked-cars.php')
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Failed to fetch booked cars.');
            }
        })
        .then(function (data) {
            populateTable(data);
        })
        .catch(function (error) {
            console.error(error);
        });
}

function populateTable(data) {
    var tbody = document.querySelector('table tbody');
    
    data.forEach(function (booking) {
        var row = document.createElement('tr');
        row.innerHTML = `
            <td>${booking.vehicleModel}</td>
            <td>${booking.vehicleNumber}</td>
            <td>${booking.customerName}</td>
            <td>${booking.bookingDate}</td>
        `;
        tbody.appendChild(row);
    });
}

const rentCarButton = document.getElementById('rent-car-button');
rentCarButton.addEventListener('click', async () => {
    const selectedVehicleModel = 1;
    try {
        const response = await fetch(`/fetch-car-details.php?id=${selectedVehicleModel}`, {
            method: 'POST',
            body: JSON.stringify({  }),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            const bookedCar = await response.json();
        } else {
            console.error('Failed to book the car.');
        }
    } catch (error) {
        console.error('An error occurred:', error);
    }
});

function displayBookedCar(bookedCar) {
    const tbody = document.querySelector('table tbody');
    const newRow = document.createElement('tr');
    const modelCell = document.createElement('td');
    modelCell.textContent = bookedCar.model; 
    const numberCell = document.createElement('td');
    numberCell.textContent = bookedCar.number; 
    const nameCell = document.createElement('td');
    nameCell.textContent = bookedCar.customerName; 
    const dateCell = document.createElement('td');
    dateCell.textContent = bookedCar.bookingDate; 
    newRow.appendChild(modelCell);
    newRow.appendChild(numberCell);
    newRow.appendChild(nameCell);
    newRow.appendChild(dateCell);
    tbody.appendChild(newRow);
}


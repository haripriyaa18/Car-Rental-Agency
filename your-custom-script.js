
document.getElementById('user-type').addEventListener('change', function () {
    const userType = this.value;
    const customerForm = document.getElementById('customer-registration-form');
    const agencyForm = document.getElementById('agency-registration-form');

    if (userType === 'agency') {
        customerForm.style.display = 'none';
        agencyForm.style.display = 'block';
    } else {
        customerForm.style.display = 'block';
        agencyForm.style.display = 'none';
    }
});
document.getElementById('user-type').addEventListener('change', function () {
    const userType = this.value;
    const customerLoginForm = document.getElementById('customer-login-form');
    const agencyLoginForm = document.getElementById('agency-login-form');

    if (userType === 'agency') {
        customerLoginForm.style.display = 'none';
        agencyLoginForm.style.display = 'block';
    } else {
        customerLoginForm.style.display = 'block';
        agencyLoginForm.style.display = 'none';
    }
});
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('rent-car')) {
        const userType = document.getElementById('user-type').value;
        if (userType === 'customer') {
            alert('Car rented successfully!'); // Replace with your actual rental logic
        } else {
            window.location.href = 'login.html'; 
        }
    }
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('rent-car')) {
        const carId = e.target.getAttribute('data-car-id');
        rentCar(carId);
    }
});

function rentCar(carId) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'rent-car.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Car rented successfully!');
            } else {
                alert('Failed to rent the car. Please try again.');
            }
        }
    };
    xhr.send('carId=' + carId);
}




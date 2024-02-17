<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .profile {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-info,
        .car-info {
            margin-bottom: 20px;
        }

        .user-info h2,
        .car-info h2 {
            margin-top: 0;
        }

        .user-info p,
        .car-info p {
            margin: 5px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="profile">
        <h1>User Profile</h1>
        <div class="user-info">
            <h2>User Information</h2>
            <p><strong>Name:</strong> <span id="userName"></span></p>
            <!-- You can add more user information here -->
        </div>
        <div class="car-info">
            <h2>Car Information</h2>
            <p><strong>Name:</strong> <span id="carName"></span></p>
            <p><strong>Bill:</strong> <span id="carBill"></span></p>
            <p><strong>End Date Rental:</strong> <span id="carEndDate"></span></p>
            <!-- You can add more car information here -->
        </div>
        <button onclick="editProfile()">Edit Profile</button>
    </div>

    <script>
        // Sample data for demonstration
        const userData = { name: "John Doe" };
        const carData = { name: "Toyota Camry", bill: "$100", end_date_rental: "2024-03-01" };

        // Function to display user and car information
        function displayProfile() {
            document.getElementById("userName").innerText = userData.name;
            document.getElementById("carName").innerText = carData.name;
            document.getElementById("carBill").innerText = carData.bill;
            document.getElementById("carEndDate").innerText = carData.end_date_rental;
        }

        // Function to simulate editing profile
        function editProfile() {
            alert("Edit profile functionality will be implemented here.");
        }

        // Call displayProfile function on page load
        window.onload = function () {
            displayProfile();
        };
    </script>
</body>

</html>
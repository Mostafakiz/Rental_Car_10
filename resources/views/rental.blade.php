<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car Details</title>
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="number"] {
            padding: 8px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Car Details</h2>
        <form action="{{ route('editPop', $car->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            <label for="days_rental">Days Rental:</label>
            <input type="number" id="days_rental" name="days_rental" required>
            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('editCarForm');
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const days_rental = document.getElementById('days_rental').value;
                const carId = <? php echo json_encode($car -> id); ?>;
                fetch(`/editPop/${carId}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>',
                    },
                    body: JSON.stringify({ days_rental: days_rental }),
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // تعديل حسب احتياجاتك
                        alert('Car details updated successfully!');
                        // يمكنك توجيه المستخدم إلى صفحة أخرى بعد التحديث بحسب احتياجاتك
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again later.');
                    });
            });
        });
    </script>

</body>

</html>
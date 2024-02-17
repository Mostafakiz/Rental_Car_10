<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Detail</title>
    <style>
        /* CSS Styles */
        .rent-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .rent-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .rent-item h4 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .rent-item p {
            margin-bottom: 5px;
            color: #666;
        }

        /* JavaScript Styles */
        .car-date {
            font-weight: bold;
            color: #007bff;
        }

        .image-container {
            display: flex;
            /* استخدام Flexbox لتخطيط العرض */
            flex-wrap: wrap;
            /* السماح بالتفاف العناصر في حالة عدم الكفاية من مساحة العرض */
        }

        .image-container img {
            width: 300px;
            /* قيمة عرض الصورة */
            height: 200px;
            /* قيمة ارتفاع الصورة */
            margin: 10px;
            /* المسافة بين الصور */
            object-fit: cover;
            /* حفظ نسبة العرض إلى الارتفاع وتغطية المحتوى */
        }
    </style>
</head>

<body>
    <div class="container pt-5 pb-3">
        <h1 class="display-1 text-primary text-center">Car Details</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="rent-item">
                    <div class="image-container">
                        @foreach ($car->image as $image)
                        <img class="img-fluid mb-4" src="{{ asset('storage/' . $image) }}" alt="">
                        @endforeach
                    </div>

                    <h4 class="text-uppercase mb-2">{{ $car->name }}</h4>
                    <div class="d-flex justify-content-center mb-2">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span class="car-date">{{ $car->date }}</span>
                        </div>
                    </div>
                    <p>{{ $car->description }}</p>
                    <p>Type: {{ $car->type }}</p>
                    <p>Color: {{ $car->color }}</p>
                    <p>Quantity: {{ $car->quantity }}</p>
                    <p>Price: {{ $car->price }}</p>
                    @php
                    $now = now();
                    $endDateRental = $car->end_date_rental ? Carbon\Carbon::parse($car->end_date_rental) : null;
                    @endphp
                    @if ($endDateRental && $endDateRental <= $now) 
                        <p>Status: Available for Rent</p>
                    @elseif ($endDateRental && $endDateRental > $now)
                        <p>Status: Available after {{ $endDateRental->toDateString() }}</p>
                    @elseif (!$endDateRental)
                        <p>Status: Available for Rent</p>
                    @endif
                    <br>
                    <a href="{{ route('rental', $car->id) }}" style="background-color: orange; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Rental it</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Code -->
    <script>
        // JavaScript Code
        // You can add your JavaScript code here if needed
    </script>
</body>

</html>
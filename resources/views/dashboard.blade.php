@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa; /* Light background color for the body */
        }
        .card {
            height: 100%;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 500;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .live-time {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .card.bg-dark {
            background-color: #343a40; /* Dark background color */
            color: #ffffff; /* White text color */
        }
        .card.bg-dark .btn {
            color: #343a40; /* Dark button text color */
            background-color: #ffffff; /* Light button background color */
        }
        .card.bg-dark .btn:hover {
            background-color: #e9ecef; /* Light button hover background color */
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="d-flex flex-column">
        <!-- Page Content -->
        <div class="container-fluid mt-4">
            <div class="row">
                <!-- Existing Cards -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Students</h5>
                            <p class="card-text">Manage and view students.</p>
                            <a href="{{ route('students.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Teachers</h5>
                            <p class="card-text">Manage and view teachers.</p>
                            <a href="{{ route('teachers.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-dark text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Attendance</h5>
                            <p class="card-text">Track and manage attendance.</p>
                            <div class="live-time" id="live-time"></div>
                            <a href="{{ route('attendances.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">Manage and view users.</p>
                            <a href="{{ route('users.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Sales</h5>
                            <p class="card-text">Track and manage sales.</p>
                            <a href="{{ route('sales.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-info text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Reports</h5>
                            <p class="card-text">Generate and view reports.</p>
                            <a href="{{ route('reports.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- New Card for Classes -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-secondary text-white">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Classes</h5>
                            <p class="card-text">Manage and view classes.</p>
                            <a href="{{ route('classes.index') }}" class="btn btn-light mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('live-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000);
        updateTime();  // Initial call to display the time immediately
    </script>
</body>
</html>
@endsection

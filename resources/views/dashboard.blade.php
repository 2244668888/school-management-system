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
                background-color: #f8f9fa;
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
                background-color: #343a40;
                color: #ffffff;
            }

            .card.bg-dark .btn {
                color: #343a40;
                background-color: #ffffff;
            }

            .card.bg-dark .btn:hover {
                background-color: #e9ecef;
            }

            .card.bg-secondary {
                background-color: #6c757d;
            }

            .schedule-list {
                height: 150px;
                overflow: hidden;
                position: relative;
            }

            .schedule-list ul {
                position: absolute;
                animation: scrollList 10s linear infinite;
                margin: 0;
                padding: 0;
            }

            @keyframes scrollList {
                from {
                    top: 100%;
                }

                to {
                    top: -100%;
                }
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
                                <div id="attendance-status" class="mt-2"></div> <!-- Status and remaining time -->
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

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card text-white" style="background-color: #900C3F;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Schedule</h5>
                                <p class="card-text">Manage and view schedules.</p>

                                <!-- Scrolling list -->
                                <div class="schedule-list mt-3">
                                    <ul class="list-unstyled" id="schedule-list">
                                        <!-- Dynamic class schedule items will be added here -->
                                    </ul>
                                </div>

                                <a href="{{ route('schedules.index') }}" class="btn btn-light mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const scheduleList = document.getElementById('schedule-list');

                const schedules = @json($schedules);

                schedules.forEach(schedule => {
                    const li = document.createElement('li');
                    li.textContent = `${schedule.class_name} - ${schedule.start_time} to ${schedule.end_time}`;
                    scheduleList.appendChild(li);
                });

                function checkClassEndTimes() {
                    const now = new Date();
                    const currentTime =
                        `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
                    console.log('Current Time:', currentTime);

                    schedules.forEach(schedule => {
                        const endTimeFormatted = schedule.end_time.trim();
                        console.log('Checking Schedule:', schedule.class_name, 'End Time:', endTimeFormatted);

                        if (currentTime === endTimeFormatted) {
                            alert(`Time's up for class: ${schedule.class_name} at ${currentTime}`);
                        }
                    });
                }

                setInterval(checkClassEndTimes, 60000);
                checkClassEndTimes();
            });

            function updateTime() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('live-time').textContent = `${hours}:${minutes}:${seconds}`;
            }

            setInterval(updateTime, 1000);
            updateTime();

            document.addEventListener('DOMContentLoaded', function() {
                const scheduleList = document.getElementById('schedule-list');

                const schedules = @json($schedules);

                schedules.forEach(schedule => {
                    const li = document.createElement('li');
                    li.textContent = `${schedule.class_name} - ${schedule.start_time} to ${schedule.end_time}`;
                    scheduleList.appendChild(li);
                });

                function checkClassEndTimes() {
                    const now = new Date();
                    const currentTime =
                        `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;

                    console.log('Current Time:', currentTime);

                    schedules.forEach(schedule => {
                        const endTimeFormatted = schedule.end_time.trim();

                        console.log('Checking Schedule:', schedule.class_name, 'End Time:', endTimeFormatted);

                        if (currentTime === endTimeFormatted) {
                            alert(`Time's up for class: ${schedule.class_name}`);

                        }
                    });
                }

                // Check every minute
                setInterval(checkClassEndTimes, 60000);
                checkClassEndTimes(); // Initial check
            });

            function updateTime() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                const currentTime = `${hours}:${minutes}:${seconds}`;
                document.getElementById('live-time').textContent = `${hours}:${minutes}:${seconds}`;

                const attendanceStartTime = '08:00:00';
                const attendanceEndTime = '17:00:00'; // 4 PM

                const [startHour, startMinute, startSecond] = attendanceStartTime.split(':').map(Number);
                const [endHour, endMinute, endSecond] = attendanceEndTime.split(':').map(Number);

                const nowTime = now.getTime();
                const endTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), endHour, endMinute, endSecond)
                    .getTime();

                if (nowTime < endTime) {
                    // Calculate remaining time
                    const timeDiff = endTime - nowTime;
                    const hoursRemaining = Math.floor(timeDiff / (1000 * 60 * 60));
                    const minutesRemaining = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                    const secondsRemaining = Math.floor((timeDiff % (1000 * 60)) / 1000);

                    document.getElementById('attendance-status').textContent =
                        `Attendance is open. / Time remaining: ${hoursRemaining}h ${minutesRemaining}m ${secondsRemaining}s`;
                    document.getElementById('attendance-status').style.color = 'green';
                } else {
                    document.getElementById('attendance-status').textContent = 'Attendance is closed.';
                    document.getElementById('attendance-status').style.color = 'red';
                }
            }

            setInterval(updateTime, 1000);
            updateTime();
        </script>
    @endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <style>
        .navbar-brand h4 {
            margin: 0;
        }
        .navbar-brand h4 span {
            color: #101213;
            font-weight: bold;
        }
        .navbar-brand h4 span:nth-child(2) {
            color: #6c757d;
        }
        .navbar-nav .nav-item .nav-link i {
            margin-right: 8px;
        }
        .navbar-nav .dropdown-menu {
            background-color: #343a40;
        }
        .navbar-nav .dropdown-item {
            color: white;
        }
        .navbar-nav .dropdown-item:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* remove the gap so it doesn't close */
        }
        .nav-item.dropdown:hover .dropdown-toggle::after {
            transform: rotate(90deg);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h4>
                    <span>Muhammad Shoaib</span>
                </h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i> Home</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="studentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i> Students
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                            <li><a class="dropdown-item" href="{{ route('students.create') }}"><i class="bi bi-person-plus"></i> Create Student</a></li>
                            <li><a class="dropdown-item" href="{{ route('students.index') }}"><i class="bi bi-person-lines-fill"></i> View Students</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="courseDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-book"></i> Courses
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="courseDropdown">
                            <li><a class="dropdown-item" href="{{ route('courses.index') }}"><i class="bi bi-book"></i> Courses</a></li>
                            <li><a class="dropdown-item" href="{{ route('courses.create') }}"><i class="bi bi-bookmark-plus"></i> Create Course</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="enrollmentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-calendar-check"></i> Enrollments
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="enrollmentDropdown">
                            <li><a class="dropdown-item" href="{{ route('enrollments.index') }}"><i class="bi bi-calendar-check"></i> Enrollments</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="teacherDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-badge"></i> Teachers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="teacherDropdown">
                            <li><a class="dropdown-item" href="{{ route('teachers.index') }}"><i class="bi bi-person-badge"></i> Teachers</a></li>
                            <li><a class="dropdown-item" href="{{ route('teachers.create') }}"><i class="bi bi-person-plus-fill"></i> Add Teacher</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="attendanceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-check-square"></i> Attendance
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="attendanceDropdown">
                            <li><a class="dropdown-item" href="{{ route('attendances.index') }}"><i class="bi bi-check-square"></i> Attendance</a></li>
                            <li><a class="dropdown-item" href="{{ route('attendances.create') }}"><i class="bi bi-check-square-fill"></i> Add Attendance</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="classDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-collection"></i> Classes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="classDropdown">
                            <li><a class="dropdown-item" href="{{ route('classes.index') }}"><i class="bi bi-collection"></i> View Classes</a></li>
                            <li><a class="dropdown-item" href="{{ route('classes.create') }}"><i class="bi bi-plus-circle"></i> Create Class</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-envelope"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content" id="page-content-wrapper">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    @stack('scripts')

</body>
</html>
<script>
    $(document).ready(function() {
        $('#example').DataTable();  // Replace '#example' with the selector for your table
    });

        </script>


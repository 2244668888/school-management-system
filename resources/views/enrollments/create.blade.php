@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px; /* Set maximum width for better responsiveness */
        margin-top: 2rem; /* Space at the top */
    }

    .bg-light {
        background-color: #c4dffa; /* Light background color */
        padding: 1.5rem; /* Padding inside the container */
        border-radius: 0.375rem; /* Rounded corners for the container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }

    .form-label {
        font-weight: bold; /* Make labels bold */
    }

    .form-control {
        border-radius: 0.375rem; /* Rounded corners for inputs */
        border-color: #ced4da; /* Border color for inputs */
    }

    .form-control:focus {
        border-color: #007bff; /* Border color on focus */
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Shadow on focus */
    }

    .btn-primary {
        background-color: #007bff; /* Bootstrap primary color */
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }

    .alert {
        margin-bottom: 20px; /* Space below the alert */
    }
</style>

<div class="container bg-light">
    <h1 class="mb-4">Add New Enrollment</h1>
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="course_id" class="form-label">Course ID</label>
            <input type="number" class="form-control" id="course_id" name="course_id" required>
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="number" class="form-control" id="student_id" name="student_id" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Add Enrollment</button>
    </form>
</div>
@endsection

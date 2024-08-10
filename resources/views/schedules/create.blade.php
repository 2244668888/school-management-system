@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px; /* Set maximum width for better responsiveness */
        margin-top: 2rem; /* Space at the top */
    }

    .bg-light {
        background-color: #d0e7fd; /* Light background color */
        padding: 1.5rem; /* Padding inside the container */
        border-radius: 0.375rem; /* Rounded corners for the container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }

    .form-label {
        font-weight: bold; /* Make labels bold */
    }

    .form-control {
        border-radius: 0.375rem; /* Rounded corners for inputs */
        border-color: #cbdff3; /* Border color for inputs */
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
    <h1 class="mb-4">Create Schedule</h1>

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name</label>
            <input type="text" class="form-control" id="class_name" name="class_name" required>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Create</button>
    </form>
</div>
@endsection

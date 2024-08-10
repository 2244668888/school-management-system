@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 700px; /* Maximum width of the form */
        margin: 0 auto; /* Center align the form horizontally */
        background-color: #cbdae9; /* Light gray background */
        border: 1px solid #dee2e6; /* Light gray border */
        border-radius: 8px; /* Rounded corners */
        padding: 2rem; /* Padding inside the form */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }
    .form-label {
        font-weight: 500; /* Slightly bolder labels */
        color: #343a40; /* Dark gray color */
    }
    .form-control {
        border-radius: 5px; /* Slightly rounded input fields */
        border-color: #ced4da; /* Border color */
    }
    .form-control:focus {
        border-color: #007bff; /* Blue border on focus */
        box-shadow: none; /* Remove shadow on focus */
    }
    .btn-primary {
        background-color: #007bff; /* Primary color */
        border-color: #007bff; /* Match border color */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
        border-color: #004085; /* Darker border on hover */
    }
</style>

<div class="container mt-4">
    <div class="form-container">
        <h1 class="mb-4">Create Course</h1>
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Course Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-dark w-100">Create Course</button>
        </form>
    </div>
</div>
@endsection

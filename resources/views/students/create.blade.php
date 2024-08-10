@extends('layouts.app')

@section('content')
<style>
    .form-container {
        background-color: #c0defa; /* Light gray background */
        border: 1px solid #dee2e6; /* Light gray border */
        border-radius: 8px; /* Rounded corners */
        padding: 2rem; /* Padding inside the form container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }
    .form-label {
        font-weight: bold; /* Bold label text */
    }
    .btn-custom {
        background-color: #007bff; /* Custom background color */
        color: #fff; /* White text */
        border: none; /* Remove border */
    }
    .btn-custom:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="form-container mt-2">
                <h1 class="mb-4">Add Student</h1>
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

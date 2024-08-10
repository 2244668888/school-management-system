@extends('layouts.app')

@section('content')
<style>
    .card-container {
        max-width: 600px; /* Maximum width of the card */
        margin: 0 auto; /* Center align the card horizontally */
        background-color: #bfddfa; /* Light gray background */
        border: 1px solid #dee2e6; /* Light gray border */
        border-radius: 8px; /* Rounded corners */
        padding: 1.5rem; /* Padding inside the card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }
    .card-title {
        color: #007bff; /* Primary color text */
        margin-bottom: 1rem; /* Space below the title */
    }
    .card-text {
        margin-bottom: 1rem; /* Space below the text */
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
    <div class="card card-container">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $student->name }}</h5>
            <p class="card-text">Date of Birth: {{ $student->dob->format('d M Y') }}</p>
            <p class="card-text">Address: {{ $student->address }}</p>
            <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

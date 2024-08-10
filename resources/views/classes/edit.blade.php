@extends('layouts.app')

@section('content')
<style>
    /* Custom styles for the edit class view */
    .container {
        max-width: 800px; /* Adjust container width for better layout */
    }

    .card {
        background-color: #add2f5; /* Light background color for the card */
        padding: 20px; /* Add padding inside the card */
        border-radius: 8px; /* Rounded corners for the card */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for better visibility */
    }

    .form-label {
        font-weight: bold; /* Make form labels bold */
    }

    .btn-primary {
        background-color: #007bff; /* Bootstrap primary color */
        border: none; /* Remove default border */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }

    .alert {
        margin-bottom: 20px; /* Add space below the alert */
    }
</style>

<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h1 class="mb-4">Edit Class</h1>

        <form action="{{ route('classes.update', $class->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $class->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $class->start_time) }}" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $class->end_time) }}" required>
            </div>
            <button type="submit" class="btn btn-danger">Update</button>
            <a href="{{ route('classes.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection

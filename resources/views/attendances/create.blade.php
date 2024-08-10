@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px; /* Set a maximum width for better responsiveness */
        margin-top: 2rem; /* Top margin for spacing */
    }

    .form-label {
        font-weight: bold; /* Make labels bold */
    }

    .form-select, .form-control {
        border-radius: 0.375rem; /* Rounded corners for inputs */
        border-color: #ced4da; /* Border color for inputs */
    }

    .form-select:focus, .form-control:focus {
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

    .form-group {
        margin-bottom: 1.5rem; /* Space between form groups */
    }

    .bg-light {
        background-color: #bcd3ec; /* Light background color */
        padding: 1.5rem; /* Padding inside the container */
        border-radius: 0.375rem; /* Rounded corners for the container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }
</style>

<div class="container bg-light">
    <h1 class="mb-4">Add Attendance</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select class="form-select" id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select class="form-select" id="class_id" name="class_id" required>
                @foreach($class_models as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger w-100">Save</button>
    </form>
</div>
@endsection

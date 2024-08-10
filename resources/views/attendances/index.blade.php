@extends('layouts.app')

@section('content')
<style>
    .custom-card {
        background-color: #46f789; /* Light green background */
        border: 1px solid #007bff; /* Blue border */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }
    .custom-card .card-body {
        padding: 1.25rem; /* Increased padding */
    }
    .custom-card .card-title {
        color: #007bff; /* Blue text */
    }
</style>

<div class="container">
    <h1 class="mb-4">Attendance List</h1>
    <div class="row">
        @foreach($attendances as $attendance)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Student: {{ $attendance->student->name }}</h5>
                        <p class="card-text">Date: {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</p>
                        <p class="card-text">Status: {{ ucfirst($attendance->status) }}</p>
                        <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('attendances.create') }}" class="btn btn-dark mt-3 w-100">Add Attendance</a>
</div>
@endsection

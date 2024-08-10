@extends('layouts.app')

@section('content')
<style>
    .enrollment-details-table {
        background-color: #f8f9fa; /* Light gray background */
        border: 1px solid #dee2e6; /* Border color */
        border-radius: 8px; /* Rounded corners */
    }
    .enrollment-details-table th, .enrollment-details-table td {
        padding: 0.75rem; /* Padding inside table cells */
        vertical-align: middle; /* Center-align text vertically */
        border: 1px solid #dee6df; /* Border for table cells */
    }
    .enrollment-details-table th {
        background-color: #3ef84d; /* Blue background for header */
        color: white;
        width: 100%; /* White text color for header */
    }
    .enrollment-details-table td {
        background-color: #ffffff; /* White background for table cells */
    }
    .card {
        border-radius: 10px; /* Rounded corners for the card */
    }
    .card-header {
        border-bottom: 1px solid #dee2e6; /* Border below the card header */
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Enrollment Details</h3>
                </div>
                <div class="card-body">
                    <table class="enrollment-details-table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $enrollment->id }}</td>
                        </tr>
                        <tr>
                            <th>Course ID</th>
                            <td>{{ $enrollment->course_id }}</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{ $enrollment->student_id }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('enrollments.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

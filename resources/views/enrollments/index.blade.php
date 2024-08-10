@extends('layouts.app')

@section('content')
<style>
    .table-container {
        background-color: #c2dffc; /* Light gray background */
        border: 1px solid #dee2e6; /* Light gray border */
        border-radius: 8px; /* Rounded corners */
        padding: 1.5rem; /* Padding inside the table container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
        overflow-x: auto; /* Horizontal scrollbar for responsiveness */
    }
    .table {
        width: 100%; /* Ensure table takes full width of container */
        table-layout: fixed;
        background-color: #ffffff; /* White background for table */
        border-collapse: separate; /* Border collapse style */
        border-spacing: 0; /* Make sure table layout is fixed */
    }
    .table thead th {
        background-color: #a3a7ac; /* Bootstrap primary color */
        color: white; /* White text */
    }
    .table td, .table th {
        vertical-align: middle; /* Center-align text vertically */
    }
    .dropdown-menu {
        min-width: 150px; /* Ensure dropdown has enough width */
    }
    .dropdown-item i {
        margin-right: 8px; /* Space between icon and text */
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('enrollments.create') }}" class="btn btn-dark">Add New Enrollment</a>
    </div>
    <div class="table-container">
        <h1 class="mb-4">Enrollments</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Course ID</th>
                        <th>Student ID</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->id }}</td>
                            <td>{{ $enrollment->course_id }}</td>
                            <td>{{ $enrollment->student_id }}</td>
                            <td class="text-center">
                                <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

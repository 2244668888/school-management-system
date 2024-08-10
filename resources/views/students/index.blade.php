@extends('layouts.app')

@section('title', 'Students')

@section('content')
<style>
    .table-container {
        background-color: #beddfc; /* Light gray background */
        border: 1px solid #dee2e6; /* Light gray border */
        border-radius: 8px; /* Rounded corners */
        padding: 1.5rem; /* Padding inside the table container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
        overflow-x: auto; /* Horizontal scrollbar for responsiveness */
    }
    .table {
        width: 100%; /* Ensure table takes full width of container */
        table-layout: fixed; /* Make sure table layout is fixed */
    }
    .table thead th {
        background-color: #007bff; /* Bootstrap primary color */
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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add New Student</a>
    <div class="table-container">
        <h1>Students List</h1>
        <table class="table table-striped table-bordered" id="students-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->dob->format('d M Y') }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('students.show', $student->id) }}">
                                            <i class="bi bi-eye" style="background-color: #17a2b8; color: white; padding: 0.5rem; border-radius: 0.25rem;"></i> View
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('students.edit', $student->id) }}">
                                            <i class="bi bi-pencil" style="background-color: #007bff; color: white; padding: 0.5rem; border-radius: 0.25rem;"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-trash" style="background-color: #dc3545; color: white; padding: 0.5rem; border-radius: 0.25rem;"></i> Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No students found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

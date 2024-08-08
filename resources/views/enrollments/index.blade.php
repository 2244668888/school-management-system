<!-- resources/views/enrollments/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Enrollments</h1>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Add New Enrollment</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course ID</th>
                    <th>Student ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>{{ $enrollment->course_id }}</td>
                        <td>{{ $enrollment->student_id }}</td>
                        <td>
                            <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

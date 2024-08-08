<!-- resources/views/enrollments/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Enrollment Details</h1>
        <table class="table">
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
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

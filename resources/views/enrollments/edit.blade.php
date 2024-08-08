<!-- resources/views/enrollments/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Enrollment</h1>
        <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="course_id" class="form-label">Course ID</label>
                <input type="number" class="form-control" id="course_id" name="course_id" value="{{ $enrollment->course_id }}" required>
            </div>
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="number" class="form-control" id="student_id" name="student_id" value="{{ $enrollment->student_id }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Enrollment</button>
        </form>
    </div>
@endsection

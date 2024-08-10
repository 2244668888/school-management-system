<!-- resources/views/enrollments/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Edit Enrollment</h3>
                    </div>
                    <div class="card-body">
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

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('enrollments.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-danger">Update Enrollment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

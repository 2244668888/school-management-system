@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Course Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $course->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $course->description }}</p>
                <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($course->start_date)->format('d M Y') }}</p>
                <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($course->end_date)->format('d M Y') }}</p>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection

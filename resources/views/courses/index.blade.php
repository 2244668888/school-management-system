@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<style>
    .card-img-top {
        height: 300px;
        width: 100%;
        object-fit: cover;
    }
    .btn-icon {
        display: flex;
        align-items: center;
    }
    .btn-icon i {
        margin-right: 0.5rem;
    }
</style>

<div class="container mt-4">
    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>
    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->name }}">
                    @else
                        <img src="{{ asset('storage/course_images/default.png') }}" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-info btn-icon w-50 me-2">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="w-50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon w-100">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No courses found</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

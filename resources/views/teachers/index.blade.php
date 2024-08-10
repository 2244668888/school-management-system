<!-- resources/views/teachers/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Teachers List</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add New Teacher</a>
    <div class="row">
        @forelse($teachers as $teacher)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="{{ $teacher->profile_picture ? asset('storage/profile_pictures/' . $teacher->profile_picture) : asset('storage/profile_pictures/default.png') }}" class="card-img-top" alt="{{ $teacher->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $teacher->name }}</h5>
                        <p class="card-text">Email: {{ $teacher->email }}</p>
                        <p class="card-text">Phone: {{ $teacher->phone }}</p>
                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No teachers found</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

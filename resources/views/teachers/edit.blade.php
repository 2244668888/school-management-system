<!-- resources/views/teachers/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm border-0" style="background-color: #c6ddf1;">
        <h1 class="mb-4">Edit Teacher</h1>

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $teacher->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->email }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $teacher->phone }}">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                @if($teacher->profile_picture)
                    <div class="mb-2">
                        <img src="{{ asset('storage/profile_pictures/' . $teacher->profile_picture) }}" alt="Current Image" style="max-width: 200px; height: auto;">
                    </div>
                @else
                    <p>No profile picture uploaded</p>
                @endif
                <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                <small class="form-text text-muted">Leave empty if you do not want to update the profile picture.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('teachers.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection

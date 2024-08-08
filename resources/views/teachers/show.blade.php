@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teacher Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $teacher->name }}</h5>
            <p class="card-text">Email: {{ $teacher->email }}</p>
            <p class="card-text">Phone: {{ $teacher->phone }}</p>
            <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

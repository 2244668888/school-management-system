@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attendance Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student: {{ $attendance->student->name }}</h5>
            <p class="card-text">Date: {{ $attendance->date->format('d/m/Y') }}</p>
            <p class="card-text">Status: {{ ucfirst($attendance->status) }}</p>
            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection

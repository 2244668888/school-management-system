@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attendance List</h1>
    <div class="row">
        @foreach($attendances as $attendance)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student: {{ $attendance->student->name }}</h5>
                    <p class="card-text">Date: {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</p>
                    <p class="card-text">Status: {{ ucfirst($attendance->status) }}</p>
                    <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('attendances.create') }}" class="btn btn-success">Add Attendance</a>
</div>
@endsection

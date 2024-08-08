@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schedules</h1>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Create Schedule</a>

    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Class</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->student->name }}</td>
                    <td>{{ $schedule->class->name }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

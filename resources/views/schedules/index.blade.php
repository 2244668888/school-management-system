@extends('layouts.app')

@section('title', 'Schedules')

@section('content')
<style>
    .container {
        max-width: 1200px; /* Adjust container width */
    }

    .table-container {
        background-color: #c8d8f0; /* Light gray background for table container */
        border: 1px solid #dee2e6; /* Light border */
        border-radius: 8px; /* Rounded corners */
        padding: 1.5rem; /* Padding inside container */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        overflow-x: auto; /* Horizontal scrollbar for responsiveness */
    }

    .table {
        background-color: #ffffff; /* White background for table */
        border-collapse: separate; /* Border collapse style */
        border-spacing: 0; /* Space between cells */
    }

    .table th, .table td {
        text-align: center; /* Center align text in table */
        padding: 0.75rem; /* Cell padding */
        vertical-align: middle; /* Vertical align text */
    }

    .table thead th {
        background-color: #007bff; /* Bootstrap primary color */
        color: white; /* White text */
    }

    .btn-primary {
        background-color: #007bff; /* Bootstrap primary color */
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }

    .btn-warning {
        background-color: #ffc107; /* Bootstrap warning color */
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800; /* Darker shade on hover */
    }

    .btn-danger {
        background-color: #dc3545; /* Bootstrap danger color */
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333; /* Darker shade on hover */
    }

    .alert {
        margin-bottom: 20px; /* Space below alert */
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5em 1em; /* Adjust pagination button padding */
    }
</style>

<div class="container mt-4">
    <a href="{{ route('schedules.create') }}" class="btn btn-dark mb-4">Add Schedule</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <h1 class="mb-4">Schedules</h1>

        <table id="schedules-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->class_name }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scheduleList = document.getElementById('schedule-list');

        function getTodaysSchedules(schedules) {
            const now = new Date();
            const today = now.toISOString().split('T')[0]; // Format: YYYY-MM-DD

            return schedules.filter(schedule => {
                const scheduleDate = new Date(schedule.start_time).toISOString().split('T')[0];
                return scheduleDate === today;
            });
        }

        const schedules = @json($schedules);
        const todaysSchedules = getTodaysSchedules(schedules);

        todaysSchedules.forEach(schedule => {
            const li = document.createElement('li');
            li.textContent = `${schedule.class_name} - ${schedule.start_time} to ${schedule.end_time}`;
            scheduleList.appendChild(li);
        });

        function checkClassEndTimes() {
            const now = new Date();
            const currentTime =
                `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
            console.log('Current Time:', currentTime);

            todaysSchedules.forEach(schedule => {
                const endTimeFormatted = schedule.end_time.trim();
                console.log('Checking Schedule:', schedule.class_name, 'End Time:', endTimeFormatted);

                if (currentTime === endTimeFormatted) {
                    alert(`Time's up for class: ${schedule.class_name} at ${currentTime}`);
                }
            });
        }

        setInterval(checkClassEndTimes, 60000);
        checkClassEndTimes();

        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('live-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000);
        updateTime();
    });
</script>
@endpush
@endsection

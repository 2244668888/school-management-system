@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Attendance</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select class="form-select" id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select class="form-select" id="class_id" name="class_id" required>
                @foreach($class_models as $class) <!-- Make sure the variable name matches -->
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

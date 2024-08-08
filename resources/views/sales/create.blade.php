@extends('layouts.app')

@section('content')
    <h1>Create Sale</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select class="form-control" id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Sale</button>
    </form>
@endsection

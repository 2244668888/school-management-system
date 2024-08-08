<!-- resources/views/classes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Class</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection

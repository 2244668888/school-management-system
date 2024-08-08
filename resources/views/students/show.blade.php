@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $student->name }}</h5>
            <p class="card-text">Date of Birth: {{ $student->dob }}</p>
            <p class="card-text">Address: {{ $student->address }}</p>
            <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection

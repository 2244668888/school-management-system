<!-- resources/views/classes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Classes</h1>
    <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Create Class</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class_models as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->start_time }}</td>
                    <td>{{ $class->end_time }}</td>
                    <td>
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

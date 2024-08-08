@extends('layouts.app')

@section('content')
    <h1>Sales</h1>
    <a href="{{ route('sales.create') }}" class="btn btn-primary">Add New Sale</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->student->name }}</td>
                    <td>${{ $sale->amount }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

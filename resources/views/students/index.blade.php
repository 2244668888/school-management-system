@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="container mt-4">
    <h1>Students List</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add New Student</a>
    <table class="table table-striped" id="students-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->dob->format('d M Y') }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('students.show', $student->id) }}">
                                    <i class="bi bi-eye" style="background-color: #17a2b8; color: white; padding: 0.5rem; border-radius: 0.25rem;"></i> View
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('students.edit', $student->id) }}">
                                    <i class="bi bi-pencil" style="background-color: #007bff; color: white; padding: 0.5rem; border-radius: 0.25rem;"></i> Edit
                                </a></li>
                                <li>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-trash" style="background-color: #dc3545; color: white; padding: 0.5rem; border-radius: 0.25rem;"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No students found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#students-table').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "responsive": true
            });
        });
    </script>
@endpush

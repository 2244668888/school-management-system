@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <div class="container mt-4">
        <h1>Reports</h1>
        <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Add New Report</a>
        <table class="table table-striped" id="reports-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->date }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('reports.show', $report->id) }}">
                                        <i class="bi bi-eye" style="background-color: #b310db; color: rgb(15, 15, 17); padding: 0.5rem; border-radius: 0.25rem;"></i> View
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('reports.edit', $report->id) }}">
                                        <i class="bi bi-pencil" style="background-color: #53eb0d; color: rgb(11, 34, 241); padding: 0.5rem; border-radius: 0.25rem;"></i> Edit
                                    </a></li>
                                    <li>
                                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-trash" style="background-color: #dc3545; color: rgb(11, 34, 241); padding: 0.5rem; border-radius: 0.25rem;"></i> Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No reports found</td>
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
            $('#reports-table').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "responsive": true
            });
        });
    </script>
@endpush

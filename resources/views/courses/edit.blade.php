<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Course - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Course</h1>
        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $course->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $course->start_date }}" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $course->end_date }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Course Image</label>
                @if($course->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Current Image" style="max-width: 200px; height: auto;">
                    </div>
                @else
                    <p>No image uploaded</p>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Leave this empty if you do not want to update the image.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

// app/Http/Controllers/EnrollmentController.php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        return view('enrollments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
        ]);

        Enrollment::create($request->only('course_id', 'student_id'));

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $enrollment->update($request->only('course_id', 'student_id'));

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        return view('enrollments.edit', compact('enrollment'));
    }



    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}

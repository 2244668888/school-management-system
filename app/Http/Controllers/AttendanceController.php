<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\ClassModel; // Use ClassModel

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('student')->get();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $students = Student::all();
        $class_models = ClassModel::all(); // Fetch class_models
        return view('attendances.create', compact('students', 'class_models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:class_models,id', // Change to class_models
            'date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        // Create new attendance record
        Attendance::create([
            'student_id' => $request->input('student_id'),
            'class_id' => $request->input('class_id'),
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('attendances.index');
    }

    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $students = Student::all();
        $class_models = ClassModel::all(); // Fetch class_models
        return view('attendances.edit', compact('attendance', 'students', 'class_models'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:class_models,id', // Change to class_models
            'date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendances.index');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index');
    }
}

<?php

// app/Http/Controllers/ScheduleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\ClassModel;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['student', 'class'])->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $students = Student::all();
        $classes = ClassModel::all();
        return view('schedules.create', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }
}

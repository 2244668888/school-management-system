<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $students = Student::all(); // Assuming you have a Student model
        return view('sales.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
        ]);

        Sale::create($validated);
        return redirect()->route('sales.index');
    }

  // In CourseController.php
public function show($id)
{
    $course = Course::findOrFail($id); // Fetch course by ID
    return view('courses.show', compact('course')); // Ensure the view path matches
}


    public function edit(Sale $sale)
    {
        $students = Student::all();
        return view('sales.edit', compact('sale', 'students'));
    }

    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
        ]);

        $sale->update($validated);
        return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index');
    }
}

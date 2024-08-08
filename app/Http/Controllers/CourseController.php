<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{


    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate image
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validated['image'] = $imagePath;
        }

        Course::create($validated);
        return redirect()->route('courses.index');
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course->name = $request->name;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image) {
                Storage::delete('public/' . $course->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('course_images', 'public');
            $course->image = $imagePath;
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
{
    $course = Course::findOrFail($id);

    // Convert date fields to Carbon instances
    $course->start_date = \Carbon\Carbon::parse($course->start_date);
    $course->end_date = \Carbon\Carbon::parse($course->end_date);

    return view('courses.edit', compact('course'));
}


    public function destroy(Course $course)
    {
        // Delete the image if it exists
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();
        return redirect()->route('courses.index');
    }
}

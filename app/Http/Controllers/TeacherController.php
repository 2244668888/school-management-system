<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone']); // Adjust to only include these fields

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('public/profile_pictures');
            $data['profile_picture'] = basename($imagePath);
        }

        Teacher::create($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }


    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('profile_picture');

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($teacher->profile_picture) {
                Storage::delete('public/profile_pictures/' . $teacher->profile_picture);
            }

            $imagePath = $request->file('profile_picture')->store('public/profile_pictures');
            $data['profile_picture'] = basename($imagePath);
        }

        $teacher->update($data);
        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function destroy(Teacher $teacher)
    {
        // Delete the profile picture if it exists
        if ($teacher->profile_picture) {
            Storage::delete('public/profile_pictures/' . $teacher->profile_picture);
        }

        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}

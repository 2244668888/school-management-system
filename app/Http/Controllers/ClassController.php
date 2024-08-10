<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function index()
    {
        $class_models = ClassModel::all();
        return view('classes.index', compact('class_models'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        ClassModel::create([
            'name' => $request->input('name'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }
    public function edit($id)
    {
        $class = ClassModel::find($id);

        if ($class) {
            return view('classes.edit', compact('class'));
        } else {
            return redirect()->route('classes.index')->with('error', 'Class not found.');
        }
    }


    public function destroy($id)
    {
        $class = ClassModel::find($id);

        if ($class) {
            $class->delete();
            return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
        } else {
            return redirect()->route('classes.index')->with('error', 'Class not found.');
        }
    }
}

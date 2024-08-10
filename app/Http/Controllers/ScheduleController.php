<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $schedules = Schedule::whereDate('start_time', $today)->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $class_models = ClassModel::all();
        return view('schedules.create', compact('class_models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'start_time' => 'required|date_format:Y-m-d H:i:s', 
            'end_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        try {
            $schedule->update($request->all());
            return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update schedule: ' . $e->getMessage()]);
        }
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}

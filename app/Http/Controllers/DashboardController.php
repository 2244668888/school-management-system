<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all(); // Fetch all schedule records from the database
        return view('dashboard', compact('schedules'));
    }
}

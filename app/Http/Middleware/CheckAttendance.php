<?php

// app/Http/Middleware/CheckAttendance.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Attendance;

class CheckAttendance
{
    public function handle(Request $request, Closure $next)
    {
        $now = now();

        $schedules = Schedule::where('start_time', '<=', $now)->where('end_time', '>=', $now)->get();

        foreach ($schedules as $schedule) {
            $attendance = Attendance::firstOrCreate(
                ['student_id' => $schedule->student_id, 'class_id' => $schedule->class_id, 'date' => $now->toDateString()],
                ['status' => 'present']
            );

            if (!$attendance->wasRecentlyCreated && $now->greaterThan($schedule->end_time)) {
                $attendance->update(['status' => 'absent']);
            }
        }

        return $next($request);
    }
}

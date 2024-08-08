<?php

// app/Models/Attendance.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Attendance extends Model
{
    protected $fillable = ['student_id', 'class_id', 'date', 'status'];


    protected $casts = [
        'date' => 'datetime', // Ensure the date is cast to Carbon instance
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class); // Adjust to the actual model name
    }
}



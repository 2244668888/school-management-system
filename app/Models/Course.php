<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
// app/Models/Course.php

protected $fillable = [
    'name',
    'description',
    'start_date',
    'end_date',
    'image', // Add this line
];


    protected $dates = [
        'start_date',
        'end_date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dob', 'address'];

    // Cast the dob attribute to a date
    protected $casts = [
        'dob' => 'date',
    ];
}

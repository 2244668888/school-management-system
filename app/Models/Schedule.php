<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'start_time',
        'end_time',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class); // Adjust to the actual model name
    }
}

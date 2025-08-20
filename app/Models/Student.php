<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name','email','roll_number','standard','phone','dob'
    ];

    protected $casts = [
        'dob' => 'date',
    ];
}


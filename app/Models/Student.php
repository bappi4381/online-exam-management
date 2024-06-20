<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'dob', 'gender', 'blood_group','course', 'image', 'parent_name', 'parent_phone','password'
    ];
}

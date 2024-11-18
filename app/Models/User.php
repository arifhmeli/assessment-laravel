<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this line

class User extends Model
{
    use HasFactory, SoftDeletes; // Add SoftDeletes trait

    // Allow mass assignment for the specified fields
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birthday', 'status_active',
    ];

    // Optionally, you can specify the date columns that should be treated as date types
    protected $dates = ['deleted_at']; // This ensures the 'deleted_at' field is treated as a Carbon instance
}
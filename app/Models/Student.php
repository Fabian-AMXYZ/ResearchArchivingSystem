<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'faculty';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'document_id',
        'department_id',
    ];
}
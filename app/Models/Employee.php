<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'sex',
        'first_name',
        'last_name',
        'mid_name',
        'age',
        'bday',
        'department_id',
        'employed_day',
        'fired_day',
        'status',
        'avatar',
    ];
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class, 'department_id');
    }
}

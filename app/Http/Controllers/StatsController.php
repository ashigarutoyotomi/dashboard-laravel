<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $stats = [];
        $employees_count = Employee::all()->count();
        $departments_count = Department::all()->count();
        $users_count = Employee::all()->count();
        $stats['employees_count'] = $employees_count;
        $stats['departments_count'] = $departments_count;
        $stats['users_count'] = $users_count;
        return $stats;
    }
}

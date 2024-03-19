<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        return $employees;
    }
}

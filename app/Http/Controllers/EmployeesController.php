<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with('department')->get();
        return $employees;
    }
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->department_id = $request->department_id;
        $employee->save();

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->department_id = $request->department_id;
        $employee->save();

        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}

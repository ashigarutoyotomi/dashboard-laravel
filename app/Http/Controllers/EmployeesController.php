<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with('department')->get();
        return $employees;
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mid_name' => 'nullable|string',
            'bday' => 'required|date',
            'sex' => 'required|string',
            'age' => 'required|integer',
            'department_id' => 'required|integer|exists:departments,id',
            'status' => 'required|integer',
            'employeed_day' => 'required|date',
            'fired_day' => 'nullable|date',
        ]);
        $employee = new Employee();
        $carbonDate = Carbon::parse($request->bday);
        $transformedDate = $carbonDate->format('Y-m-d');
        $carbonEmployeedDate = Carbon::parse($request->bday);
        $transformedEmployeedDate = $carbonDate->format('Y-m-d');
        $transformedFiredDate = 0;
        if ($request->fired_day != null) {
            $carbonFiredDate = Carbon::parse($request->bday);
            $transformedFiredDate = $carbonDate->format('Y-m-d');
        }
        DB::transaction(function () use ($request, $employee, $transformedDate, $transformedEmployeedDate,
            $transformedFiredDate) {
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->mid_name = $request->mid_name ? $request->mid_name : null;
            $employee->status = $request->status;
            $employee->mid_name = $request->mid_name ? $request->first_name : null;
            $employee->department_id = $request->department_id;
            $employee->bday = $transformedDate;
            $employee->mid_name = $request->mid_name ? $request->first_name : null;
            $employee->sex = $request->sex;
            $employee->age = $request->age;
            $employee->employeed_day = $transformedEmployeedDate;
            $employee->fired_day = $request->fired_day ? $transformedFiredDate : null;
            $employee->save();
        });

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'mid_name' => 'nullable|string',
            'bday' => 'nullable|date',
            'sex' => 'required|string',
            'age' => 'nullable|integer',
            'department_id' => 'nullable|integer|exists:departments,id',
            'status' => 'nullable|integer',
            'employeed_day' => 'nullable|date',
            'fired_day' => 'nullable|date',
        ]);
        $employee = new Employee();
        $carbonDate = Carbon::parse($request->bday);
        $transformedDate = $carbonDate->format('Y-m-d');
        $carbonEmployeedDate = Carbon::parse($request->bday);
        $transformedEmployeedDate = $carbonDate->format('Y-m-d');
        $transformedFiredDate = 0;
        if ($request->fired_day != null) {
            $carbonFiredDate = Carbon::parse($request->bday);
            $transformedFiredDate = $carbonDate->format('Y-m-d');
        }
        DB::transaction(function () use ($request, $employee, $transformedDate, $transformedEmployeedDate,
            $transformedFiredDate) {
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->mid_name = $request->mid_name ? $request->mid_name : null;
            $employee->status = $request->status;
            $employee->mid_name = $request->mid_name ? $request->first_name : null;
            $employee->department_id = $request->department_id;
            $employee->bday = $transformedDate;
            $employee->mid_name = $request->mid_name ? $request->first_name : null;
            $employee->sex = $request->sex;
            $employee->age = $request->age;
            $employee->employeed_day = $transformedEmployeedDate;
            $employee->fired_day = $request->fired_day ? $transformedFiredDate : null;
            $employee->save();
        });

        return response()->json($employee, 201);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}

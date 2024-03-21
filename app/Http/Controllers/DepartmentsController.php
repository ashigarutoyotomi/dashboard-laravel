<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $department = Department::with('employees')->get();
        return $department;
    }
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->save();

        return response()->json($department, 201);
    }

    public function show($id)
    {
        return Department::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->save();

        return response()->json($department, 200);
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(null, 204);
    }
}

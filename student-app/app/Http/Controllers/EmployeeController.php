<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function dashboard()
    {
        $totalEmp = Employee::count();
        $totalDep = Department::count();
        $newEmp = Employee::latest()->take(5)->get();

        return view('dashboard', compact('totalEmp', 'totalDep', 'newEmp'));
    }
}
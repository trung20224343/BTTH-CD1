<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        DB::table('students')->insert([
            'name' => $request->name,
            'major' => $request->major,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/students');
    }
}
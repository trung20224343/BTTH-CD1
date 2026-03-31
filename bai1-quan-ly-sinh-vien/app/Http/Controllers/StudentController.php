<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc');

        $query = Student::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $query->orderBy('name', $sort);

        $students = $query->paginate(5);

        return view('students.index', compact('students', 'search', 'sort'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'email' => 'required|email|unique:students,email'
        ], [
            'name.required' => 'Vui lòng nhập tên sinh viên.',
            'major.required' => 'Vui lòng nhập ngành học.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email chưa đúng định dạng.',
            'email.unique' => 'Email này đã tồn tại trong hệ thống!'
        ]);

        Student::create([
            'name' => $request->name,
            'major' => $request->major,
            'email' => $request->email,
        ]);

        return redirect('/students/create')->with('success', 'Thêm sinh viên thành công!');
    }
}
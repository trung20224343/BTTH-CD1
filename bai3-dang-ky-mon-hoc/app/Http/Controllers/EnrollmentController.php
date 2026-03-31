<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->get();
        $courses = Course::all();
        
        return view('enrollments.index', compact('students', 'courses'));
    }

    public function storeStudent(Request $request)
    {
        $request->validate(['name' => 'required']);
        Student::create($request->all());
        
        return redirect('/enrollments')->with('success', 'Thêm sinh viên thành công!');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'credits' => 'required|integer|min:1'
        ]);
        Course::create($request->all());
        
        return redirect('/enrollments')->with('success', 'Thêm môn học thành công!');
    }

    public function storeEnrollment(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id'
        ]);

        $student = Student::findOrFail($request->student_id);
        $course = Course::findOrFail($request->course_id);

        $exists = Enrollment::where('student_id', $student->id)
                            ->where('course_id', $course->id)
                            ->exists();

        if ($exists) {
            return redirect('/enrollments')->with('error', 'Sinh viên đã đăng ký môn học này!');
        }

        $currentCredits = $student->courses()->sum('credits');
        $newTotal = $currentCredits + $course->credits;

        if ($newTotal > 18) {
            return redirect('/enrollments')->with('error', 'Vượt quá giới hạn 18 tín chỉ!');
        }

        Enrollment::create([
            'student_id' => $student->id,
            'course_id' => $course->id
        ]);

        return redirect('/enrollments')->with('success', 'Đăng ký môn học thành công!');
    }
}
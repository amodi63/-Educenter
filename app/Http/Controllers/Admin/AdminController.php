<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use App\Models\Major;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $c_count = Category::count();
        $co_count = Course::count();
        $e_count = Event::count();
        $m_count = Major::count();
        $t_count = Teacher::count();
        $u_count = User::count();
        $user = Auth::user();
        $enrolledCourses = collect();
        $teachingCourses = collect();
        if ($user->role->name == 'Student') {
            $enrolledCourses = Registration::where('student_id', $user->student?->id)
            ->with('course')
            ->get()
            ->pluck('course');
        }
 
        if ($user->role->name == 'Teacher') {
            $teacher = $user->teacher;
            $teachingCourses = Course::where('teacher_id', $user->teacher->id)->get();
        }

       
        return view('admin.index', compact('u_count','c_count', 'co_count', 'e_count', 'm_count', 't_count', 'enrolledCourses', 'teachingCourses','user'));
    }
}

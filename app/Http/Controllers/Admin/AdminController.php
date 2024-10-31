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
        $users=User::find(1);

        // $m_earning = Payment::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('total');
        // $y_earning = Payment::whereYear('created_at', date('Y'))->sum('total');
        return view('admin.index', compact('users','c_count','co_count','e_count','m_count','t_count'));
    }
}

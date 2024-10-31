<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_courses');
        $courses = Course::with('teacher')->orderByDesc('id')->paginate(5);
        $teacher = Teacher::all();
        return view('admin.courses.index',compact('courses','teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('admin.courses.create', compact('courses','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
           // 'registration_id' => 'required',
            'teacher_id'=> 'required',
        ]);

        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/courses'), $img_name);

        Course::create([
           'image' => $img_name,
            'title' => $request->title,
           'description' => $request->description,
           'btn_text' => $request->btn_text,
           'btn_link' => $request->btn_link,
          // 'registration_id' => $request->registration_id,
           'teacher_id' => $request->teacher_id,

        ]);

        return redirect()->route('admin.courses.index')->with('msg', 'Course created successfully')->with('type', 'success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('courses', 'course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
          //  'registration_id' => 'required',
            'teacher_id'=> 'required',
        ]);

        $courses = Course::findOrFail($id);

        $img_name = $courses->image;
        if($request->hasFile('image')) {
           $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/courses'), $img_name);
       }


       $courses->update([
        'image' => $img_name,
            'title' => $request->title,
           'description' => $request->description,
           'btn_text' => $request->btn_text,
           'btn_link' => $request->btn_link,
          // 'registration_id' => $request->registration_id,
           'teacher_id' => $request->teacher_id,

    ]);

    // Redirect
    return redirect()->route('admin.courses.index')->with('msg', 'Courses updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        File::delete(public_path('uploads/courses/'.$course->image));
        $course->delete();
        return redirect()->back()->with('msg', 'Course deleted successfully')->with('type', 'danger');
    }
}

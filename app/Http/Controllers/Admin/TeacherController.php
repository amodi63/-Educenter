<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::find(1);
        Gate::authorize('all_teachers');
        $teachers= Teacher::with('category')->orderByDesc('id')->paginate(5);
        return view('admin.teachers.index', compact('teachers','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::find(1);
        $teachers = Teacher::all();
        $categories = Category::all();
        return view('admin.teachers.create', compact('teachers','categories','users'));
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
            'name' => 'required',
            'major' => 'required',
            'category_id' => 'nullable',
        ]);

        $img = $request->file('image');
       $img_name = rand() . time() . $img->getClientOriginalName();
       $img->move(public_path('uploads/teachers'), $img_name);

       Teacher::create([
        'image' => $img_name,
        'name' => $request->name,
        'major' => $request->major,
        'categorie_id' => $request->category_id

    ]);

    return redirect()->route('admin.teachers.index')->with('msg', 'Category created successfully')->with('type', 'success');



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
        $categories = Category::all();
        $teachers = Teacher::all();
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.edit', compact('teachers', 'teacher','categories'));
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
            //'image' => 'required',
            'name' => 'required',
            'major' => 'required',
            'category_id' => 'nullable',
        ]);

        $teacher = Teacher::findOrFail($id);

        $img_name = $teacher->image;
        if($request->hasFile('image')) {
           $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/teachers'), $img_name);
       }

       $teacher->update([
        'image' => $img_name,
        'name' => $request->name,
        'major' => $request->major,
        'categorie_id' => $request->category_id

    ]);

    return redirect()->route('admin.teachers.index')->with('msg', 'Teacher updated successfully')->with('type', 'info');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Course::where('teacher_id',$id)->first();
        if($courses)
        {
            return redirect()->back()->with('msg', 'Teacher Cant Delete Because Find In Courses')->with('type', 'danger');
        }
        $teacher = Teacher::findOrFail($id);

        File::delete(public_path('uploads/teachers/'.$teacher->image));

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('msg', 'Teacher deleted successfully')->with('type', 'success');
    }
}

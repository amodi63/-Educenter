<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use App\Http\Resources\TeacherResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use App\Http\Controllers\Api\TeacherResponse;
use App\Http\Controllers\TeacherResource;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "error" => false,
            "teacher" => Teacher::all()],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),["name"=>"required|unique:teachers"]);

        if($v->failse()){
             return response()->json(["error"=>true,
             "errors"=>$v->errors()],
              422);
        }
           $teacher = new Teacher(["name"=>$request->name]);
           $teacher->save();
           return new TeacherResource($teacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Teacher $teacher)
    {
        return new TeacherResource($teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Teacher $teacher )
    {
        $v = Validator::make($request->all(),["name"=>"required|unique:teachers"]);


        if($v->failse()){
            return response()->json(["error"=>true,
            "errors"=>$v->errors()],
             422);
       }

       $teacher->name = $request->name;
       $teacher->save();
       return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
       return response()->json(null, 204);
       return response()->json([
        "error" =>false,
        "message" =>"the teacher with id:$teacher->id successfuly been deleted"],204);

    }
}

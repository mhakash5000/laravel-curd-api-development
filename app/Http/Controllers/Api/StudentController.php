<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Student::all();
        return($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|unique:students|max:255',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'image' => 'required',
        ]);
        $storeData=new Student();
        $storeData->class_id=$request->class_id;
        $storeData->section_id=$request->section_id;
        $storeData->name=$request->name;
        $storeData->phone=$request->phone;
        $storeData->email=$request->email;
        $storeData->password=Hash::make($request->password);
        $storeData->address=$request->address;
        $storeData->gender=$request->gender;
        $storeData->image=$request->image;
        $storeData->save();
        return response("Student Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showId=Student::find($id);
        return ($showId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $UpdateStudent=new Student();
        $UpdateStudent->class_id=$request->class_id;
        $UpdateStudent->section_id=$request->section_id;
        $UpdateStudent->name=$request->name;
        $UpdateStudent->phone=$request->phone;
        $UpdateStudent->email=$request->email;
        $UpdateStudent->password=Hash::make($request->password);
        $UpdateStudent->address=$request->address;
        $UpdateStudent->gender=$request->gender;
        $UpdateStudent->image=$request->image;
        $UpdateStudent->save();
        return response("Student Updated Successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //By DB Table
        $img=DB::table('students')->where('id',$id)->first();
        $img_path=$img->image;

        unlink($img_path);
        DB::table('students')->where('id',$id)->delete();
        return response("Student Delete Successfully");

        //By model
        // $DeleteStudentImg=Student::find($id);
        // if(file_exists('public/image/student_images/'.$DeleteStudentImg->image)AND ! empty($DeleteStudentImg->image))
        // {
        //  unlink('public/image/student_images/'.$DeleteStudentImg->image);
        // }
        // Student::where('id',$DeleteStudentImg->id)->delete();
        // $DeleteStudentImg->delete();
        // return response("Student Delete Successfully");

    }
}

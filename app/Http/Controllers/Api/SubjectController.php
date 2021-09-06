<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject=Subject::all();
        return($subject);
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
            'class_id' => 'required|unique:subjects|max:255',
            'subject_name' => 'required|unique:subjects|max:255',
            'subject_code' => 'required|unique:subjects|max:255',
        ]);
        $subject=new Subject();
        $subject->class_id=$request->class_id;
        $subject->subject_name=$request->subject_name;
        $subject->subject_code=$request->subject_code;
        $subject->save();
        return response("subject inserted");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SubjectShow=Subject::find($id);
        return ($SubjectShow);
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

        $Update=Subject::find($id);
        $Update->class_id=$request->class_id;
        $Update->subject_name=$request->subject_name;
        $Update->subject_code=$request->subject_code;
        $Update->save();
        return response("Updated inserted");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Subject::findorFail($id);
        $delete->delete();
        return response("Subject Deleted");
    }
}

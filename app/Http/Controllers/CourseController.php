<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternCourse;
use App\Http\Requests;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //post to database
        $check_course = InternCourse::where('course','LIKE',$request->input('course'))
                                  ->get();

        $count = count($check_course);

        if($count >= 1){

          Session::flash('repeat','Course Already Exist');
          return redirect()->route('others.index');

        }else{

        $course = new InternCourse;

        $course->course = $request->input('course');

        $course->save();

        Session::flash('success','New Course was Successfully Save');

        return redirect()->route('others.index');

        }
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
        $school = InternCourse::find($id);

        $school->course = $request->input('course');

        $school->save();

        Session::flash('success','School was Successfully Updated');

        return redirect()->route('others.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

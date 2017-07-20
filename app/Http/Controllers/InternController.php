<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intern;
use App\Http\Requests;
use App\InternCourse;
use App\InternSchool;
use App\Tag;
use Session;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $intern = Intern::when($search, function ($query) use ($search) {
                            return $query->where('last_name','=',$search)
                                         ->orWhere('first_name','=',$search)
                                         ->orWhere('middle_name','=',$search)
                                         ->orWhere('primary_contact','=',$search)
                                         ->orWhere('email','=',$search);
                            })
                            ->get();

        $count = 1;
        return view('intern.index')->with([ 'interns'=> $intern,'count' => $count ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = InternCourse::all();
        $school = InternSchool::all();
        $tag = Tag::all();

        return view('intern.create')->with([
                'courses' => $course,
                'schools' => $school,
                'tags' => $tag
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_intern = Intern::where('last_name','LIKE',$request->input('last_name'))
                                  ->where('first_name','LIKE',$request->input('first_name'))
                                  ->where('middle_name','LIKE',$request->input('middle_name'))
                                  ->get();

        $count = count($check_intern);

        if($count >= 1){

          Session::flash('repeat','Intern Already Exist');
          return redirect()->route('interns.index');

        }else{
                
        $intern = new Intern;

        $intern->last_name = $request->input('last_name');
        $intern->first_name = $request->input('first_name');
        $intern->middle_name = $request->input('middle_name');
        $intern->email = $request->input('email');
        $intern->school_id = $request->input('school');
        $intern->course_id = $request->input('course');
        $intern->primary_contact = $request->input('primary_contact');
        $intern->date_start = $request->input('date_start');
        $intern->date_end = $request->input('date_end');

        $intern->save();

        $intern->tags()->sync($request->input('tags'), false);

        Session::flash('success','Intern was Successfully Save');

        return redirect()->route('interns.index');
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
        //$tag = Intern::find($id);

        //return view('intern.show')->with('tag',$tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internedit = Intern::find($id);

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view('intern.edit')->with([
                'tags' => $tags2,
                'internEdit' => $internedit
          ]);
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
        $intern = Intern::find($id);

        $intern->last_name = $request->input('last_name');
        $intern->first_name = $request->input('first_name');
        $intern->middle_name = $request->input('middle_name');
        $intern->email = $request->input('email');
        $intern->school_id = $request->input('school');
        $intern->course_id = $request->input('course');
        $intern->primary_contact = $request->input('primary_contact');
        $intern->date_start = $request->input('date_start');
        $intern->date_end = $request->input('date_end');

        $intern->save();

        $intern->tags()->sync($request->input('tags'));

        Session::flash('success','Intern was Successfully Updated');

        return redirect()->route('interns.index');
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

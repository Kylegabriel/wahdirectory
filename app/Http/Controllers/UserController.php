<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Session;
use App\UserRole;

class UserController extends Controller
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

        $users = User::when($search, function ($query) use ($search) {
                            return $query->where('last_name','=',$search)
                                         ->orWhere('first_name','=',$search)
                                         ->orWhere('middle_name','=',$search)
                                         ->orWhere('primary_contact','=',$search)
                                         ->orWhere('secondary_contact','=',$search)
                                         ->orWhere('email','=',$search)
                                         ->orWhere('secondary_email','=',$search);
                            })
                            ->get();
        $no = 1;
        return view('profile.index')->with(['user'=>$users,'count'=>$no]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_user = User::where('last_name','LIKE',$request->input('last_name'))
                                  ->where('first_name','LIKE',$request->input('first_name'))
                                  ->where('middle_name','LIKE',$request->input('middle_name'))
                                  ->where('suffix_name','LIKE',$request->input('suffix_name'))
                                  ->where('birthdate','=',$request->input('date_of_birth'))
                                  ->get();

        $count = count($check_user);

        if($count >= 1){

          Session::flash('repeat','Record Already Exist');

          return redirect()->route('profile.index');//,$partner->id);

        }else{
        $user = new User;

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->gender = $request->input('gender');
        $user->designation = $request->input('designation');
        $user->primary_contact = $request->input('primary_contact');
        $user->secondary_contact = $request->input('secondary_contact');
        $user->email = $request->input('email');
        $user->secondary_email = $request->input('secondary_email');
        $user->birthdate = $request->input('date_of_birth');
        $user->datehired = $request->input('date_of_hired');
        $user->is_active = $request->input('is_active');
        $user->sites = $request->input('sites');

        $user->save();

        Session::flash('success','The User was Successfully Save..!');

        return redirect()->route('profile.index');
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
        $editUser = User::find($id);

        return view('profile.edit')->with('users',$editUser);
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
        $user = User::find($id);

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->gender = $request->input('gender');
        $user->designation = $request->input('designation');
        $user->primary_contact = $request->input('primary_contact');
        $user->secondary_contact = $request->input('secondary_contact');
        $user->email = $request->input('email');
        $user->secondary_email = $request->input('secondary_email');
        $user->birthdate = $request->input('date_of_birth');
        $user->datehired = $request->input('date_of_hired');
        $user->is_active = $request->input('is_active');
        $user->sites = $request->input('sites');

        $user->save();
        
        Session::flash('success','The User was Updated Successfully..!');

        return redirect()->route('profile.index');
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

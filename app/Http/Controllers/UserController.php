<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\SuffixName;
use App\Http\Requests;
use Session;


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

        $users = User::orderBy('id','desc')
                               ->get();

        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
        $role = UserRole::get();

        $roles = UserRole::get();
        $role = array();
        foreach ($roles as $rol) {
            $role[$rol->id] = $rol->role_name;
        }

        $no = 1;
        return view('users.index')->with([
            'users'=>$users,
            'count'=>$no,
            'suffix' => $suf,
            'role'=>$role
            ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_user = User::where('username','LIKE',$request->input('username'))
                                  ->get();

        $count = count($check_user);

        if($count >= 1){

          Session::flash('repeat','Username Already Exist');

          return redirect()->route('users.index');//,$partner->id);

        }else{
        $user = new User;

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->is_admin = $request->input('is_admin');

        $user->save();

        Session::flash('success','New User was Successfully Save..!');

        return redirect()->route('users.index');
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
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->is_admin = $request->input('is_admin');

        $user->save();
        
        Session::flash('success','WAH-NGO ' .$user->last_name. ' was Updated Successfully..!');

        return redirect()->route('users.index');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use App\UserRole;
use App\SuffixName;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles = Profile::orderBy('id','desc')
                            ->get();
        
        $no = 1;
        return view('profile.index')->with([
            'profiles'=>$profiles,
            'count'=>$no,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }

        $role = UserRole::get();

        $no = 1;
        return view('profile.create')->with([
            'count'=>$no,
            'designation'=>$role,
            'suffix' => $suf
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
        $profile = Profile::where('last_name','LIKE',$request->input('last_name'))
                                  ->where('first_name','LIKE',$request->input('first_name'))
                                  ->where('middle_name','LIKE',$request->input('middle_name'))
                                  ->where('suffix_name','LIKE',$request->input('suffix_name'))
                                  ->where('birthdate','=',$request->input('birthdate'))
                                  ->get();

        $count = count($profile);

        if($count >= 1){

          Session::flash('repeat','Record Already Exist');

          return redirect()->route('profile.index');//,$partner->id);

        }else{
        $user = new Profile;

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
        $user->birthdate = $request->input('birthdate');
        $user->datehired = $request->input('datehired');
        $user->philhealth = $request->input('philhealth');
        $user->tin = $request->input('tin');
        $user->sss = $request->input('sss');
        $user->pagibigmidno = $request->input('pagibigmidno');
        $user->pagibigrtn = $request->input('pagibigrtn');
        $user->mabuhaymilespal = $request->input('mabuhaymilespal');
        $user->getgocebupac = $request->input('getgocebupac');

        $user->save();

        Session::flash('success','New WAH-NGO was Successfully Save..!');

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
        $editProfile = Profile::find($id);

        $role = UserRole::get();
        $desig = array();
        foreach ($role as $role) {
            $desig[$role->role_id] = $role->role_name;
        }

        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
            
        return view('profile.edit')->with([
            'profile' => $editProfile,
            'desig' => $desig,
            'suffix' => $suf
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
        $user = Profile::find($id);

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
        $user->birthdate = $request->input('birthdate');
        $user->datehired = $request->input('datehired');
        $user->is_active = $request->input('is_active');
        $user->philhealth = $request->input('philhealth');
        $user->tin = $request->input('tin');
        $user->sss = $request->input('sss');
        $user->pagibigmidno = $request->input('pagibigmidno');
        $user->pagibigrtn = $request->input('pagibigrtn');
        $user->mabuhaymilespal = $request->input('mabuhaymilespal');
        $user->getgocebupac = $request->input('getgocebupac');

        $user->save();
        
        Session::flash('success','WAH-NGO ' .$user->last_name. ' was Updated Successfully..!');

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use App\UserRole;
use App\SuffixName;
use App\FacilityConfig;
use App\DemographicRegion;
use App\DemographicProvince;
use App\DemographicMunicipality;
use App\DemographicBarangay;
use Session;
use Image;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $suf;
    protected $reg;

    public function __construct(){
        $this->middleware('auth');

        $suffix = SuffixName::all();
        $this->suf = array();
        foreach ($suffix as $suffixes) {
            $this->suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }

        $regions = DemographicRegion::all();
        $this->reg = array();
        foreach ($regions as $region) {
            $this->reg[$region->region_code] = $region->region_name;
        }

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

        $facility = FacilityConfig::with('province','municipality','barangay')->first();


        $provinces = DemographicProvince::select('province_code','province_name')
                                    ->where('region_code','=',$facility->province->region_code)
                                    ->get();
        $prov = array();
        foreach ($provinces as $province) {
            $prov[$province->province_code] = $province->province_name;
        }

        $municipalities = DemographicMunicipality::select('muncity_code','muncity_name')
                                    //SELECT * FROM lib_municipality WHERE province_code = $facility->municipality->province_code
                                    ->where('province_code','=',$facility->municipality->province_code)
                                    ->get();
        $muncity = array();
        foreach ($municipalities as $municipality) {
            $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        }

        $barangays = DemographicBarangay::select('brgy_code','brgy_name')
                                    ->where('muncity_code','=',$facility->barangay->muncity_code)
                                    ->get();
        $brgy = array();
        foreach ($barangays as $barangay) {
            $brgy[$barangay->brgy_code] = $barangay->brgy_name;
        }

        return view('profile.create')->with([
            'facility' => $facility,
            'suffix' => $this->suf,
            'region' => $this->reg,
            'province' => $prov,
            'muncity' => $muncity,
            'brgy' => $brgy,
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

          return redirect()->route('profile.index');//,$user->id);

        }else{
        $user = new Profile;

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->user_id = $request->user()->id;
        $user->gender = $request->input('gender');
        $user->role_id = $request->input('role_id');
        $user->region_code = $request->input('region_code');
        $user->province_code = $request->input('province_code');
        $user->muncity_code = $request->input('muncity_code');
        $user->brgy_code = $request->input('brgy_code');
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize( 800,400 )->save($location);

            $user->image = $filename;
        }

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
        $profile = Profile::find($id);

        return view('profile.show')->with([
            'profile'=>$profile,
            ]);
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
            $desig[$role->id] = $role->role_name;
        }

        $provinces = DemographicProvince::select('province_code','province_name')
                                    ->where('region_code','=',$editProfile->region_code)
                                    ->get();
        $prov = array();
        foreach ($provinces as $province) {
            $prov[$province->province_code] = $province->province_name;
        }

        $municipalities = DemographicMunicipality::select('muncity_code','muncity_name')
                                    //SELECT * FROM lib_municipality WHERE province_code = $facility->municipality->province_code
                                    ->where('province_code','=',$editProfile->province_code)
                                    ->get();
        $muncity = array();
        foreach ($municipalities as $municipality) {
            $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        }

        $barangays = DemographicBarangay::select('brgy_code','brgy_name')
                                    ->where('muncity_code','=',$editProfile->muncity_code)
                                    ->get();
        $brgy = array();
        foreach ($barangays as $barangay) {
            $brgy[$barangay->brgy_code] = $barangay->brgy_name;
        }

        return view('profile.edit')->with([
            'profile' => $editProfile,
            'desig' => $desig,
            'suffix' => $this->suf,
            'region' => $this->reg,
            'province' => $prov,
            'muncity' => $muncity,
            'brgy' => $brgy,
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
        $user->role_id = $request->input('role_id');
        $user->region_code = $request->input('region_code');
        $user->province_code = $request->input('province_code');
        $user->muncity_code = $request->input('muncity_code');
        $user->brgy_code = $request->input('brgy_code');
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize( 800,400 )->save($location);
            $oldFilename = $partner->image;
            $partner->image = $filename;
            File::delete(public_path('img/'. $oldFilename));
        }

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

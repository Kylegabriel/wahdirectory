<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Partner;
use App\SuffixName;
use App\UserRole;
use App\PartnerDesignation;
use App\PartnerOrganization;
use App\FacilityConfig;
use App\DemographicRegion;
use Session;

class PartnerController extends Controller
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
        $partner = Partner::orderBy('id','desc')
                            ->get();

        $no = 1;
        return view('partner.index')->with([ 
            'partner' => $partner,
            'count' => $no,
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
        $region = DemographicRegion::get();

        $facility = FacilityConfig::with('province','municipality','barangay')->first();

        return view('partner.create')->with([ 
            'suffix' => $suf,
            'facility' => $facility,
            'region' => $region
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
        $check_patient = Partner::where('last_name','LIKE',$request->input('last_name'))
                                  ->where('first_name','LIKE',$request->input('first_name'))
                                  ->where('middle_name','LIKE',$request->input('middle_name'))
                                  ->where('suffix_name','LIKE',$request->input('suffix_name'))
                                  ->where('birthdate','=',$request->input('birthdate'))
                                  ->get();

        $count = count($check_patient);

        if($count >= 1){

          Session::flash('repeat','Record Already Exist');
          return redirect()->route('partner.index');//,$partner->id);

        }else{
                
        $partner = new Partner;

        $partner->desig_id = $request->input('desig_id');
        $partner->org_id = $request->input('org_id');
        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->suffix_name = $request->input('suffix_name');
        $partner->region_code = $request->input('region_code');
        $partner->province_code = $request->input('province_code');
        $partner->muncity_code = $request->input('muncity_code');
        $partner->brgy_code = $request->input('brgy_code');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('birthdate');
        $partner->is_active = $request->input('is_active');

        $partner->save();

            Session::flash('success','Partner '.$partner->first_name.' was Successfully Save');

        return redirect()->route('partner.index');//,$partner->id);
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
        $partner = Partner::find($id);

        return view('partner.show')->with([
            'partner'=>$partner,
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

        $editPartner = Partner::find($id);

        $designations = PartnerDesignation::get();
        $desig = array();
        foreach ($designations as $desiginat) {
            $desig[$desiginat->id] = $desiginat->designation;
        }

        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
        
        $organizations = PartnerOrganization::get();
        $org = array();
        foreach ($organizations as $organization) {
            $org[$organization->id] = $organization->organization;
        }

        $facility = FacilityConfig::with('province','municipality','barangay')->first();

        $regions = DemographicRegion::get();
        $reg = array();
        foreach ($regions as $region) {
            $reg[$region->region_code] = $region->region_name;
        }

        return view('partner.edit')->with([
            'partners' => $editPartner,
            'designation' => $desig,
            'suffix' => $suf,
            'organization' => $org,
            'facility' => $facility,
            'region' => $reg
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

        $partner = Partner::find($id);

        $partner->desig_id = $request->input('desig_id');
        $partner->org_id = $request->input('org_id');
        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->suffix_name = $request->input('suffix_name');
        $partner->region_code = $request->input('region_code');
        $partner->province_code = $request->input('province_code');
        $partner->muncity_code = $request->input('muncity_code');
        $partner->brgy_code = $request->input('brgy_code');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('birthdate');
        $partner->is_active = $request->input('is_active');

        $partner->save();

        Session::flash('success','Partner '.$partner->last_name.' was Updated Successfully..!');


        return redirect()->route('partner.index');//,$partner->id);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuffixName;
use App\Site;
use App\FacilityConfig;
use App\SitesDesignation;
use App\DemographicRegion;
use App\DemographicProvince;
use App\DemographicMunicipality;
use App\DemographicBarangay;
use App\Facility;
use App\Http\Requests;
use Session;

class SitesController extends Controller
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

        $site = Site::where('status', '=', 'Y')
                      ->orderBy('hfhudcode','desc')
                      ->get();

        $count = 1;
        return view('sites.index')->with([
            'sites' => $site,
            'count' => $count,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $region = DemographicRegion::get();

        $suffix = SuffixName::all();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }

        $facility = FacilityConfig::with('province','municipality','barangay','facilities')->first();

        $regions = DemographicRegion::all();
        $reg = array();
        foreach ($regions as $region) {
            $reg[$region->region_code] = $region->region_name;
        }

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

        $facilities = Facility::select('hfhudcode','hfhudname')
                                    ->where('brgy_code','=',$facility->facilities->brgy_code)
                                    ->get();
        $fac = array();
        foreach ($facilities as $data) {
            $fac[$data->hfhudcode] = $data->hfhudname;
        }
        
        return view('sites.create')->with([
            'suffix' => $suf,
            'region' => $reg,
            'province' => $prov,
            'muncity' => $muncity,
            'brgy' => $brgy,
            'fac' => $fac,
            'facility' => $facility
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
        $check_site = Site::where('last_name','LIKE',$request->input('last_name'))
                          ->where('first_name','LIKE',$request->input('first_name'))
                          ->where('middle_name','LIKE',$request->input('middle_name'))
                          ->where('suffix_name','LIKE',$request->input('suffix_name'))
                          ->where('birthdate','=',$request->input('birthdate'))
                          ->get();

        $count = count($check_site);

        if($count >= 1){

          Session::flash('repeat','Site sites Already Exist');
          return redirect()->route('sites.index');

        }else{
                
        $sites = new Site;

        $sites->last_name = $request->input('last_name');
        $sites->first_name = $request->input('first_name');
        $sites->middle_name = $request->input('middle_name');
        $sites->suffix_name = $request->input('suffix_name');
        $sites->site_id = $request->input('site_id');
        $sites->user_id = $request->user()->id;
        $sites->region_code = $request->input('region_code');
        $sites->province_code = $request->input('province_code');
        $sites->muncity_code = $request->input('muncity_code');
        $sites->brgy_code = $request->input('brgy_code');
        $sites->hfhudcode = $request->input('hfhudcode');
        // $sites->site = $request->input('site');
        $sites->status = $request->input('status');
        $sites->gender = $request->input('gender');
        $sites->primary_contact = $request->input('primary_contact');
        $sites->secondary_contact = $request->input('secondary_contact');
        $sites->email = $request->input('email');
        $sites->secondary_email = $request->input('secondary_email');
        $sites->birthdate = $request->input('birthdate');
        $sites->is_active = $request->input('is_active');

        $sites->save();

        Session::flash('success','New Site sites was Successfully Save');

        if ($request->input('status') == 'N') {
          return redirect()->route('warmleads.index');
        }else{
          return redirect()->route('sites.index');
        }
        
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
        $sites = Site::find($id);

        return view('sites.show')->with([
            'sites'=>$sites,
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
        $editSites = Site::find($id);

        $suffix = SuffixName::all();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
        
        $siteDesignations = SitesDesignation::get();
        $siteDesig = array();
        foreach ($siteDesignations as $siteDesignation) {
            $siteDesig[$siteDesignation->id] = $siteDesignation->sites_desc;
        }

        $regions = DemographicRegion::all();
        $reg = array();
        foreach ($regions as $region) {
            $reg[$region->region_code] = $region->region_name;
        }

        $provinces = DemographicProvince::select('province_code','province_name')
                                    ->where('region_code','=',$editSites->region_code)
                                    ->get();
        $prov = array();
        foreach ($provinces as $province) {
            $prov[$province->province_code] = $province->province_name;
        }

        $municipalities = DemographicMunicipality::select('muncity_code','muncity_name')
                                    //SELECT * FROM lib_municipality WHERE province_code = $facility->municipality->province_code
                                    ->where('province_code','=',$editSites->province_code)
                                    ->get();
        $muncity = array();
        foreach ($municipalities as $municipality) {
            $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        }

        $barangays = DemographicBarangay::select('brgy_code','brgy_name')
                                    ->where('muncity_code','=',$editSites->muncity_code)
                                    ->get();
        $brgy = array();
        foreach ($barangays as $barangay) {
            $brgy[$barangay->brgy_code] = $barangay->brgy_name;
        }

        $facilities = Facility::select('hfhudcode','hfhudname')
                                    ->where('brgy_code','=',$editSites->brgy_code)
                                    ->get();
        $fac = array();
        foreach ($facilities as $data) {
            $fac[$data->hfhudcode] = $data->hfhudname;
        }

        return view('sites.edit')->with([
            'sites' => $editSites,
            'suffix' => $suf,
            'siteDesig' => $siteDesig,
            'region' => $reg,
            'province' => $prov,
            'muncity' => $muncity,
            'brgy' => $brgy,
            'fac' => $fac
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


        $sites = Site::find($id);

        $sites->last_name = $request->input('last_name');
        $sites->first_name = $request->input('first_name');
        $sites->middle_name = $request->input('middle_name');
        $sites->suffix_name = $request->input('suffix_name');
        $sites->site_id = $request->input('site_id');
        $sites->region_code = $request->input('region_code');
        $sites->province_code = $request->input('province_code');
        $sites->muncity_code = $request->input('muncity_code');
        $sites->brgy_code = $request->input('brgy_code');
        $sites->hfhudcode = $request->input('hfhudcode');
        // $sites->site = $request->input('site');
        $sites->status = $request->input('status');
        $sites->gender = $request->input('gender');
        $sites->primary_contact = $request->input('primary_contact');
        $sites->secondary_contact = $request->input('secondary_contact');
        $sites->email = $request->input('email');
        $sites->secondary_email = $request->input('secondary_email');
        $sites->birthdate = $request->input('birthdate');
        $sites->is_active = $request->input('is_active');

        $sites->save();

        Session::flash('success','Site sites '.$sites->last_name.' was Updated Successfully..!');

        if ($request->input('status') == 'N') {
          return redirect()->route('warmleads.index');
        }else{
          return redirect()->route('sites.index');
        }

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

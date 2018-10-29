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
                      ->orderBy('id','desc')
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
        $siteDesignation = SitesDesignation::get();
        $region = DemographicRegion::get();

        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }

        $facility = FacilityConfig::with('region','province','municipality','barangay')->first();
        
        $count = 1;
        return view('sites.create')->with([
            'count' => $count,
            'suffix' => $suf,
            'siteDesig' => $siteDesignation,
            'region' => $region,
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

        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
        
        $siteDesignations = SitesDesignation::get();
        $siteDesig = array();
        foreach ($siteDesignations as $siteDesignation) {
            $siteDesig[$siteDesignation->id] = $siteDesignation->sites_desc;
        }

        $regions = DemographicRegion::get();
        $reg = array();
        foreach ($regions as $region) {
            $reg[$region->region_code] = $region->region_name;
        }

        $facility = FacilityConfig::with('region','province','municipality','barangay')->first();

        return view('sites.edit')->with([
            'sites' => $editSites,
            'suffix' => $suf,
            'siteDesig' => $siteDesig,
            'region' => $reg,
            'facility' => $facility,
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

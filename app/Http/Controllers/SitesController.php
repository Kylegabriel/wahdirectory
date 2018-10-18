<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuffixName;
use App\Site;
use App\SitesDesignation;
use App\DemographicRegion;
use App\DemographicProvince;
use App\DemographicMunicipality;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\DB;
use Response;

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

        $count = 1;
        return view('sites.create')->with([
            'count' => $count,
            'suffix' => $suf,
            'siteDesig' => $siteDesignation,
            'region' => $region
            ]);
    }

    public function getRegionList(Request $request){
        $region = DemographicRegion::
                    where('site','LIKE','%'.$request->site_id.'%')
                    ->pluck("region_name","region_code");
        return $region;
    }

    public function getProvinceList(Request $request)
    {
        $province = DemographicProvince::
                    where("region_code",'LIKE','%'.$request->region_id.'%')
                    ->pluck("province_name","province_code");
        return $province;
    }

    public function getMuncityList(Request $request)
    {
        $muncity = DemographicMunicipality::
                    where('province_code','LIKE','%'.$request->province_id.'%')
                    ->pluck("muncity_name","muncity_code");
        return $muncity;
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

          Session::flash('repeat','Site Partner Already Exist');
          return redirect()->route('sites.index');

        }else{
                
        $partner = new Site;

        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->suffix_name = $request->input('suffix_name');
        $partner->site_id = $request->input('site_id');
        $partner->region_code = $request->input('region_code');
        $partner->province_code = $request->input('province_code');
        $partner->muncity_code = $request->input('muncity_code');
        $partner->site = $request->input('site');
        $partner->status = $request->input('status');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('birthdate');
        $partner->is_active = $request->input('is_active');

        $partner->save();

            Session::flash('success','New Site Partner was Successfully Save');

        return redirect()->route('sites.index');//,$partner->id);
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

        $provinces = DemographicProvince::get();
        $prov = array();
        foreach ($provinces as $province) {
            $prov[$province->province_code] = $province->province_name;
        }

        $municipalities = DemographicMunicipality::get();
        $muncity = array();
        foreach ($municipalities as $municipality) {
            $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        }

        return view('sites.edit')->with([
            'sites' => $editSites,
            'suffix' => $suf,
            'siteDesig' => $siteDesig,
            'region' => $reg,
            'province' => $prov,
            'municipality' => $muncity
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


        $partner = Site::find($id);

        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->suffix_name = $request->input('suffix_name');
        $partner->site_id = $request->input('site_id');
        $partner->region_code = $request->input('region_code');
        $partner->province_code = $request->input('province_code');
        $partner->muncity_code = $request->input('muncity_code');
        $partner->site = $request->input('site');
        $partner->status = $request->input('status');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('birthdate');
        $partner->is_active = $request->input('is_active');

        $partner->save();

        Session::flash('success','Partner '.$partner->last_name.' was Updated Successfully..!');


        return redirect()->route('sites.index');//,$partner->id);
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

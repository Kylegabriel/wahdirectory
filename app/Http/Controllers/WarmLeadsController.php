<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\SitesDesignation;
use App\DemographicRegion;
use App\SuffixName;
use App\Http\Requests;
use Session;

class WarmLeadsController extends Controller
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
        $site = Site::where('status', '=', 'Y')->get();
        $siteDesignation = SitesDesignation::get();
        $region = DemographicRegion::get();

        $suffix = SuffixName::get();
        $suf = array();
        foreach ($suffix as $suffixes) {
            $suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }

        $count = 1;
        return view('sites.index')->with([
            'sites' => $site,
            'count' => $count,
            'suffix' => $suf,
            'siteDesig' => $siteDesignation,
            'region' => $region
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemographicRegion;
use App\DemographicProvince;
use App\DemographicMunicipality;
use App\DemographicBarangay;
use App\FacilityConfig;
use App\Http\Requests;
use App\Facility;
use Session;
use Illuminate\Support\Facades\DB;
use Response;

class FacilityConfigController extends Controller
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
        $facility = FacilityConfig::with('region','province','municipality','barangay','facilities')->first();

        $reg = DemographicRegion::all();

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
                                    ->where('muncity_code','=',$facility->municipality->muncity_code)
                                    ->get();
        $brgy = array();
        foreach ($barangays as $barangay) {
            $brgy[$barangay->brgy_code] = $barangay->brgy_name;
        }

        $FacilityName = Facility::select('hfhudcode','hfhudname')
                                    ->where('brgy_code','=',$facility->facilities->brgy_code)
                                    ->get();
        $loop = array();
        foreach ($FacilityName as $data) {
            $loop[$data->hfhudcode] = $data->hfhudname;
        }

        return view('facility.index')->with([
            'facility' => $facility,
            'region' => $reg,
            'province' => $prov,
            'muncity' => $muncity,
            'brgy' => $brgy,
            'fac' => $loop,
            ]);
    }

    // public function getRegionList(Request $request){
    //     $region = DemographicRegion::where('site','LIKE','%'.$request->site_id.'%')
    //                 // ->pluck("region_name","region_code");
    //     return $region;
    // }

    public function getProvinceList(Request $request)
    {
        $province = DemographicProvince::
                      select('province_name','province_code')
                    ->where("region_code",'LIKE','%'.$request->input('region_id').'%')
                    ->pluck("province_name","province_code");
        return $province;
    }

    public function getMuncityList(Request $request)
    {
        $muncity = DemographicMunicipality::
                      select('muncity_name','muncity_code')
                    ->where('province_code','LIKE','%'.$request->input('province_id').'%')
                    ->pluck("muncity_name","muncity_code");
        return $muncity;
    }

    public function getBrgyList(Request $request)
    {
        $muncity = DemographicBarangay::
                      select('brgy_name','brgy_code')
                    ->where('muncity_code','LIKE','%'.$request->input('muncity_id').'%')
                    ->pluck("brgy_name","brgy_code");
        return $muncity;
    }
    public function gethfhudcodeList(Request $request)
    {
        $hfhudcode = Facility::
                    select('hfhudname','hfhudcode')
                    ->where('brgy_code','LIKE','%'.$request->input('brgy_code').'%')
                    ->pluck("hfhudname","hfhudcode");
        return $hfhudcode;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $count_facility = FacilityConfig::all();

        $count = count($count_facility);

        if($count >= 1){

          Session::flash('repeat','Facility Already Exist');
          return redirect()->route('facility.index');

        }else{

        $facility = new FacilityConfig;

        //$facility->site_id = $request->input('site');
        $facility->region_code = $request->input('region_code');
        $facility->province_code = $request->input('province_code');
        $facility->muncity_code = $request->input('muncity_code');
        $facility->brgy_code = $request->input('brgy_code');
        $facility->hfhudcode = $request->input('hfhudcode');

        $facility->save();

        Session::flash('success','Facility was Successfully Save');

        return redirect()->route('facility.index');
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
        //
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
        //
        $facility = FacilityConfig::find($id);

        //$facility->site_id = $request->input('site');
        $facility->region_code = $request->input('region_code');
        $facility->province_code = $request->input('province_code');
        $facility->muncity_code = $request->input('muncity_code');
        $facility->brgy_code = $request->input('brgy_code');
        $facility->hfhudcode = $request->input('hfhudcode');

        $facility->save();

        Session::flash('success','Facility was Successfully Updated');

        return redirect()->route('facility.index');
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

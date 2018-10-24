<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemographicRegion;
use App\DemographicProvince;
use App\DemographicMunicipality;
use App\DemographicBarangay;
use App\Http\Requests;
use App\FacilityConfig;
use Session;
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

    public function index()
    {
        $facility = FacilityConfig::with('region','province','municipality','barangay')->first();
        $reg = DemographicRegion::all();

        return view('facility.index')->with([
            'facility' => $facility,
            'region' => $reg
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

    public function getBrgyList(Request $request)
    {
        $muncity = DemographicBarangay::
                    where('muncity_code','LIKE','%'.$request->muncity_id.'%')
                    ->pluck("brgy_name","brgy_code");
        return $muncity;
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

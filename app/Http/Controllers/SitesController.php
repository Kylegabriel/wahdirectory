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
        $search = $request->input('search');

        $site = Site::when($search, function ($query) use ($search) {
                            return $query->where('last_name','LIKE','%'.$search.'%')
                                         ->orWhere('first_name','LIKE','%'.$search.'%')
                                         ->orWhere('middle_name','LIKE','%'.$search.'%')
                                         ->orWhere('primary_contact','LIKE','%'.$search.'%')
                                         ->orWhere('secondary_contact','LIKE','%'.$search.'%')
                                         ->orWhere('designation','LIKE','%'.$search.'%')
                                         ->orWhere('email','LIKE','%'.$search.'%')
                                         ->orWhere('secondary_email','LIKE','%'.$search.'%');
                            })
                            ->orderBy('id','desc')
                            ->get();

        $count = 1;
        return view('sites.index')->with([
            'sites' => $site,
            'count' => $count
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $suffix = SuffixName::get();
        $siteDesignation = SitesDesignation::get();
        $region = DemographicRegion::get();

        return view('sites.create')->with([
            'suffix' => $suffix,
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
                                  ->where('suffix_name','LIKE',$request->input('suffixName'))
                                  ->where('birthdate','=',$request->input('date_of_birth'))
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
        $partner->suffix_name = $request->input('suffixName');
        $partner->designation = $request->input('sitDesignation');
        $partner->region_code = $request->input('region');
        $partner->province_code = $request->input('province');
        $partner->muncity_code = $request->input('municipality');
        $partner->site = $request->input('site');
        $partner->status = $request->input('status');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('date_of_birth');
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

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
    public function index()
    {
        $site = Site::get();
        $count = 1;

        return view('sites.index')->with([
            'site' => $site,
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
        $province = DemographicProvince::get();
        $muncity = DemographicMunicipality::get();

        $reg = $request->input('region');

       $getprov = DB::table('sites')->when($reg,function($query) use ($reg){
                                return $query->select('muncity_name')
                                    ->where('sites.region_code','LIKE','%'.$reg.'%')
                                    ->leftjoin('lib_muncity', 'sites.muncity_code','=', 'lib_muncity.muncity_code')
                                    ->first();
                            })
                            ->get();

        return view('sites.create')->with([
            'suffix' => $suffix,
            'siteDesig' => $siteDesignation,
            'region' => $region,
            'province' => $province,
            'muncity' => $muncity,
            'prov' => $getprov
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
                                  ->where('birthdate','=',$request->input('date_of_birth'))
                                  ->get();

        $count = count($check_site);

        if($count >= 1){

          Session::flash('repeat','Record Already Exist');
          return redirect()->route('sites.index');//,$partner->id);

        }else{
                
        $partner = new Site;

        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
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

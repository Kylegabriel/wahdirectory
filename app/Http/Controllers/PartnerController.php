<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Partner;
use App\SuffixName;
use App\PartnerDesignation;
use App\PartnerOrganization;
use Illuminate\Support\Facades\DB;
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
        $search = $request->input('search');

        $partner = DB::table('partners')->when($search, function ($query) use ($search) {
                            return $query->where('last_name','=',$search)
                                         ->orWhere('first_name','=',$search)
                                         ->orWhere('middle_name','=',$search)
                                         ->orWhere('primary_contact','=',$search)
                                         ->orWhere('secondary_contact','=',$search)
                                         ->orWhere('email','=',$search)
                                         ->orWhere('secondary_email','=',$search);
                            })
                            ->where('status','=','Partner')
                            ->orderBy('id','asc')
                            ->get();
        $no = 1;
        return view('partner.index')->with([ 'partner' => $partner, 'count' => $no ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('partner.create');
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
                                  ->where('birthdate','=',$request->input('date_of_birth'))
                                  ->get();

        $count = count($check_patient);

        if($count >= 1){

          Session::flash('repeat','Record Already Exist');
          return redirect()->route('partner.index');//,$partner->id);

        }else{
                
        $partner = new Partner;

        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->organization = $request->input('partnerOrganization');
        $partner->designation = $request->input('partnerDesignation');
        $partner->suffix_name = $request->input('suffixName');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('date_of_birth');
        $partner->is_active = $request->input('is_active');
        $partner->sites = $request->input('sites');
        $partner->status = $request->input('status');

        $partner->save();

        

        if ($request->input('status') == 'Warm Lead') {
            Session::flash('success','New WarmLead was Successfully Save');
        }else{
            Session::flash('success','New Partner was Successfully Save');
        }

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

        return view('partner.edit')->with([
            'partners' => $editPartner,
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

        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->organization = $request->input('partnerOrganization');
        $partner->designation = $request->input('partnerDesignation');
        $partner->suffix_name = $request->input('suffixName');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('date_of_birth'); 
        $partner->is_active = $request->input('is_active');
        $partner->sites = $request->input('sites');
        $partner->status = $request->input('status');

        $partner->save();

        Session::flash('success','New Partner was Successfully Updated');

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

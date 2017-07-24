<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $designation = $request->input('partnerDesignation');
        $organization = $request->input('partnerOrganization');

        $getsites = Partner::when($designation,function($query) use ($designation){
                                return $query->where('designation',$designation);
                            })
                            ->when($organization,function($query) use ($organization){
                                return $query->where('organization','=',$organization);
                            })
                            ->when($designation && $organization,function($query) use ($designation,$organization){
                                return $query->where('designation','=',$designation)->where('organization','=',$organization);
                            })
                            ->get();

        $count = 1;
        //$data = count($getsites);                    
        return view('summary.index')->with([ 
                            'summary' => $getsites, 
                            //'count' => $data,
                            'count2' => $count
                            ]);

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
        //
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

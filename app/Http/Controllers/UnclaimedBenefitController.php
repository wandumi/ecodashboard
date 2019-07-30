<?php

namespace App\Http\Controllers;

use App\unclaimedBenefit;
use Illuminate\Http\Request;

class UnclaimedBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unclaimed = unclaimedBenefit::all();

        return view('admin.unclaimed.index', compact('unclaimed') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unclaimed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'industry_number'    => 'required',
            'id_number'          => 'required',
            'current_employer'   => 'required',
            'previous_employer'  => 'required',
            'contact_number'     => 'required',
            'hear'               => 'required',
            'status'             => 'required',
            'first_name'         => 'required',
            'maiden_name'        => 'required',
            'surname'            => 'required',
            'email_address'      => 'required',
            'date_birth'         => 'required',
            'country'            => 'required',
            'address'            => 'required',
        ]);

        unclaimedBenefit::create($data);

        // $unclaimed = new unclaimedBenefit();
        // $unclaimed->industry_number = request('industry_number');
        // $unclaimed->id_number = request('id_number');
        // $unclaimed->current_employer = request('current_employer');
        // $unclaimed->previous_employer = request('previous_employer');
        // $unclaimed->contact_number = request('contact_number');
        // $unclaimed->hear = request('hear');
        // $unclaimed->status = request('status');
        // $unclaimed->first_name = request('first_name');
        // $unclaimed->maiden_name = request('maiden_name');
        // $unclaimed->surname = request('surname');
        // $unclaimed->email_address = request('email_address');
        // $unclaimed->date_birth = request('date_birth');
        // $unclaimed->country = request('country');
        // $unclaimed->address = request('address');
        // $unclaimed->save();

        return redirect('unclaimed')->with('message','Thank you for your message...');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\unclaimedBenefit  $unclaimedBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(unclaimedBenefit $unclaimedBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\unclaimedBenefit  $unclaimedBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(unclaimedBenefit $unclaimedBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\unclaimedBenefit  $unclaimedBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unclaimedBenefit $unclaimedBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\unclaimedBenefit  $unclaimedBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(unclaimedBenefit $unclaimedBenefit)
    {
        $unclaimedBenefit->delete();

        return redirect('unclaimed');
    }
}

<?php

namespace App\Http\Controllers;

use App\partemployer;
use Illuminate\Http\Request;

class PartemployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $partemployer = partemployer::paginate(18);

        return view('admin.partemployer.index');
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
     * @param  \App\partemployer  $partemployer
     * @return \Illuminate\Http\Response
     */
    public function show(partemployer $partemployer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\partemployer  $partemployer
     * @return \Illuminate\Http\Response
     */
    public function edit(partemployer $partemployer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\partemployer  $partemployer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partemployer $partemployer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\partemployer  $partemployer
     * @return \Illuminate\Http\Response
     */
    public function destroy(partemployer $partemployer)
    {
        $webusers->delete();

        return redirect('partemployer')->with('error','One Part Employer has been Deleted Successfully');
    }
}

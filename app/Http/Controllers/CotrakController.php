<?php

namespace App\Http\Controllers;

use App\cotrak;
use Illuminate\Http\Request;

class CotrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cotrak.index');
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
     * @param  \App\cotrak  $cotrak
     * @return \Illuminate\Http\Response
     */
    public function show(cotrak $cotrak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotrak  $cotrak
     * @return \Illuminate\Http\Response
     */
    public function edit(cotrak $cotrak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotrak  $cotrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cotrak $cotrak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotrak  $cotrak
     * @return \Illuminate\Http\Response
     */
    public function destroy(cotrak $cotrak)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\webuser;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class WebuserController extends Controller
{
    protected $tasks;
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.webusers.index');
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
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function show(webuser $webuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function edit(webuser $webuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, webuser $webuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\webuser  $webuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(webuser $webuser)
    {
        $webuser->delete();

        return redirect('webusers')->with('error','One Web User has been Deleted Successfully');
    }
}

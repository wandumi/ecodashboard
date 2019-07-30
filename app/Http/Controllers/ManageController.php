<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Gate;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isSuperadmin')){
            abort(404,"Sorry, You can not access this Page");
        }

        $users = user::all();
        return view('admin.users.index', compact('users'));
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
        // return request()->all();
        $data = request()->validate([
            'name'     => 'required|string|min:3|max:191',
            'email'    => 'required|string|email|max:191|unique:users',
            'type'     => 'required',
            'password' => 'required|string|confirmed|min:6|max:20'
        ]);

        // user::create($data);
        $user = new user();
        $user->name = request('name');
        $user->email = request('email');
        $user->type = request('type');
        $user->password = Hash::make(request('password'));

        $user->save();

        return redirect('users')->with('message', 'New user has been added Successfully');

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
        $manage = User::findorFail($id);


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
        $user = User::findorFail($id);
        $user->delete();

        return redirect('users')->with('error','One user has been Deleted Successfully');
    }
}

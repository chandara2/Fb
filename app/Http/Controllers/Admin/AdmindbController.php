<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdmindbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function job()
    {
        return view('admin.job');
    }
    public function user()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
    public function createnewuser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ], [
            'username.required' => 'Please fill in username',
            'password.required' => 'Please fill in password'
        ]);

        Auth::login($user = User::create([
            'fname' => $request->fname,
            'gname' => $request->gname,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'gid' => $request->gid,
        ]));
        return back();
    }
    public function usergetid($id)
    {
        $userid = User::find($id);
        return response()->json($userid);
    }
}

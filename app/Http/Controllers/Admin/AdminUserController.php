<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usergroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get group member to show in select option in admin user_create brade
        $usergroups = Usergroup::orderBy('name', 'desc')->get();
        return view('admin.user_create', compact('usergroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ], [
            'username.required' => 'Please fill in username',
            'password.required' => 'Please fill in password'
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'gname' => $request->gname,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'gid' => $request->gid,
        ]);
        return redirect(route('admin.user.index'));
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
        $usergroups = Usergroup::all();
        $userid = User::find($id);
        return view('admin.user_edit', [
            'userid' => $userid,
            'usergroups' => $usergroups,
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
        //validation rules

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = Auth::user();
        $user->username = $request['username'];
        $user->password = $request['password'];
        $user->save();

        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('userdelete', 'You have create a user');
    }
}

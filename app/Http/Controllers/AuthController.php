<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    public function showregister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ], [
            'username.required' => 'Please fill in username',
            'password.required' => 'Please fill in password'
        ]);
        $user = new User();
        $user->fname = $request->fname;
        $user->gname = $request->gname;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->gid = $request->gid;
        $user->save();
        return view('app');
    }
    public function showlogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'gid' => 'required',
        ], [
            'username.required' => 'Please fill in username',
            'password.required' => 'Please fill in password',
            'gid.required' => 'Please choose the right member'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->gid == 1) {

                return redirect()->intended('admindb');
            } elseif ($request->gid == 2) {

                return redirect()->intended('agencydb');
            } else {

                return redirect()->intended('userdb');
            }
        }

        return back()->withErrors([
            'errmsg' => 'Invalid username and password.',
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('showlogin')->with('success', 'logout');
    }
}

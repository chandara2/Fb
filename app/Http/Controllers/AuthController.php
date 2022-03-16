<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usergroup;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
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

    public function showlogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Please fill in username',
            'password.required' => 'Please fill in password',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'visible' => 1])) {
            $request->session()->regenerate();

            if (auth()->user()->gid == 1) {
                return redirect()->intended('admin/dashboard');
            } elseif (auth()->user()->gid == 2) {
                return redirect()->intended('supervisor/dashboard');
            } else {
                return redirect()->intended('user/dashboard');
            }
        } else {
            return back()->withErrors([
                'errmsg' => 'Invalid username and password.',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'logout');
    }
}

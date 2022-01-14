<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
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

        Auth::login($user = User::create([
            'fname' => $request->fname,
            'gname' => $request->gname,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'gid' => $request->gid,
        ]));

        if ($request->gid == 2) {
            return view('agency.dashboard');
        } else {
            return view('user.dashboard');
        }
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
                return redirect()->intended('admin/dashboard');
            } elseif ($request->gid == 2) {
                return redirect()->intended('agency/dashboard');
            } else {
                return redirect()->intended('user/dashboard');
            }
        }

        return back()->withErrors([
            'errmsg' => 'Invalid username and password.',
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'logout');
    }
    public function changepassword(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'opassword' => 'required',
            'cpassword' => 'required',
            'vpassword' => 'required|same:cpassword'
        ], [
            'username' => 'Please fill in username',
            'opassword.required' => 'Please fill in Password',
            'cpassword.required' => 'New password and Verify password is not match.',
        ]);
        $user = User::where('username', '=', $request->username)->first();
        if ($user) {
            if (!Hash::check($request->opassword, $user->password)) {
                $request->validate([
                    'opassword' => 'confirmed'
                ], [
                    'opassword.confirmed' => 'Current Password is not correct.'
                ]);
            } else { //update password
                $user->password = $request->cpassword;
                $user->save();
            }
        }
        return back();
    }
}

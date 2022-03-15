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

    public function showregister()
    {
        // Get group member to show in select option in register brade
        $usergroups = Usergroup::orderBy('name', 'desc')->where('name', '<>', 'Admin')->get();
        return view('auth.register', compact('usergroups'));
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => 'required|same:password',
        ], [
            'username.required' => 'Please fill in username',
            'username.unique' => 'This username already exists',
            'password.required' => 'Please fill in password',
            'password.min' => 'Passwords must be at least 6 characters',
            'password_confirmation.required' => 'Please fill in confirm password',
            'password_confirmation.same' => 'Password and confirm password does not match',
        ]);

        Auth::login($user = User::create([
            'fname' => $request->fname,
            'gname' => $request->gname,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'gid' => $request->group_member,
        ]));

        if ($request->group_member == 2) {
            return redirect(route('supervisor.dashboard'));
        } else {
            return redirect(route('user.dashboard'));
        }
    }
    public function showlogin()
    {
        // Get group member to show in select option in login brade
        $usergroups = Usergroup::orderBy('name', 'desc')->get();
        return view('auth.login', [
            'usergroups' => $usergroups,
        ]);
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
            'gid.required' => 'Please choose the right member',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'gid' => $request->gid, 'visible' => 1])) {
            $request->session()->regenerate();

            if ($request->gid == 1) {
                return redirect()->intended('admin/dashboard');
            } elseif ($request->gid == 2) {
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

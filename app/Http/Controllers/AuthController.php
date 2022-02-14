<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\User;
use App\Models\Usergroup;
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
            return redirect(route('agency.dashboard'));
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
                return redirect()->intended('agency/dashboard');
            } else {
                return redirect()->intended('user/dashboard');
            }
        }
        // elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'gid' => $request->gid, 'visible' => 0])){
        //     return back()->withErrors([
        //         'inactivemsg' => 'This user has been inactive',
        //     ]);
        // }
        else{
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
    public function changepassword(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'opassword' => 'required',
        //     'cpassword' => 'required',
        //     'vpassword' => 'required|same:cpassword'
        // ], [
        //     'username' => 'Please fill in username',
        //     'opassword.required' => 'Please fill in Password',
        //     'cpassword.required' => 'New password and Verify password is not match.',
        // ]);
        // $user = User::where('username', '=', $request->username)->first();
        // if ($user) {
        //     if (!Hash::check($request->opassword, $user->password)) {
        //         $request->validate([
        //             'opassword' => 'confirmed'
        //         ], [
        //             'opassword.confirmed' => 'Current Password is not correct.'
        //         ]);
        //     } else {
        //         $user->password = $request->cpassword;
        //         $user->save();
        //     }
        // }
        // return back();

        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if(!\Hash::check($value, Auth::user()->password)){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:6',
                'max:30'
            ],
            'newpassword'=>'required|min:6|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter your current password',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must be atleast 6 characters',
            'newpassword.max'=>'New password must not be greater than 30 characters',
            'cnewpassword.required'=>'ReEnter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);
            if(!$update){
                return response()->json(['status'=>0, 'msg'=>'Something went wrong, Failed to update password in db']);
            }else{
                return response()->json(['status'=>1, 'msg'=>'Your password has change successfully']);
            }
        }
    }

    public function test1234()
    {
        $this->middleware('auth');
    }
}

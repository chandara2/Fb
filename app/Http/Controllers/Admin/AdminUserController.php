<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usergroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

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
        $usergroups = Usergroup::orderBy('name', 'desc')->get();
        return view('admin.user',[
            'users'=>$users,    
            'usergroups'=>$usergroups,
        ]);
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
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $users = new User();
            $users->fname = $request->fname;
            $users->gname = $request->gname;
            $users->username = $request->username;
            $users->phone = $request->phone;
            $users->password = Hash::make($request->password);
            $users->gid = $request->gid;
            
            $users->save();
            return response()->json(['status' => 1, 'msg' => 'Job announcement create successfully']);
        }
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
            'username' => ['required', Rule::unique('users')->ignore($id)],
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

        $user = User::find($id);
        $user->fname = $request->fname;
        $user->gname = $request->gname;
        $user->username = $request->username;
        $user->phone = $request->phone;
        if ($request->password != "********") {
            $user->password = Hash::make($request->password);
        }
        $user->gid = $request->gid;
        $user->visible = $request->boolean('visible');
        $user->update();

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
        return back()->with('userdelete', 'You have delete a user');
    }
}

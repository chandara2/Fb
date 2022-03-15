<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile');
    }

    public function profilefetch()
    {
        $users = User::where('username', auth()->user()->username)->get();
        $output = '';
        $output .= '<div class="row justify-content-center"><div class="col-lg-4 shadow">';
        foreach ($users as $user) {
            $output .= '<i class="bx bx-user-circle h1"></i>
                    <p>' . $user->fname . '</p>
                    <p>' . $user->gname . '</p>
                    <p>' . $user->username . '</p>
                    <p>' . $user->phone . '</p>
                    <a href="#" id="' . $user->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editProfileModal"><i class="bx bxs-edit h4"></i></a>';
        }
        $output .= '</div></div>';
        echo $output;
    }

    public function profileedit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return response()->json($user);
    }

    public function profileupdate(Request $request)
    {
        $user = User::find($request->user_id);
        $validator = Validator::make($request->all(), [
            'username' => ['required', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'username.required' => 'Please fill in username',
            'username.unique' => 'This username already exists',
            'password.required' => 'Please fill in password',
            'password.min' => 'Passwords must be at least 6 characters',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if ($request->password != "********") {
                $user->password = Hash::make($request->password);
            }
            $password = $user->password;
            $userData = [
                'fname' => $request->fname,
                'gname' => $request->gname,
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => $password,
            ];
            $user->update($userData);
            return response()->json([
                'status' => 200,
            ]);
        }
    }
}

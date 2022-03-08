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
        $users = User::orderBy('created_at', 'desc')->get();
        $usergroups = Usergroup::orderBy('name', 'desc')->get();
        return view('admin.user', [
            'users' => $users,
            'usergroups' => $usergroups,
        ]);
    }

    public function userfetch()
    {
        $users = DB::table('users')->join('usergroups', 'usergroups.id', 'users.gid')->select('users.*', 'usergroups.name as usergroup')->get();
        $output = '';
        if ($users->count() > 0) {
            $output .= '<table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($users as $i => $user) {
                $output .= '<tr>
                    <td>' . $i + 1 . '</td>
                    <td>' . $user->fname . ' ' . $user->gname . '</td>
                    <td>' . $user->username . '</td>
                    <td>' . $user->phone . '</td>
                    <td>' . $user->usergroup . '</td>
                    <td>
                        <a href="#" id="' . $user->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi-pencil-square h4"></i></a>

                        <button value="' . $user->gid . '" id="' . $user->id . '" class="btn px-0 shadow-none text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></button>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

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
            return response()->json(['status' => 1, 'msg' => 'User create successfully']);
        }
    }

    public function useredit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return response()->json($user);
    }

    public function userupdate(Request $request)
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
                'gid' => $request->gid,
            ];
            $user->update($userData);
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function userdelete(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->destroy($id);
    }
}

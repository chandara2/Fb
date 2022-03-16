<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SupervisorUserController extends Controller
{
    public function index()
    {
        return view('supervisor.user');
    }

    public function userfetch()
    {
        $users = User::where('id', auth()->user()->id)->get();
        $output = '';
        if ($users->count() > 0) {
            $output .= '<div class="row justify-content-center text-center">';
            foreach ($users as $user) {

                $output .= '<div class="col-lg-4 shadow">
                    <i class="bx bx-user-circle display-1"></i>
                    <p class="fw-bold text-uppercase">Supervisor</p>
                    <p>Family name: ' . $user->fname . '</p>
                    <p>Given name: ' . $user->gname . '</p>
                    <p>Username: ' . $user->username . '</p>
                    <p>Phone: ' . $user->phone . '</p>
                    <p>
                        <a href="#" id="' . $user->id . '" class="btn btn-success btn-sm mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>
                    </p>
                </div>';
            }
            $output .= '</div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
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
            ];
            $user->update($userData);
            return response()->json([
                'status' => 200,
            ]);
        }
    }
}

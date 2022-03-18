<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\User;
use App\Models\Status;
use App\Models\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use WisdomDiala\Countrypkg\Models\Country;

class SupervisorFbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get('username')->where('username', auth()->user()->username);
        $statuses = Status::get('status');
        $countrys = Country::get('name');
        return view('supervisor.fb', [
            'users' => $users,
            'statuses' => $statuses,
            'countrys' => $countrys,
        ]);
    }

    public function fbfetch()
    {
        $fbs = DB::table('users')
            ->join('facebooks', 'facebooks.uid', 'users.id')
            ->join('usergroups', 'usergroups.id', 'users.gid')
            ->select('facebooks.*')
            ->where('users.gid', '<>', '1')
            ->get();
        $output = '';
        if ($fbs->count() > 0) {

            $output .= '<table class="table table-striped table-sm table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Creator</th>
                    <th>Status</th>
                    <th>Facebook ID</th>
                    <th>Facebook Password</th>
                    <th>Country</th>
                    <th>Boost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($fbs as $i => $fb) {

                $output .= '<tr>
                    <td>' . $i + 1 . '</td>
                    <td>' . $fb->date . '</td>
                    <td>' . $fb->create_by . '</td>
                    <td>' . $fb->status . '</td>
                    <td>' . $fb->fb_id . '</td>
                    <td>' . $fb->fb_pw . '</td>
                    <td>' . $fb->country . '</td>
                    <td>' . $fb->boost_date . '</td>
                    <td>
                        <a href="#" id="' . $fb->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editFbModal"><i class="bx bxs-edit h4"></i></a>

                        <a href="#" id="' . $fb->id . '" class="text-danger mx-1 deleteIcon"><i class="bx bx-trash h4"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Creator</th>
                    <th>Status</th>
                    <th>Facebook ID</th>
                    <th>Facebook Password</th>
                    <th>Country</th>
                    <th>Boost</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            </table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
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
            'fb_id' => 'required',
            'fb_pw' => 'required',
        ], [
            'fb_id.required' => 'Please fill in Facebook id',
            'fb_pw.required' => 'Please fill in Facebook password',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fbs = new Facebook();
            $fbs->uid = Auth::user()->id;
            $fbs->date = $request->date;
            $fbs->create_by = auth()->user()->username;
            $fbs->status = $request->status;
            $fbs->fname = $request->fname;
            $fbs->sname = $request->sname;
            $fbs->email = $request->email;
            $fbs->email_pw = $request->email_pw;
            $fbs->fb_id = $request->fb_id;
            $fbs->fb_pw = $request->fb_pw;
            $fbs->twofa = $request->twofa;
            $fbs->friends = $request->friends;
            $fbs->country = $request->country;
            $fbs->visa = $request->visa;
            $fbs->visa_date = $request->visa_date;
            $fbs->boost_by = $request->boost_by;
            $fbs->boost_date = $request->boost_date;

            $fbs->save();
            return response()->json(['status' => 1, 'msg' => 'User create successfully']);
        }
    }

    public function fbedit(Request $request)
    {
        $id = $request->id;
        $fb = Facebook::find($id);
        return response()->json($fb);
    }

    public function fbupdate(Request $request)
    {
        $fb = Facebook::find($request->facebook_id);

        $validator = Validator::make($request->all(), [
            'fb_id' => 'required',
            'fb_pw' => 'required',
        ], [
            'fb_id.required' => 'Please fill in Facebook id',
            'fb_pw.required' => 'Please fill in Facebook password',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $fb->date = $request->date;
            $fb->status = $request->status;
            $fb->fname = $request->fname;
            $fb->sname = $request->sname;
            $fb->email = $request->email;
            $fb->email_pw = $request->email_pw;
            $fb->fb_id = $request->fb_id;
            $fb->fb_pw = $request->fb_pw;
            $fb->twofa = $request->twofa;
            $fb->friends = $request->friends;
            $fb->country = $request->country;
            $fb->visa = $request->visa;
            $fb->visa_date = $request->visa_date;
            $fb->boost_by = $request->boost_by;
            $fb->boost_date = $request->boost_date;

            $fb->update();
            return response()->json([
                'status' => 200,
            ]);
        }
    }


    public function fbdelete(Request $request)
    {
        $id = $request->id;
        $fb = Facebook::find($id);
        $fb->destroy($id);
    }
}

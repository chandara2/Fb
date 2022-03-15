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
        $users = User::where('gid', '<>', '1')->get();
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
        // $fbs = Facebook::all()->where('create_by', Auth::user()->username);
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
                    <th>Email</th>
                    <th>Friends</th>
                    <th>Country</th>
                    <th>Visa</th>
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
                    <td>' . $fb->email . '</td>
                    <td>' . $fb->friends . '</td>
                    <td>' . $fb->country . '</td>
                    <td>' . $fb->visa . '</td>
                    <td>' . $fb->boost_date . '|' . $fb->boost_by . '</td>
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
                    <th>Email</th>
                    <th>Friends</th>
                    <th>Country</th>
                    <th>Visa</th>
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
            'date' => 'required',
            'create_by' => 'required',
            'status' => 'required',
            'fname' => 'required',
            'sname' => 'required',
            'email' => 'required',
            'email_pw' => 'required',
            'fb_id' => 'required',
            'fb_pw' => 'required',
            'twofa' => 'required',
            // 'friends' => 'required',
            'country' => 'required',
            'visa' => 'required',
            'visa_date' => 'required',
            // 'boost_by' => 'required',
            // 'boost_date' => 'required',
        ], [
            'date.required' => 'Please fill in date',
            'create_by.required' => 'Please fill in creator',
            'status.required' => 'Please fill in status',
            'fname.required' => 'Please fill in first name',
            'sname.required' => 'Please fill in surname',
            'email.required' => 'Please fill in email',
            'email_pw.required' => 'Please fill in email password',
            'fb_id.required' => 'Please fill in Facebook id',
            'fb_pw.required' => 'Please fill in Facebook password',
            'twofa.required' => 'Please fill in 2FA',
            // 'friends.required' => 'Please fill in friends',
            'country.required' => 'Please fill in country',
            'visa.required' => 'Please fill in Visa',
            'visa_date.required' => 'Please fill in Visa date',
            // 'boost_by.required' => 'Please fill in boost by',
            // 'boost_date.required' => 'Please fill in boost date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fbs = new Facebook();
            $fbs->uid = Auth::user()->id;
            $fbs->date = $request->date;
            $fbs->create_by = $request->create_by;
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
            'date' => 'required',
            'create_by' => 'required',
            'status' => 'required',
            'fname' => 'required',
            'sname' => 'required',
            'email' => 'required',
            'email_pw' => 'required',
            'fb_id' => 'required',
            'fb_pw' => 'required',
            'twofa' => 'required',
            // 'friends' => 'required',
            'country' => 'required',
            'visa' => 'required',
            'visa_date' => 'required',
            // 'boost_by' => 'required',
            // 'boost_date' => 'required',
        ], [
            'date.required' => 'Please fill in date',
            'create_by.required' => 'Please fill in creator',
            'status.required' => 'Please fill in status',
            'fname.required' => 'Please fill in first name',
            'sname.required' => 'Please fill in surname',
            'email.required' => 'Please fill in email',
            'email_pw.required' => 'Please fill in email password',
            'fb_id.required' => 'Please fill in Facebook id',
            'fb_pw.required' => 'Please fill in Facebook password',
            'twofa.required' => 'Please fill in 2FA',
            // 'friends.required' => 'Please fill in friends',
            'country.required' => 'Please fill in country',
            'visa.required' => 'Please fill in Visa',
            'visa_date.required' => 'Please fill in Visa date',
            // 'boost_by.required' => 'Please fill in boost by',
            // 'boost_date.required' => 'Please fill in boost date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $fb->date = $request->date;
            $fb->create_by = $request->create_by;
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

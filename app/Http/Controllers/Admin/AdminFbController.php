<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Status;
use App\Models\Facebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use WisdomDiala\Countrypkg\Models\Country;

class AdminFbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fbs = Facebook::all();
        $users = User::get('username');
        $statuses = Status::get('status');
        $countrys = Country::get('name');
        return view('admin.fb', [
            'fbs' => $fbs,
            'users' => $users,
            'statuses' => $statuses,
            'countrys' => $countrys,
        ]);
    }

    public function fbfetch()
    {
        $fbs = Facebook::all();
        $output = '';
        if ($fbs->count() > 0) {
            $output .= '<table class="table table-striped table-sm table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Creator</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>FB ID</th>
                    <th>2FA</th>
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
                    <td>' . $fb->fname . ' ' . $fb->gname . '</td>
                    <td>' . $fb->email . '</td>
                    <td>' . $fb->fb_id . '</td>
                    <td>' . $fb->twofa . '</td>
                    <td>' . $fb->friends . '</td>
                    <td>' . $fb->country . '</td>
                    <td>' . $fb->visa . '</td>
                    <td>' . $fb->boost_date . ' (' . $fb->boost_by . ')</td>
                    <td>
                        <a href="#" id="' . $fb->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editFbModal"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="' . $fb->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
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
            'gname' => 'required',
            'email' => 'required',
            'email_pw' => 'required',
            'fb_id' => 'required',
            'fb_pw' => 'required',
            'twofa' => 'required',
            'friends' => 'required',
            'country' => 'required',
            'visa' => 'required',
            'visa_date' => 'required',
            'boost_by' => 'required',
            'boost_date' => 'required',
        ], [
            'date.required' => 'Please fill in date',
            'create_by.required' => 'Please fill in create_by',
            'status.required' => 'Please fill in status',
            'fname.required' => 'Please fill in fname',
            'gname.required' => 'Please fill in gname',
            'email.required' => 'Please fill in email',
            'email_pw.required' => 'Please fill in email_pw',
            'fb_id.required' => 'Please fill in fb_id',
            'fb_pw.required' => 'Please fill in fb_pw',
            'twofa.required' => 'Please fill in twofa',
            'friends.required' => 'Please fill in friends',
            'country.required' => 'Please fill in country',
            'visa.required' => 'Please fill in visa',
            'visa_date.required' => 'Please fill in visa_date',
            'boost_by.required' => 'Please fill in boost_by',
            'boost_date.required' => 'Please fill in boost_date',
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
            $fbs->gname = $request->gname;
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
            'gname' => 'required',
            'email' => 'required',
            'email_pw' => 'required',
            'fb_id' => 'required',
            'fb_pw' => 'required',
            'twofa' => 'required',
            'friends' => 'required',
            'country' => 'required',
            'visa' => 'required',
            'visa_date' => 'required',
            'boost_by' => 'required',
            'boost_date' => 'required',
        ], [
            'date.required' => 'Please fill in date',
            'create_by.required' => 'Please fill in create_by',
            'status.required' => 'Please fill in status',
            'fname.required' => 'Please fill in fname',
            'gname.required' => 'Please fill in gname',
            'email.required' => 'Please fill in email',
            'email_pw.required' => 'Please fill in email_pw',
            'fb_id.required' => 'Please fill in fb_id',
            'fb_pw.required' => 'Please fill in fb_pw',
            'twofa.required' => 'Please fill in twofa',
            'friends.required' => 'Please fill in friends',
            'country.required' => 'Please fill in country',
            'visa.required' => 'Please fill in visa',
            'visa_date.required' => 'Please fill in visa_date',
            'boost_by.required' => 'Please fill in boost_by',
            'boost_date.required' => 'Please fill in boost_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $fb->date = $request->date;
            $fb->create_by = $request->create_by;
            $fb->status = $request->status;
            $fb->fname = $request->fname;
            $fb->gname = $request->gname;
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

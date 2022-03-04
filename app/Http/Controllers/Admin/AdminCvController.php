<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminCvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = Cv::all();
        return view('admin.cv',[
            'cvs'=>$cvs,
        ]);
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
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position_apply' => 'required',
            'expected_salary' => 'required',
            'kname' => 'required',
            'ename' => 'required',
            'village' => 'required',
            'commune' => 'required',
            'district' => 'required',
            'province' => 'required',
            'country' => 'required',
            'dob' => 'required',
            'sex' => 'required',
            'kphone' => 'required',
            'marital_status' => 'required',
    
        ], [
            'photo.required' => 'Please upload your company photo',
            'position_apply.required' => 'Please fill in position apply',
            'expected_salary.required' => 'Please fill in expected salary',
            'kname.required' => 'Please fill in Khmer name',
            'ename.required' => 'Please fill in English name',
            'village.required' => 'Please fill in village',
            'commune.required' => 'Please fill in commune',
            'district.required' => 'Please fill in district',
            'province.required' => 'Please fill in province',
            'country.required' => 'Please fill in country',
            'dob.required' => 'Please fill in date of birht',
            'sex.required' => 'Please fill in gender',
            'kphone.required' => 'Please fill in phone',
            'marital_status.required' => 'Please fill in status',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $cvprofile = new Cv();
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/cvprofile/', $filename);
                $cvprofile->photo = $filename;
            }

            $cvs = new Cv();
            $cvs->uid = Auth::user()->id;
            $cvs->photo = $filename;
            $cvs->position_apply = $request->position_apply;
            $cvs->expected_salary = $request->expected_salary;
            $cvs->kname = $request->kname;
            $cvs->ename = $request->ename;
            $cvs->nname = $request->nname;
            $cvs->house_no = $request->house_no;
            $cvs->streat_no = $request->streat_no;
            $cvs->group_no = $request->group_no;
            $cvs->village = $request->village;
            $cvs->commune = $request->commune;
            $cvs->district = $request->district;
            $cvs->province = $request->province;
            $cvs->country = $request->country;
            $cvs->dob = $request->dob;
            $cvs->sex = $request->sex;
            $cvs->email = $request->email;
            $cvs->kphone = $request->kphone;
            $cvs->country_code = $request->country_code;
            $cvs->passport = $request->passport;
            $cvs->id_card = $request->id_card;
            $cvs->height = $request->height;
            $cvs->weight = $request->weight;
            $cvs->nationality = $request->nationality;
            $cvs->marital_status = $request->marital_status;
            $cvs->education_background = $request->education_background;
            $cvs->employment_history = $request->employment_history;
            $cvs->language = $request->language;
            $cvs->family = $request->family;
            $cvs->computer = $request->computer;
            $cvs->emergency = $request->emergency;
            $cvs->relationship = $request->relationship;
            $cvs->save();
            return response()->json(['status' => 1, 'msg' => 'Company create successfully']);
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
        $cvs = DB::table('cvs')
            ->where('cvs.id', $id)
            ->select('cvs.*')
            ->get();

        return view('admin.cv_show', [
            'cvs' => $cvs,
        ]);
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
        $cvs = Cv::find($id);

        $image_path = 'upload/cvprofile/' . $cvs->photo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $cvs->delete();
        return back()->with('companyDelete', 'You have delete a company');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\JobIndustry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminCompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyinfos = CompanyInfo::all();
        $job_industrys = JobIndustry::get();
        return view('admin.companyinfo', [
            'companyinfos' => $companyinfos,
            'job_industrys' => $job_industrys,
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company' => 'required',
            'number_staff' => 'required',
            'industry' => 'required',
            'website' => 'required',
            'province' => 'required',
            'detail_location' => 'required',
            'contact_name' => 'required',
            'contact_position' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'company_profile' => 'required',
        ], [
            'logo.required' => 'Please upload your company logo',
            'company.required' => 'Please fill in company name',
            'number_staff.required' => 'Please fill in number of staff',
            'industry.required' => 'Please fill in industry',
            'website.required' => 'Please fill in website',
            'province.required' => 'Please fill in province',
            'detail_location.required' => 'Please fill in detail location',
            'contact_name.required' => 'Please fill in contact name',
            'contact_position.required' => 'Please fill in contact position',
            'contact_email.required' => 'Please fill in contact email',
            'contact_phone.required' => 'Please fill in contact phone',
            'company_profile.required' => 'Please fill in company profile',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $companylogo = new CompanyInfo();
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/companylogo/', $filename);
                $companylogo->logo = $filename;
            }

            $companys = new CompanyInfo();
            $companys->uid = Auth::user()->id;
            $companys->logo = $filename;
            $companys->company = $request->company;
            $companys->number_staff = $request->number_staff;
            $companys->industry = $request->industry;
            $companys->website = $request->website;
            $companys->province = $request->province;
            $companys->detail_location = $request->detail_location;
            $companys->contact_name = $request->contact_name;
            $companys->contact_position = $request->contact_position;
            $companys->contact_email = $request->contact_email;
            $companys->contact_phone = $request->contact_phone;
            $companys->company_profile = $request->company_profile;
            $companys->save();
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
        $companyinfos = CompanyInfo::find($id);
        return view('admin.companyinfo_edit', [
            'companyinfos' => $companyinfos,
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
        $request->validate([
            'company' => 'required',
            'number_staff' => 'required',
            'industry' => 'required',
            'website' => 'required',
            'province' => 'required',
            'detail_location' => 'required',
            'contact_name' => 'required',
            'contact_position' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'company_profile' => 'required',
        ], [
            'company.required' => 'Please fill in company name',
            'number_staff.required' => 'Please fill in number of staff',
            'industry.required' => 'Please fill in industry',
            'website.required' => 'Please fill in website',
            'province.required' => 'Please fill in province',
            'detail_location.required' => 'Please fill in detail location',
            'contact_name.required' => 'Please fill in contact name',
            'contact_position.required' => 'Please fill in contact position',
            'contact_email.required' => 'Please fill in contact email',
            'contact_phone.required' => 'Please fill in contact phone',
            'company_profile.required' => 'Please fill in company profile',
        ]);

        $companyinfo = CompanyInfo::find($id);
        // $companyinfo->uid = Auth::user()->id;
        $companyinfo->company = $request->company;
        $companyinfo->number_staff = $request->number_staff;
        $companyinfo->industry = $request->industry;
        $companyinfo->website = $request->website;
        $companyinfo->province = $request->province;
        $companyinfo->detail_location = $request->detail_location;
        $companyinfo->contact_name = $request->contact_name;
        $companyinfo->contact_position = $request->contact_position;
        $companyinfo->contact_email = $request->contact_email;
        $companyinfo->contact_phone = $request->contact_phone;
        $companyinfo->company_profile = $request->company_profile;

        if ($request->hasFile('logo')) {
            $path = 'upload/companylogo/' . $companyinfo->logo;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/companylogo/', $filename);
            $companyinfo->logo = $filename;
        }

        $companyinfo->update();

        return redirect(route('admin.companyinfo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companys = CompanyInfo::find($id);

        $image_path = 'upload/companylogo/' . $companys->logo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $companys->delete();
        return back()->with('companyDelete', 'You have delete a company');
    }
}

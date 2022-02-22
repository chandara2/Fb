<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Job;
use App\Models\JobFunction;
use App\Models\JobIndustry;
use App\Models\JobLocation;
use App\Models\JobSalary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delete_expired_post = Job::where('expired_post', '<', Carbon::now()->toDateString())->delete();

        $jobs = DB::table('jobs')
        ->join('company_infos', 'company_infos.id', 'jobs.company_id')
        ->orderBy('approved', 'asc')->get();
        $company_infos = CompanyInfo::orderBy('company', 'asc')->get();
        $job_functions = JobFunction::all();
        $job_industries = JobIndustry::all();
        $job_locations = JobLocation::all();
        $job_salaries = JobSalary::all();
        return view('admin.job', [
            'jobs' => $jobs,
            'company_infos' => $company_infos,
            'job_functions' => $job_functions,
            'job_industries' => $job_industries,
            'job_locations' => $job_locations,
            'job_salaries' => $job_salaries,
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
            'age' => 'required',
            'company_id' => 'required',
            'contact' => 'required',
            'detail' => 'required',
            'expired_job' => 'required|date',
            'expired_post' => 'required|date',
            'function' => 'required',
            'hiring' => 'required|numeric|min:0',
            'industry' => 'required',
            'language' => 'required',
            'location' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'title_ch' => 'required',
            'title_en' => 'required',
            'title_kh' => 'required',
            'title_th' => 'required',
            'year_of_exp' => 'required|numeric|min:0',
        ], [
            'age.required' => 'Age is required',
            'company_id.required' => 'Company is required',
            'contact.required' => 'Contact is required',
            'detail.required' => 'Detail is required',
            'expired_job.required' => 'Expired job is required',
            'expired_job.date' => 'Expired job should be a date',
            'expired_post.required' => 'Expired post is required',
            'expired_post.date' => 'Expired post should be a date',
            'function.required' => 'Function is required',
            'hiring.required' => 'Hiring is required',
            'hiring.numeric' => 'Hiring should be a number',
            'hiring.min' => 'Hiring should not be a negative number',
            'industry.required' => 'Industry is required',
            'language.required' => 'Language is required',
            'location.required' => 'Location is required',
            'qualification.required' => 'Qualification is required',
            'salary.required' => 'Job Salary is required',
            'sex.required' => 'Sex is required',
            'term.required' => 'Term is required',
            'title_ch.required' => 'Job Chinese Title is required',
            'title_en.required' => 'Job English Title is required',
            'title_kh.required' => 'Job Khmer Title is required',
            'title_th.required' => 'Job Thai Title is required',
            'year_of_exp.required' => 'Year of experience is required',
            'year_of_exp.numeric' => 'Year of experience should be a number',
            'year_of_exp.min' => 'Year of experience should not be a negative number',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $jobs = new Job();
            $jobs->uid = Auth::user()->id;
            $jobs->approved = true;
            $jobs->age = $request->age;
            $jobs->company_id = $request->company_id;
            $jobs->contact = $request->contact;
            $jobs->detail = $request->detail;
            $jobs->expired_job = $request->expired_job;
            $jobs->expired_post = $request->expired_post;
            $jobs->industry = $request->industry;
            $jobs->function = $request->function;
            $jobs->hiring = $request->hiring;
            $jobs->language = $request->language;
            $jobs->location = $request->location;
            $jobs->qualification = $request->qualification;
            $jobs->salary = $request->salary;
            $jobs->sex = $request->sex;
            $jobs->term = $request->term;
            $jobs->title_ch = $request->title_ch;
            $jobs->title_en = $request->title_en;
            $jobs->title_kh = $request->title_kh;
            $jobs->title_th = $request->title_th;
            $jobs->year_of_exp = $request->year_of_exp;
            $jobs->save();
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
        $jobid = Job::find($id);
        $job_functions = JobFunction::all();
        $job_industries = JobIndustry::all();
        $job_locations = JobLocation::all();
        $job_salaries = JobSalary::all();
        return view('admin.job_edit', [
            'jobid' => $jobid,
            'job_functions' => $job_functions,
            'job_industries' => $job_industries,
            'job_locations' => $job_locations,
            'job_salaries' => $job_salaries,
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
            'age' => 'required',
            'contact' => 'required',
            'detail' => 'required',
            'expired_job' => 'required|date',
            'expired_post' => 'required|date',
            'function' => 'required',
            'hiring' => 'required|numeric|min:0',
            'industry' => 'required',
            'language' => 'required',
            'location' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'title' => 'required',
            'year_of_exp' => 'required|numeric|min:0',
        ]);

        $job = Job::find($id);
        $job->age = $request->age;
        $job->contact = $request->contact;
        $job->detail = $request->detail;
        $job->expired_job = $request->expired_job;
        $job->expired_post = $request->expired_post;
        $job->function = $request->function;
        $job->hiring = $request->hiring;
        $job->industry = $request->industry;
        $job->language = $request->language;
        $job->location = $request->location;
        $job->qualification = $request->qualification;
        $job->salary = $request->salary;
        $job->sex = $request->sex;
        $job->term = $request->term;
        $job->title = $request->title;
        $job->year_of_exp = $request->year_of_exp;
        $job->update();

        return redirect(route('admin.job.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return back()->with('jobdelete', 'You have delete a job');
    }
    public function changejobstatus(Request $request)
    {
        $jobs = Job::find($request->id);
        $jobs->approved = $request->approved;
        $jobs->save();
        // return response()->json(['successStatusMsg' => 'Status has changed successfully']);
    }
}

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

        $jobs = Job::all();
        $company_infos = CompanyInfo::all();
        return view('admin.job', [
            'jobs' => $jobs,
            'company_infos' => $company_infos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_functions = JobFunction::all();
        $job_industries = JobIndustry::all();
        $job_locations = JobLocation::all();
        $job_salaries = JobSalary::all();
        return view('admin.job_create', [
            'job_functions' => $job_functions,
            'job_industries' => $job_industries,
            'job_locations' => $job_locations,
            'job_salaries' => $job_salaries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required',
            'contact' => 'required',
            'detail' => 'required',
            'expired_job' => 'required|date',
            'expired_post' => 'required|date',
            'function' => 'required',
            'hiring' => 'required|numeric',
            'industry' => 'required',
            'language' => 'required',
            'location' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'title' => 'required',
            'year_of_exp' => 'required|numeric|max:100',
        ]);

        $job = new Job();
        $job->uid = Auth::user()->id;
        $job->approved = true;
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
        $job->save();

        return redirect(route('admin.job.index'));
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
            // 'expired_post' => 'required|date|after:now',
            'expired_post' => 'required|date',
            'function' => 'required',
            'hiring' => 'required|numeric',
            'industry' => 'required',
            'language' => 'required',
            'location' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'title' => 'required',
            'year_of_exp' => 'required|numeric|max:100',
        ]);

        $job = Job::find($id);
        $job->age = $request->age;
        $job->approved = $request->approved;
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
        return back()->with('jobdelete', 'You have create a job');
    }
    public function changejobstatus(Request $request)
    {
        $jobs = Job::find($request->id);
        $jobs->approved = $request->approved;
        $jobs->save();
    }
}

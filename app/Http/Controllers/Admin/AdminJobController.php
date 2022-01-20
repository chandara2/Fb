<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Job;
use App\Models\JobFunction;
use App\Models\JobIndustry;
use App\Models\JobLocation;
use App\Models\JobSalary;
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
            'deadline' => 'required|date|after:now',
            'detail' => 'required',
            'hiring' => 'required|numeric',
            'job_title' => 'required',
            'language' => 'required',
            'qualification' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'year_of_exp' => 'required|numeric|max:100',
        ]);

        $user = new Job();
        $user->uid = Auth::user()->id;
        $user->age = $request->age;
        $user->contact = $request->contact;
        $user->deadline = $request->deadline;
        $user->detail = $request->detail;
        $user->hiring = $request->hiring;
        $user->industry = $request->job_industries;
        $user->job_function = $request->job_function;
        $user->job_title = $request->job_title;
        $user->language = $request->language;
        $user->location = $request->job_locations;
        $user->qualification = $request->qualification;
        $user->salary = $request->job_salary;
        $user->sex = $request->sex;
        $user->term = $request->term;
        $user->year_of_exp = $request->year_of_exp;
        $user->save();

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
            'deadline' => 'required|date|after:now',
            'detail' => 'required',
            'hiring' => 'required|numeric',
            'job_title' => 'required',
            'language' => 'required',
            'qualification' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'year_of_exp' => 'required|numeric|max:100',
        ]);

        $job = Job::find($id);
        $job->age = $request->age;
        $job->contact = $request->contact;
        $job->deadline = $request->deadline;
        $job->detail = $request->detail;
        $job->hiring = $request->hiring;
        $job->job_title = $request->job_title;
        $job->language = $request->language;
        $job->qualification = $request->qualification;
        $job->sex = $request->sex;
        $job->term = $request->term;
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
}

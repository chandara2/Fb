<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobFunction;
use App\Models\JobIndustry;
use App\Models\JobLocation;
use App\Models\JobSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgencyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all()->where('uid', '=', Auth::user()->id);
        return view('agency.job', [
            'jobs' => $jobs,
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
        return view('agency.job_create', [
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
        ],[
            'age.required' => 'Age is required',
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
            'salary.required' => 'Salary is required',
            'sex.required' => 'Sex is required',
            'term.required' => 'Term is required',
            'title.required' => 'Job Title is required',
            'year_of_exp.required' => 'Year of experience is required',
            'year_of_exp.numeric' => 'Year of experience should be a number',
            'year_of_exp.min' => 'Year of experience should not be a negative number',
        ]);

        $job = new Job();
        $job->uid = Auth::user()->id;
        $job->approved = false;
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

        return redirect(route('agency.job.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs = Job::find($id);
        $company_jobs = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.*', 'company_infos.*')
            ->where('jobs.id', $id)
            ->get();
        $hotjobs = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.id', 'jobs.created_at', 'jobs.job_title', 'jobs.salary', 'company_infos.company')
            ->latest()
            ->take(10)
            ->get();
        return view('agency.job_show', [
            'company_jobs' => $company_jobs,
            'hotjobs' => $hotjobs,
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
        $jobid = Job::find($id);
        $job_functions = JobFunction::all();
        $job_industries = JobIndustry::all();
        $job_locations = JobLocation::all();
        $job_salaries = JobSalary::all();
        return view('agency.job_edit', [
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
        $job->deadline = $request->deadline;
        $job->detail = $request->detail;
        $job->hiring = $request->hiring;
        $job->industry = $request->job_industries;
        $job->job_function = $request->job_function;
        $job->job_title = $request->job_title;
        $job->language = $request->language;
        $job->location = $request->job_locations;
        $job->qualification = $request->qualification;
        $job->salary = $request->job_salary;
        $job->sex = $request->sex;
        $job->term = $request->term;
        $job->title = $request->title;
        $job->year_of_exp = $request->year_of_exp;
        $job->update();

        return redirect(route('agency.job.index'));
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

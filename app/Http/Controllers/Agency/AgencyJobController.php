<?php

namespace App\Http\Controllers\Agency;

use App\Models\Job;
use App\Models\JobTerm;
use App\Models\JobLevel;
use App\Models\JobGender;
use App\Models\JobSalary;
use App\Models\JobFunction;
use App\Models\JobIndustry;
use App\Models\JobLocation;
use Illuminate\Http\Request;
use App\Models\JobExperience;
use App\Models\JobQualification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AgencyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'level' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'title_ch' => 'required',
            'title_en' => 'required',
            'title_kh' => 'required',
            'title_th' => 'required',
            'year_of_exp' => 'required',
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
            'level.required' => 'Level is required',
            'qualification.required' => 'Qualification is required',
            'salary.required' => 'Job Salary is required',
            'sex.required' => 'Sex is required',
            'term.required' => 'Term is required',
            'title_ch.required' => 'Job Chinese Title is required',
            'title_en.required' => 'Job English Title is required',
            'title_kh.required' => 'Job Khmer Title is required',
            'title_th.required' => 'Job Thai Title is required',
            'year_of_exp.required' => 'Year of experience is required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $jobs = new Job();
            $jobs->uid = Auth::user()->id;
            $jobs->approved = false; //This is for agency post and Admin can approved later
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
            $jobs->level = $request->level;
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
        $job_levels = JobLevel::all();
        $job_genders = JobGender::all();
        $job_terms = JobTerm::all();
        $job_experiences = JobExperience::all();
        $job_qualifications = JobQualification::all();
        return view('agency.job_edit', [
            'jobid' => $jobid,
            'job_functions' => $job_functions,
            'job_industries' => $job_industries,
            'job_locations' => $job_locations,
            'job_salaries' => $job_salaries,
            'job_levels' => $job_levels,
            'job_genders' => $job_genders,
            'job_terms' => $job_terms,
            'job_experiences' => $job_experiences,
            'job_qualifications' => $job_qualifications,
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
            'level' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'title_ch' => 'required',
            'title_en' => 'required',
            'title_kh' => 'required',
            'title_th' => 'required',
            'year_of_exp' => 'required',
        ], [
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
            'level.required' => 'Level is required',
            'qualification.required' => 'Qualification is required',
            'salary.required' => 'Job Salary is required',
            'sex.required' => 'Sex is required',
            'term.required' => 'Term is required',
            'title_ch.required' => 'Job Chinese Title is required',
            'title_en.required' => 'Job English Title is required',
            'title_kh.required' => 'Job Khmer Title is required',
            'title_th.required' => 'Job Thai Title is required',
            'year_of_exp.required' => 'Year of experience is required',
        ]);

        $jobs = Job::find($id);
        $jobs->age = $request->age;
        $jobs->contact = $request->contact;
        $jobs->detail = $request->detail;
        $jobs->expired_job = $request->expired_job;
        $jobs->expired_post = $request->expired_post;
        $jobs->industry = $request->industry;
        $jobs->function = $request->function;
        $jobs->hiring = $request->hiring;
        $jobs->language = $request->language;
        $jobs->location = $request->location;
        $jobs->level = $request->level;
        $jobs->qualification = $request->qualification;
        $jobs->salary = $request->salary;
        $jobs->sex = $request->sex;
        $jobs->term = $request->term;
        $jobs->title_ch = $request->title_ch;
        $jobs->title_en = $request->title_en;
        $jobs->title_kh = $request->title_kh;
        $jobs->title_th = $request->title_th;
        $jobs->year_of_exp = $request->year_of_exp;
        $jobs->update();

        return redirect(route('agency.dashboard'))->with('jobupdate', 'You have update a job');
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
}

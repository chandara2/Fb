<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\JobTerm;
use App\Models\JobLevel;
use App\Models\JobGender;
use App\Models\JobSalary;
use App\Models\CompanyInfo;
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
            ->select('jobs.*', 'company_infos.company')
            ->orderBy('approved', 'asc')
            ->orderBy('created_at', 'desc')->get();
        $company_infos = CompanyInfo::orderBy('company', 'asc')->get();
        $job_functions = JobFunction::all();
        $job_industries = JobIndustry::all();
        $job_locations = JobLocation::all();
        $job_salaries = JobSalary::all();
        $job_levels = JobLevel::all();
        $job_genders = JobGender::all();
        $job_terms = JobTerm::all();
        $job_experiences = JobExperience::all();
        $job_qualifications = JobQualification::all();

        return view('admin.job', [
            'jobs' => $jobs,
            'company_infos' => $company_infos,
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

    public function jobfetch()
    {
        $jobs = DB::table('company_infos')->join('jobs', 'jobs.company_id', 'company_infos.id')->select('jobs.*', 'company_infos.company')->orderBy('approved', 'asc')->get();

        $output = '';
        if ($jobs->count() > 0) {
            $output .= '<table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Expired Post</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($jobs as $i => $job) {
                $output .= '<tr>
                    <td>' . $i + 1 . '</td>
                    <td>' . $job->title_en . '</td>
                    <td>' . $job->company . '</td>
                    <td>' . $job->expired_post . '</td>
                    <td>' . $job->approved . '</td>
                    <td>
                        <a href="/admin/job/' . $job->id . '/edit" id="" class="text-success mx-1"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="' . $job->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
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
            'title_en' => 'required',
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
            'title_en.required' => 'Job English Title is required',
            'year_of_exp.required' => 'Year of experience is required',
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

    public function jobedit(Request $request)
    {
        $id = $request->id;
        $job = Job::find($id);
        return response()->json($job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_infos = CompanyInfo::orderBy('company', 'asc')->get();
        $currentcom = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->select('company_infos.id as ccomid', 'company_infos.company')
            ->where('jobs.id', $id)
            ->get();
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
        return view('admin.job_edit', [
            'company_infos' => $company_infos,
            'currentcom' => $currentcom,
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
            'title_en' => 'required',
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
            'title_en.required' => 'Job Thai Title is required',
            'year_of_exp.required' => 'Year of experience is required',
        ]);

        $jobs = Job::find($id);
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
        $jobs->update();

        return redirect(route('admin.job.index'));
    }

    public function changejobstatus(Request $request)
    {
        $jobs = Job::find($request->id);
        $jobs->approved = $request->approved;
        $jobs->save();
        return response()->json(['successStatusMsg' => 'Status has changed successfully']);
    }

    public function jobdelete(Request $request)
    {
        $id = $request->id;
        $job = Job::find($id);
        $job->destroy($id);
    }
}

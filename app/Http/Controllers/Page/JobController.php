<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobscoms = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id', 'job_locations.*', 'job_salaries.*')
            ->where('approved', true)
            ->paginate(10);
        
        $job_count = Job::all()->where('approved', true)->count(); //Use for prevent error while search and no job

        return view('page.job.index', [
            'jobscoms' => $jobscoms,
            'job_count' => $job_count,

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobcompanys = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->join('job_qualifications', 'job_qualifications.qualification_en', '=', 'jobs.qualification')
            ->join('job_genders', 'job_genders.gender_en', '=', 'jobs.sex')
            ->join('job_terms', 'job_terms.term_en', '=', 'jobs.term')
            ->join('job_experiences', 'job_experiences.experience_en', '=', 'jobs.year_of_exp')
            ->select('jobs.*', 'company_infos.*', 'company_infos.id as ciid','job_functions.*','job_industries.*', 'job_locations.*', 'job_salaries.*', 'job_qualifications.*', 'job_terms.*','job_genders.*', 'job_experiences.*')
            ->where('jobs.id', $id)
            ->where('approved', true)
            ->get();
        $hotjobs = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->select('jobs.created_at', 'jobs.title_ch', 'jobs.title_en', 'jobs.title_kh', 'jobs.title_th', 'jobs.salary', 'jobs.id as job_id', 'company_infos.company', 'company_infos.id as com_id')
            ->where('approved', true)
            ->where('jobs.id', '<>', $id)
            ->latest()
            ->take(10)
            ->get();

        return view('page.job.show', [
            'jobcompanys' => $jobcompanys,
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
        //
    }

    public function jobsort($jobsort)
    {
        $jobscoms = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('jobs.*', 'jobs.id as job_id', 'jobs.industry as job_industry', 'company_infos.*', 'company_infos.id as com_id', 'job_locations.*', 'job_salaries.*')
            ->orWhere('job_functions.function_ch', $jobsort)
            ->orWhere('job_functions.function_en', $jobsort)
            ->orWhere('job_functions.function_kh', $jobsort)
            ->orWhere('job_functions.function_th', $jobsort)
            ->orWhere('job_industries.industry_ch', $jobsort)
            ->orWhere('job_industries.industry_en', $jobsort)
            ->orWhere('job_industries.industry_kh', $jobsort)
            ->orWhere('job_industries.industry_th', $jobsort)
            ->orWhere('job_locations.location_ch', $jobsort)
            ->orWhere('job_locations.location_en', $jobsort)
            ->orWhere('job_locations.location_kh', $jobsort)
            ->orWhere('job_locations.location_th', $jobsort)
            ->orWhere('job_salaries.salary_ch', $jobsort)
            ->orWhere('job_salaries.salary_en', $jobsort)
            ->orWhere('job_salaries.salary_kh', $jobsort)
            ->orWhere('job_salaries.salary_th', $jobsort)
            ->paginate(10);

        return view('page.job.job_sort', [
            'jobscoms' => $jobscoms,
        ]);
    }

    public function searchjob(Request $request)
    {
        $job_count = Job::all()->where('approved', true)->count(); //Use for prevent error while search and no job
        $searchjob = $request['searchjob'] ?? "";
        if ($searchjob != "") {
            $jobscoms = DB::table('jobs')
                ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
                ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
                ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
                ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
                ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
                ->join('job_qualifications', 'job_qualifications.qualification_en', '=', 'jobs.qualification')
                ->join('job_genders', 'job_genders.gender_en', '=', 'jobs.sex')
                ->join('job_terms', 'job_terms.term_en', '=', 'jobs.term')
                ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id','job_functions.*','job_industries.*', 'job_locations.*', 'job_salaries.*')
                //Search by
                ->where('company', 'LIKE', "%$searchjob%")

                ->orWhere('title_ch', 'LIKE', "%$searchjob%")
                ->orWhere('title_en', 'LIKE', "%$searchjob%")
                ->orWhere('title_kh', 'LIKE', "%$searchjob%")
                ->orWhere('title_th', 'LIKE', "%$searchjob%")
                
                ->orWhere('industry_ch', 'LIKE', "%$searchjob%")
                ->orWhere('industry_en', 'LIKE', "%$searchjob%")
                ->orWhere('industry_kh', 'LIKE', "%$searchjob%")
                ->orWhere('industry_th', 'LIKE', "%$searchjob%")

                ->orWhere('function_ch', 'LIKE', "%$searchjob%")
                ->orWhere('function_en', 'LIKE', "%$searchjob%")
                ->orWhere('function_kh', 'LIKE', "%$searchjob%")
                ->orWhere('function_th', 'LIKE', "%$searchjob%")

                ->orWhere('location_ch', 'LIKE', "%$searchjob%")
                ->orWhere('location_en', 'LIKE', "%$searchjob%")
                ->orWhere('location_kh', 'LIKE', "%$searchjob%")
                ->orWhere('location_th', 'LIKE', "%$searchjob%")

                ->orWhere('salary_ch', 'LIKE', "%$searchjob%")
                ->orWhere('salary_en', 'LIKE', "%$searchjob%")
                ->orWhere('salary_kh', 'LIKE', "%$searchjob%")
                ->orWhere('salary_th', 'LIKE', "%$searchjob%")

                ->orWhere('qualification_ch', 'LIKE', "%$searchjob%")
                ->orWhere('qualification_en', 'LIKE', "%$searchjob%")
                ->orWhere('qualification_kh', 'LIKE', "%$searchjob%")
                ->orWhere('qualification_th', 'LIKE', "%$searchjob%")
                
                ->orWhere('gender_ch', 'LIKE', "%$searchjob%")
                ->orWhere('gender_en', 'LIKE', "%$searchjob%")
                ->orWhere('gender_kh', 'LIKE', "%$searchjob%")
                ->orWhere('gender_th', 'LIKE', "%$searchjob%")

                ->orWhere('term_ch', 'LIKE', "%$searchjob%")
                ->orWhere('term_en', 'LIKE', "%$searchjob%")
                ->orWhere('term_kh', 'LIKE', "%$searchjob%")
                ->orWhere('term_th', 'LIKE', "%$searchjob%")

                ->paginate(10)->withQueryString();
        } else {
            $jobscoms = DB::table('jobs')
                ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
                ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id')
                ->paginate(10);
        }
        return view('page.job.index', [
            'job_count' => $job_count,
            'jobscoms' => $jobscoms,
            'searchjob' => $searchjob,
        ]);
    }
}

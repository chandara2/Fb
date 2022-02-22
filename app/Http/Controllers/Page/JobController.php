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
            ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id')
            ->where('approved', true)
            ->paginate(10);


        return view('page.job.index', [
            'jobscoms' => $jobscoms,
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
            ->select('jobs.*', 'company_infos.*', 'company_infos.id as ciid')
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
            ->select('jobs.*', 'jobs.id as job_id', 'jobs.industry as job_industry', 'company_infos.*', 'company_infos.id as com_id')
            ->where('job_functions.function_en', $jobsort)
            ->orWhere('job_industries.industry_en', $jobsort)
            ->orWhere('job_locations.location_en', $jobsort)
            ->orWhere('job_salaries.salary_en', $jobsort)
            ->paginate(10);

        return view('page.job.job_sort', [
            'jobscoms' => $jobscoms,
        ]);
    }

    public function searchjob(Request $request)
    {
        $searchjob = $request['searchjob'] ?? "";
        if ($searchjob != "") {
            $jobscoms = DB::table('jobs')
                ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
                ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id')
                ->where('title_en', 'LIKE', "%$searchjob%")
                ->orWhere('company', 'LIKE', "%$searchjob%")
                // ->orWhere('industry', 'LIKE', "%$searchjob%")
                ->orWhere('function', 'LIKE', "%$searchjob%")
                ->orWhere('location', 'LIKE', "%$searchjob%")
                ->orWhere('salary', 'LIKE', "%$searchjob%")
                // ->orWhere('age', 'LIKE', "%$searchjob%")
                // ->orWhere('contact', 'LIKE', "%$searchjob%")
                // ->orWhere('expired_job', 'LIKE', "%$searchjob%")
                // ->orWhere('hiring', 'LIKE', "%$searchjob%")
                // ->orWhere('language', 'LIKE', "%$searchjob%")
                // ->orWhere('qualification', 'LIKE', "%$searchjob%")
                // ->orWhere('sex', 'LIKE', "%$searchjob%")
                // ->orWhere('term', 'LIKE', "%$searchjob%")
                // ->orWhere('year_of_exp', 'LIKE', "%$searchjob%")
                // ->orWhere('detail', 'LIKE', "%$searchjob%")
                ->paginate(10)->withQueryString();
        } else {
            $jobscoms = DB::table('jobs')
                ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
                ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id')
                ->paginate(10);
        }
        return view('page.job.index', [
            'jobscoms' => $jobscoms,
            'searchjob' => $searchjob,
        ]);
    }
}

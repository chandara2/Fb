<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Homepage;
use App\Models\JobSalary;
use App\Models\CompanyInfo;
use App\Models\JobFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companylogos = CompanyInfo::select('company_infos.logo', 'company_infos.id')->get();
        $homepage_slide = Homepage::select('slide')->get();

        $jobcompanys = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company')
            ->select('jobs.created_at', 'jobs.title_ch', 'jobs.title_en', 'jobs.title_kh', 'jobs.title_th', 'jobs.id as jobid', 'company_infos.company as cic', 'company_infos.id as com_id')
            ->where('approved', true)
            ->orderBy('expired_post')
            ->latest()
            ->take(12)
            ->get();

        $job_functions = DB::table('jobs')
        ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
        ->select('job_functions.*')
        ->get();
        $job_industries = DB::table('jobs')
        ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
        ->select('job_industries.*')
        ->get();
        $job_locations = DB::table('jobs')
        ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
        ->select('job_locations.*')
        ->get();
        $job_salaries = DB::table('jobs')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('job_salaries.*')
            ->get();

        $js = Job::all()->countBy('salary');

        // $job_functions = DB::table('job_functions')
        //     ->join('jobs', 'jobs.function', 'job_functions.name')
        //     ->select('function')
        //     ->selectRaw('count(*) as number')
        //     ->whereNotIn('function', [''])
        //     ->groupBy('function')
        //     ->orderBy('function', 'asc') //Unless you use this array somewhere, it's not needed.
        //     ->get();

        return view('app', [
            'companylogos' => $companylogos,
            'homepage_slide' => $homepage_slide,
            'jobcompanys' => $jobcompanys,
            'job_functions' => $job_functions,
            'job_industries' => $job_industries,
            'job_locations' => $job_locations,
            'job_salaries' => $job_salaries,
            'js' => $js,
        ]);
    }

    public function jobsall()
    {
        return view('app');
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
        $jobsfn_id = DB::table('jobs')
            ->join('job_functions', 'jobs.function', '=', 'job_functions.name')
            ->select('jobs.*')
            ->where('jobs.function', $id)
            ->get();

        return view('page.job.index', [
            'jobsfn_id' => $jobsfn_id,
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
}

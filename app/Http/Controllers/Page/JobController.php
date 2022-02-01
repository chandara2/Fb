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
        $jiii = Job::filter('IT')->get();
        dd($jiii);
        $jobs = Job::paginate(10);
        return view('page.job.index', [
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
        $jobcompanys = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.*', 'company_infos.*', 'company_infos.id as ciid')
            ->where('jobs.id', $id)
            ->get();
        $hotjobs = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.id', 'jobs.created_at', 'jobs.title', 'jobs.salary', 'company_infos.company', 'company_infos.id as com_id')
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

    public function jobs($id)
    {
        $jobs = DB::table('jobs')
            ->join('job_functions', 'jobs.function', '=', 'job_functions.name')
            ->join('job_industries', 'jobs.industry', '=', 'job_industries.name')
            ->join('job_locations', 'jobs.location', '=', 'job_locations.name')
            ->join('job_salaries', 'jobs.salary', '=', 'job_salaries.name')
            ->select('jobs.*')
            ->where('job_functions.id', $id)
            ->orWhere('job_industries.id', $id)
            ->orWhere('job_locations.id', $id)
            ->orWhere('job_salaries.id', $id)
            ->get();
        return view('page.job.index', [
            'jobs' => $jobs,
        ]);
    }
}

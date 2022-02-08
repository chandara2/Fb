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
        $jobscoms = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id')
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

    public function jobsort($jobsort)
    {
        $jobscoms = DB::table('jobs')
            ->join('job_functions', 'job_functions.name', '=', 'jobs.function')
            ->join('job_industries', 'job_industries.name', '=', 'jobs.industry')
            ->join('job_locations', 'job_locations.name', '=', 'jobs.location')
            ->join('job_salaries', 'job_salaries.name', '=', 'jobs.salary')
            ->join('company_infos', 'company_infos.uid', '=', 'jobs.uid')
            ->select('jobs.*', 'company_infos.*', 'jobs.id as job_id', 'company_infos.id as com_id')
            ->where('job_functions.name', $jobsort)
            ->orWhere('job_industries.name', $jobsort)
            ->orWhere('job_locations.name', $jobsort)
            ->orWhere('job_salaries.name', $jobsort)
            ->paginate(10);
        return view('page.job.job_sort', [
            'jobscoms' => $jobscoms,
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

    public function jobsall($id)
    {
        $jobscoms = DB::table('jobs')
            ->select('jobs.*')
            ->where('jobs.function', $id)
            ->get();

        return view('page.job.index', [
            'jobscoms' => $jobscoms,
        ]);
    }
}

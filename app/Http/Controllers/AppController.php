<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $job_functions = Job::all()->countBy('job_function');
        // $job_industries = Job::all()->countBy('industry');
        // $job_locations = Job::all()->countBy('location');
        // $job_salaries = Job::all()->countBy('salary');
        // $jobagencysweb = DB::table('users')
        //     ->join('jobs', 'users.id', '=', 'jobs.user_id')
        //     ->join('agencies', 'users.id', '=', 'agencies.user_id')
        //     ->select('jobs.created_at', 'jobs.job_title', 'jobs.id as jid', 'agencies.company', 'agencies.id as aid')
        //     ->latest()
        //     ->take(12)
        //     ->get();
        // $agency = Agency::select('agencies.logo')->get();
        // $aboutus = Aboutus::all();

        // return redirect('/', [
        //     'job_functions' => $job_functions,
        //     'job_industries' => $job_industries,
        //     'job_locations' => $job_locations,
        //     'job_salaries' => $job_salaries,
        // 'jobagencysweb' => $jobagencysweb,
        // 'agency' => $agency,
        // 'aboutus' => $aboutus,
        // ]);
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

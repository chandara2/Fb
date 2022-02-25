<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
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
        $companys = DB::table('company_infos')
            ->join('job_industries', 'job_industries.industry_en', '=', 'company_infos.industry')
            ->join('job_locations', 'job_locations.location_en', '=', 'company_infos.province')
            ->where('company_infos.id', $id)
            ->select('company_infos.*', 'job_industries.*', 'job_locations.*')
            ->take(1)->get();
        $company_jobs = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->join('job_terms', 'job_terms.term_en', '=', 'jobs.term')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->select('jobs.*', 'jobs.id as job_id', 'company_infos.*', 'company_infos.id as com_id', 'job_terms.*', 'job_locations.*')
            ->where('company_infos.id', $id)
            ->where('approved', true)
            ->get();
        $com_job_count = $company_jobs->count();

        return view('page.company.show', [
            'companys' => $companys,
            'company_jobs' => $company_jobs,
            'com_job_count' => $com_job_count,
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

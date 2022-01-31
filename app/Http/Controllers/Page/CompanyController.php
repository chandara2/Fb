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
        $companys = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.*', 'company_infos.*')
            ->where('company_infos.id', $id)
            ->take(1)
            ->get();
        $jobs = DB::table('users')
            ->join('jobs', 'users.id', '=', 'jobs.uid')
            ->join('company_infos', 'users.id', '=', 'company_infos.uid')
            ->select('jobs.*', 'company_infos.*', 'jobs.id as job_id')
            ->where('company_infos.id', $id)
            ->get();

        return view('page.company.show', [
            'companys' => $companys,
            'jobs' => $jobs,
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

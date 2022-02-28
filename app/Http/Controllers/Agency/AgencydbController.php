<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\JobExperience;
use App\Models\JobFunction;
use App\Models\JobGender;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use App\Models\JobLocation;
use App\Models\JobQualification;
use App\Models\JobSalary;
use App\Models\JobTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencydbController extends Controller
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
    public function dashboard()
    {
        $company_infos = CompanyInfo::all()->where('uid', Auth::user()->id);
        $job_industrys = JobIndustry::get();
        $job_locations = JobLocation::get();
        $job_functions = JobFunction::all();
        $job_salarys = JobSalary::all();
        $job_genders = JobGender::all();
        $job_terms = JobTerm::all();
        $job_levels  = JobLevel::all();
        $job_qualifications  = JobQualification::all();
        $job_experiences  = JobExperience::all();
        return view('agency.dashboard', [
            'company_infos' => $company_infos,
            'job_industrys' => $job_industrys,
            'job_locations' => $job_locations,
            'job_functions' => $job_functions,
            'job_salarys' => $job_salarys,
            'job_genders' => $job_genders,
            'job_terms' => $job_terms,
            'job_levels' => $job_levels,
            'job_qualifications' => $job_qualifications,
            'job_experiences' => $job_experiences,
        ]);
    }
}

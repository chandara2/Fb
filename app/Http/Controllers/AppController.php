<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Partner;
use App\Models\Homepage;
use App\Models\JobSalary;
use App\Models\CompanyInfo;
use App\Models\JobFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CareerResource;

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
        $company_recruitment = CompanyInfo::select('company_infos.logo', 'company_infos.id')->where('company_infos.recruitment', true)->get();
        $con_rec_count = $company_recruitment->count();
        $comlogocounts = $companylogos->count();
        $homepage_slide = Homepage::select('slide')->get();
        $partners = Partner::select('logo', 'link')->get();
        $jobcompanys = DB::table('jobs')
            ->join('company_infos', 'company_infos.id', '=', 'jobs.company_id')
            ->select('jobs.created_at', 'jobs.title_ch', 'jobs.title_en', 'jobs.title_kh', 'jobs.title_th', 'jobs.id as jobid', 'company_infos.company as cic', 'company_infos.id as com_id')
            ->where('approved', true)
            ->orderBy('expired_post')
            ->latest()
            ->take(12)
            ->get();
        $jobsorts = DB::table('jobs')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('job_functions.*', 'job_industries.*', 'job_locations.*', 'job_salaries.*')
            ->where('approved', true)
            ->get();
        $function_ch = DB::table('jobs')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->select('job_functions.function_ch', DB::raw('count(*) as count'))
            ->groupBy('job_functions.function_ch')
            ->where('approved', true)
            ->get();
        $function_en = DB::table('jobs')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->select('job_functions.function_en', DB::raw('count(*) as count'))
            ->groupBy('job_functions.function_en')
            ->where('approved', true)
            ->get();
        $function_kh = DB::table('jobs')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->select('job_functions.function_kh', DB::raw('count(*) as count'))
            ->groupBy('job_functions.function_kh')
            ->where('approved', true)
            ->get();
        $function_th = DB::table('jobs')
            ->join('job_functions', 'job_functions.function_en', '=', 'jobs.function')
            ->select('job_functions.function_th', DB::raw('count(*) as count'))
            ->groupBy('job_functions.function_th')
            ->where('approved', true)
            ->get();
        $industry_ch = DB::table('jobs')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->select('job_industries.industry_ch', DB::raw('count(*) as count'))
            ->groupBy('job_industries.industry_ch')
            ->where('approved', true)
            ->get();
        $industry_en = DB::table('jobs')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->select('job_industries.industry_en', DB::raw('count(*) as count'))
            ->groupBy('job_industries.industry_en')
            ->where('approved', true)
            ->get();
        $industry_kh = DB::table('jobs')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->select('job_industries.industry_kh', DB::raw('count(*) as count'))
            ->groupBy('job_industries.industry_kh')
            ->where('approved', true)
            ->get();
        $industry_th = DB::table('jobs')
            ->join('job_industries', 'job_industries.industry_en', '=', 'jobs.industry')
            ->select('job_industries.industry_th', DB::raw('count(*) as count'))
            ->groupBy('job_industries.industry_th')
            ->where('approved', true)
            ->get();
        $location_ch = DB::table('jobs')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->select('job_locations.location_ch', DB::raw('count(*) as count'))
            ->groupBy('job_locations.location_ch')
            ->where('approved', true)
            ->get();
        $location_en = DB::table('jobs')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->select('job_locations.location_en', DB::raw('count(*) as count'))
            ->groupBy('job_locations.location_en')
            ->where('approved', true)
            ->get();
        $location_kh = DB::table('jobs')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->select('job_locations.location_kh', DB::raw('count(*) as count'))
            ->groupBy('job_locations.location_kh')
            ->where('approved', true)
            ->get();
        $location_th = DB::table('jobs')
            ->join('job_locations', 'job_locations.location_en', '=', 'jobs.location')
            ->select('job_locations.location_th', DB::raw('count(*) as count'))
            ->groupBy('job_locations.location_th')
            ->where('approved', true)
            ->get();
        $salary_ch = DB::table('jobs')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('job_salaries.salary_ch', DB::raw('count(*) as count'))
            ->groupBy('job_salaries.salary_ch')
            ->where('approved', true)
            ->get();
        $salary_en = DB::table('jobs')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('job_salaries.salary_en', DB::raw('count(*) as count'))
            ->groupBy('job_salaries.salary_en')
            ->where('approved', true)
            ->get();
        $salary_kh = DB::table('jobs')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('job_salaries.salary_kh', DB::raw('count(*) as count'))
            ->groupBy('job_salaries.salary_kh')
            ->where('approved', true)
            ->get();
        $salary_th = DB::table('jobs')
            ->join('job_salaries', 'job_salaries.salary_en', '=', 'jobs.salary')
            ->select('job_salaries.salary_th', DB::raw('count(*) as count'))
            ->groupBy('job_salaries.salary_th')
            ->where('approved', true)
            ->get();
        $career_howto = CareerResource::where('type','1')
        ->select('id','title_ch','title_en','title_kh','title_th','created_at')
        ->latest()
        ->take(3)
        ->get();
        $career_sample = CareerResource::where('type','2')
        ->select('id','title_ch','title_en','title_kh','title_th','created_at')
        ->latest()
        ->take(3)
        ->get();
        $career_tip = CareerResource::where('type','3')
        ->select('id','title_ch','title_en','title_kh','title_th','created_at')
        ->latest()
        ->take(3)
        ->get();

        return view('app', [
            'companylogos' => $companylogos,
            'company_recruitment' => $company_recruitment,
            'con_rec_count' => $con_rec_count,
            'comlogocounts' => $comlogocounts,
            'homepage_slide' => $homepage_slide,
            'partners' => $partners,
            'jobcompanys' => $jobcompanys,
            'jobsorts' => $jobsorts,
            'function_ch' => $function_ch,
            'function_en' => $function_en,
            'function_kh' => $function_kh,
            'function_th' => $function_th,
            'industry_ch' => $industry_ch,
            'industry_en' => $industry_en,
            'industry_kh' => $industry_kh,
            'industry_th' => $industry_th,
            'location_ch' => $location_ch,
            'location_en' => $location_en,
            'location_kh' => $location_kh,
            'location_th' => $location_th,
            'salary_ch' => $salary_ch,
            'salary_en' => $salary_en,
            'salary_kh' => $salary_kh,
            'salary_th' => $salary_th,
            'career_howto' => $career_howto,
            'career_sample' => $career_sample,
            'career_tip' => $career_tip,
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

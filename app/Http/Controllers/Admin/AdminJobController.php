<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('admin.job', [
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
        return view('admin.job_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required',
            'contact' => 'required',
            'deadline' => 'required',
            'detail' => 'required',
            'hiring' => 'required',
            'industry' => 'required',
            'job_function' => 'required',
            'job_title' => 'required',
            'language' => 'required',
            'location' => 'required',
            'qualification' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'term' => 'required',
            'year_of_exp' => 'required',
        ]);

        $user = new Job();
        $user->uid = Auth::user()->id;
        $user->age = $request->age;
        $user->contact = $request->contact;
        $user->deadline = $request->deadline;
        $user->detail = $request->detail;
        $user->hiring = $request->hiring;
        $user->industry = $request->industry;
        $user->job_function = $request->job_function;
        $user->job_title = $request->job_title;
        $user->language = $request->language;
        $user->location = $request->age;
        $user->qualification = $request->qualification;
        $user->salary = $request->salary;
        $user->sex = $request->sex;
        $user->term = $request->term;
        $user->year_of_exp = $request->year_of_exp;
        $user->save();

        return redirect(route('admin.job.index'));
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
        $jobid = Job::find($id);
        return view('admin.job_edit', [
            'jobid' => $jobid,
        ]);
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
        $job = Job::find($id);
        $job->delete();
        return back()->with('jobdelete', 'You have create a job');
    }
}
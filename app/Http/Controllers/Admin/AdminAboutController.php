<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about', [
            'abouts' => $abouts,
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
        // $validator = Validator::make($request->all(), [
        //     'banner' => 'required|image|mimes:jpeg,png,jpg|max:2084',
        //     'mission' => 'required',
        //     'goal' => 'required',
        //     'value' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'social' => 'required',
        //     'operating' => 'required',
        // ], [
        //     'banner.required' => 'Please upload a banner',
        //     'mission.required' => 'Please input mission',
        //     'goal.required' => 'Please input goal',
        //     'value.required' => 'Please input value',
        //     'email.required' => 'Please input email',
        //     'phone.required' => 'Please input phone',
        //     'address.required' => 'Please input address',
        //     'social.required' => 'Please input social',
        //     'operating.required' => 'Please input operating',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'errMsg' => $validator->messages()
        //     ]);
        // } else {
        //     $abouts = new About();
        //     $abouts->mission = $request->mission;
        //     $abouts->goal = $request->goal;
        //     $abouts->value = $request->value;
        //     $abouts->email = $request->email;
        //     $abouts->phone = $request->phone;
        //     $abouts->address = $request->address;
        //     $abouts->social = $request->social;
        //     $abouts->operating = $request->operating;

        //     if ($request->hasFile('banner')) {
        //         $file = $request->file('banner');
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = time() . '.' . $extension;
        //         $file->move('upload/aboutsbanner', $filename);
        //         $abouts->banner = $filename;
        //     }
        //     $abouts->save();

        //     return response()->json([
        //         'status' => 200,
        //         'successMsg' => 'About Us info add successfully'
        //     ]);
        // }


        $validator = Validator::make($request->all(), [
            'banner' => 'required|image|mimes:jpeg,png,jpg|max:2084',
            'mission' => 'required',
            'goal' => 'required',
            'value' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'social' => 'required',
            'operating' => 'required',
        ], [
            'banner.required' => 'Please upload a banner',
            'mission.required' => 'Please input mission',
            'goal.required' => 'Please input goal',
            'value.required' => 'Please input value',
            'email.required' => 'Please input email',
            'phone.required' => 'Please input phone',
            'address.required' => 'Please input address',
            'social.required' => 'Please input social',
            'operating.required' => 'Please input operating',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $abouts = new About();
            $abouts->mission = $request->mission;
            $abouts->goal = $request->goal;
            $abouts->value = $request->value;
            $abouts->email = $request->email;
            $abouts->phone = $request->phone;
            $abouts->address = $request->address;
            $abouts->social = $request->social;
            $abouts->operating = $request->operating;

            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/aboutsbanner', $filename);
                $abouts->banner = $filename;
            }
            $abouts->save();
            return response()->json(['status' => 1, 'msg' => 'About us information added successfully']);
        }
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

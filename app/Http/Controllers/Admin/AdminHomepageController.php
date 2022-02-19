<?php

namespace App\Http\Controllers\Admin;

use App\Models\Homepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminHomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homepageslides = Homepage::all();
        return view('admin.homepage', [
            'homepageslides' => $homepageslides,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slide' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'slide.required' => 'Please upload homepage slide',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $slideBanner = new Homepage();
            if ($request->hasFile('slide')) {
                $file = $request->file('slide');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/homepageslide/', $filename);
                $slideBanner->slide = $filename;
            }

            $slide = new Homepage();
            $slide->uid = Auth::user()->id;
            $slide->slide = $filename;
            $slide->save();
            return response()->json(['status' => 1, 'msg' => 'Company create successfully']);
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
        $slide = Homepage::find($id);

        $image_path = 'upload/homepageslide/' . $slide->slide;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $slide->delete();
        return back()->with('slideDelete', 'You have delete a slide');
    }
}

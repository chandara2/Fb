<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
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
        $partners = Partner::all();
        return view('admin.homepage', [
            'homepageslides' => $homepageslides,
            'partners' => $partners,
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


    public function partnerstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link' => 'required',
        ], [
            'logo.required' => 'Please upload homepage slide',
            'link.required' => 'Please inpute partner link',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $partnerLogo = new Partner();
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/partnerlogo/', $filename);
                $partnerLogo->slide = $filename;
            }

            $partner = new Partner();
            $partner->logo = $filename;
            $partner->link = $request->link;
            $partner->save();
            return response()->json(['status' => 1, 'msg' => 'Company partner successfully']);
        }
    }

    public function partnerdestroy($id)
    {
        $partner = Partner::find($id);

        $image_path = 'upload/partnerlogo/' . $partner->logo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $partner->delete();
        return back()->with('partnerDelete', 'You have delete a partner');
    }
}

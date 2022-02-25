<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $validator = Validator::make($request->all(), [
            'banner' => 'required|image|mimes:jpeg,png,jpg|max:2084',
            'aboutus_ch' => 'required_without:aboutus_en',
            'aboutus_en' => 'required',
            'aboutus_kh' => 'required_without:aboutus_en',
            'aboutus_th' => 'required_without:aboutus_en',

        ], [
            'banner.required' => 'Please upload a banner',
            'aboutus_ch.required_without' => 'Please input about us page infomation in Chinese',
            'aboutus_en.required' => 'Please input about us page infomation in English',
            'aboutus_kh.required_without' => 'Please input about us page infomation in Khmer',
            'aboutus_th.required_without' => 'Please input about us page infomation in Thai',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $abouts = new About();
            $abouts->aboutus_ch = $request->aboutus_ch;
            $abouts->aboutus_en = $request->aboutus_en;
            $abouts->aboutus_kh = $request->aboutus_kh;
            $abouts->aboutus_th = $request->aboutus_th;

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
        $abouts_id = About::find($id);
        return view('admin.about_edit', [
            'abouts_id' => $abouts_id,
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
        $request->validate([
            'aboutus_ch' => 'required',
            'aboutus_en' => 'required',
            'aboutus_kh' => 'required',
            'aboutus_th' => 'required',
        ], [
            'aboutus_ch.required' => 'Please input about us page infomation in Chinese',
            'aboutus_en.required' => 'Please input about us page infomation in English',
            'aboutus_kh.required' => 'Please input about us page infomation in Khmer',
            'aboutus_th.required' => 'Please input about us page infomation in Thai',
        ]);

        $abouts = About::find($id);
        $abouts->aboutus_ch = $request->aboutus_ch;
        $abouts->aboutus_en = $request->aboutus_en;
        $abouts->aboutus_kh = $request->aboutus_kh;
        $abouts->aboutus_th = $request->aboutus_th;

        if ($request->hasFile('banner')) {
            $path = 'upload/aboutsbanner/' . $abouts->banner;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/aboutsbanner/', $filename);
            $abouts->banner = $filename;
        }

        $abouts->update();

        return redirect(route('admin.about.index'));
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

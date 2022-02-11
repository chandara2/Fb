<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'slide' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'slide.required' => 'Please upload homepage slide',
        ]);

        $homepageSlide = new Homepage();
        if ($request->hasFile('slide')) {
            $file = $request->file('slide');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/homepageslide/', $filename);
            $homepageSlide->slide = $filename;
        }

        $slide = new Homepage();
        $slide->uid = Auth::user()->id;
        $slide->slide = $filename;
        $slide->save();

        return redirect(route('admin.homepage.index'));
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

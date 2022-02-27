<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerResource;
use App\Models\Postgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCareerResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = CareerResource::all();
        $postgroups = Postgroup::all();
        return view('admin.career',[
            'careers'=>$careers,
            'postgroups'=>$postgroups,
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
            'title_ch' => 'required',
            'title_en' => 'required',
            'title_kh' => 'required',
            'title_th' => 'required',
            'post_ch' => 'required',
            'post_en' => 'required',
            'post_kh' => 'required',
            'post_th' => 'required',
            'type' => 'required',
        ], [
            'title_ch.required' => 'Please input your title in Chinese',
            'title_en.required' => 'Please input your title in English',
            'title_kh.required' => 'Please input your title in Khmer',
            'title_th.required' => 'Please input your title in Thai',
            'post_ch.required' => 'Please input your post in Chinese',
            'post_en.required' => 'Please input your post in English',
            'post_kh.required' => 'Please input your post in Khmer',
            'post_th.required' => 'Please input your post in Thai',
            'type.required' => 'Please choose post type',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $career = new CareerResource();
            $career->title_ch = $request->title_ch;
            $career->title_en = $request->title_en;
            $career->title_kh = $request->title_kh;
            $career->title_th = $request->title_th;
            $career->post_ch = $request->post_ch;
            $career->post_en = $request->post_en;
            $career->post_kh = $request->post_kh;
            $career->post_th = $request->post_th;
            $career->type = $request->type;
            $career->save();
            return response()->json(['status' => 1, 'msg' => 'Career resource create successfully']);
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
        $career_id = CareerResource::find($id);
        $postgroups = Postgroup::all();
        return view('admin.career_edit', [
            'career_id' => $career_id,
            'postgroups' => $postgroups,
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
            'title_ch' => 'required',
            'title_en' => 'required',
            'title_kh' => 'required',
            'title_th' => 'required',
            'post_ch' => 'required',
            'post_en' => 'required',
            'post_kh' => 'required',
            'post_th' => 'required',
            'type' => 'required',
        ], [
            'title_ch.required' => 'Please input your title in Chinese',
            'title_en.required' => 'Please input your title in English',
            'title_kh.required' => 'Please input your title in Khmer',
            'title_th.required' => 'Please input your title in Thai',
            'post_ch.required' => 'Please input your post in Chinese',
            'post_en.required' => 'Please input your post in English',
            'post_kh.required' => 'Please input your post in Khmer',
            'post_th.required' => 'Please input your post in Thai',
            'type.required' => 'Please choose post type',
        ]);

        $careers = CareerResource::find($id);
        $careers->title_ch = $request->title_ch;
        $careers->title_en = $request->title_en;
        $careers->title_kh = $request->title_kh;
        $careers->title_th = $request->title_th;
        $careers->post_ch = $request->post_ch;
        $careers->post_en = $request->post_en;
        $careers->post_kh = $request->post_kh;
        $careers->post_th = $request->post_th;
        $careers->type = $request->type;
        $careers->update();

        return redirect(route('admin.career.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $careers = CareerResource::find($id);
        $careers->delete();
        return back()->with('careerDelete', 'You have delete a careers resource');
    }
}

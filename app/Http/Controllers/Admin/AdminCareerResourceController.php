<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerResource;
use App\Models\Postgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $careers = CareerResource::orderBy('created_at', 'desc')->get();
        $postgroups = Postgroup::all();
        return view('admin.career', [
            'careers' => $careers,
            'postgroups' => $postgroups,
        ]);
    }

    public function careerfetch()
    {
        $careers = CareerResource::all();
        $output = '';
        if ($careers->count() > 0) {
            $output .= '<table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($careers as $i => $career) {
                $output .= '<tr>
                    <td>' . $i + 1 . '</td>
                    <td>' . $career->title_en . '</td>
                    <td>' . $career->type . '</td>
                    <td>
                        <a href="/admin/career/' . $career->id . '/edit" id="" class="text-success mx-1"><i class="bi-pencil-square h4"></i></a>
                        <a href="#" id="' . $career->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editCareerModal">EditAjax</a>

                        <a href="#" " id="' . $career->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
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
            'title_en' => 'required',
            'post_en' => 'required',
            'type' => 'required',
            'post_img' => 'required',
        ], [
            'title_en.required' => 'Please input your title in English',
            'post_en.required' => 'Please input your post in English',
            'type.required' => 'Please choose post type',
            'post_img.required' => 'Please inpute post image',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $blogpost = new CareerResource();
            if ($request->hasFile('post_img')) {
                $file = $request->file('post_img');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/blogpost/', $filename);
                $blogpost->post_img = $filename;
            }

            $career = new CareerResource();
            $career->post_img = $filename;
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

    public function careeredit(Request $request)
    {
        $id = $request->id;
        $career = CareerResource::find($id);
        return response()->json($career);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $career_id = CareerResource::find($id);
    //     $postgroups = Postgroup::all();
    //     return view('admin.career_edit', [
    //         'career_id' => $career_id,
    //         'postgroups' => $postgroups,
    //     ]);
    // }

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
            'title_en' => 'required',
            'post_en' => 'required',
            'type' => 'required',
        ], [
            'title_en.required' => 'Please input your title in English',
            'post_en.required' => 'Please input your post in English',
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

        if ($request->hasFile('post_img')) {
            $path = 'upload/blogpost/' . $careers->post_img;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('post_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/blogpost/', $filename);
            $careers->post_img = $filename;
        }

        $careers->update();

        return redirect(route('admin.career.index'));
    }

    public function careerdelete(Request $request)
    {
        $id = $request->id;
        $career = CareerResource::find($id);
        $career->destroy($id);
    }
}

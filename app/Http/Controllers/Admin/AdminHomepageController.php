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

    public function slidefetch()
    {
        $homepageslides = Homepage::all();

        $output = '';
        if ($homepageslides->count() > 0) {
            $output .= '<div class="row">';
            foreach ($homepageslides as $i => $slide) {

                $output .= '<div class="col-xl-2 col-lg-3 col-md-4 mb-3">
                    <img src="/upload/homepageslide/' . $slide->slide . '" alt="slide" width="100%" height="100" style="object-fit: cover;" class="border border-info p-1">
                    <div class="d-flex justify-content-between">
                        <span>BANNER SLIDE ' . $i + 1 . '</span><button class="text-danger btn p-0 deleteIcon" title="Delete" id="' . $slide->id . '"><i class="bi bi-x-square"></i></button>
                    </div>
                </div>';
            }
            $output .= '</div>';
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

    public function slidedelete(Request $request)
    {
        $id = $request->id;
        $slide = Homepage::find($id);
        $image_path = 'upload/homepageslide/' . $slide->slide;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $slide->destroy($id);
    }

    public function partnerstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link' => 'required',
        ], [
            'logo.required' => 'Please upload partner logo',
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

    public function partnerfetch()
    {
        $partners = Partner::all();

        $output = '';
        if ($partners->count() > 0) {
            $output .= '<div class="row">';
            foreach ($partners as $i => $partner) {

                $output .= '<div class="col-xl-2 col-lg-3 col-md-4 mb-3">
                    <img src="/upload/partnerlogo/' . $partner->logo . '" alt="slide" width="100%" height="100" style="object-fit: cover;" class="border border-info p-1">
                    <div class="d-flex justify-content-between">
                        <span title="' . $partner->link . '">PARTNER LOGO & LINK ' . $i + 1 . '</span><button class="text-danger btn p-0 deleteIcon1" title="Delete" id="' . $partner->id . '"><i class="bi bi-x-square"></i></button>
                    </div>
                </div>';
            }
            $output .= '</div>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function partnerdelete(Request $request)
    {
        $id = $request->id;
        $partner = Partner::find($id);
        $image_path = 'upload/partnerlogo/' . $partner->logo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $partner->destroy($id);
    }
}

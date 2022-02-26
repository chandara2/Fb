<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContact;
use App\Models\FooterQrcode;
use App\Models\FooterSocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminFooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footercontact = FooterContact::all();
        $footersocialmedia = FooterSocialMedia::all();
        $footerqrcode = FooterQrcode::all();
        return view('admin.footer', [
            'footercontact' => $footercontact,
            'footersocialmedia' => $footersocialmedia,
            'footerqrcode' => $footerqrcode,
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
            'contact_ch' => 'required',
            'contact_en' => 'required',
            'contact_kh' => 'required',
            'contact_th' => 'required',
        ], [
            'contact_ch.required' => 'Please upload your contact in Chinese',
            'contact_en.required' => 'Please upload your contact in English',
            'contact_kh.required' => 'Please upload your contact in Khmer',
            'contact_th.required' => 'Please upload your contact in Thai',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $footercontact = new FooterContact();
            $footercontact->contact_ch = $request->contact_ch;
            $footercontact->contact_en = $request->contact_en;
            $footercontact->contact_kh = $request->contact_kh;
            $footercontact->contact_th = $request->contact_th;
            $footercontact->save();
            return response()->json(['status' => 1, 'msg' => 'Footer contact create successfully']);
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
        $footerct = FooterContact::find($id);
        return view('admin.footerct_edit', [
            'footerct' => $footerct,
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
            'contact_ch' => 'required',
            'contact_en' => 'required',
            'contact_kh' => 'required',
            'contact_th' => 'required',
        ], [
            'contact_ch.required' => 'Please input footer contact in Chinese',
            'contact_en.required' => 'Please input footer contact in English',
            'contact_kh.required' => 'Please input footer contact in Khmer',
            'contact_th.required' => 'Please input footer contact in Thai',
        ]);

        $footercontact = FooterContact::find($id);
        $footercontact->contact_ch = $request->contact_ch;
        $footercontact->contact_en = $request->contact_en;
        $footercontact->contact_kh = $request->contact_kh;
        $footercontact->contact_th = $request->contact_th;
        $footercontact->update();

        return redirect(route('admin.footer.index'));
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
    
    public function footersm_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'social_media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_media_link' => 'required',
        ], [
            'social_media.required' => 'Please upload your social media logo',
            'social_media_link.required' => 'Please upload social media url link',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $smlogo = new FooterSocialMedia();
            if ($request->hasFile('social_media')) {
                $file = $request->file('social_media');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/socialmedia/', $filename);
                $smlogo->logo = $filename;
            }

            $footersm = new FooterSocialMedia();
            $footersm->social_media = $filename;
            $footersm->social_media_link = $request->social_media_link;
            $footersm->save();
            return response()->json(['status' => 1, 'msg' => 'Footer social media create successfully']);
        }
    }

    public function footersm_destroy($id)
    {
        $sm = FooterSocialMedia::find($id);

        $image_path = 'upload/socialmedia/' . $sm->social_media;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $sm->delete();
        return back()->with('smDelete', 'You have delete a social media');
    }

    public function footerqrcode_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_title' => 'required',
            'qrcode' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qrcode_link' => 'required',
        ], [
            'app_title.required' => 'Please upload your qrcode title',
            'qrcode.required' => 'Please upload your qrcode logo',
            'qrcode_link.required' => 'Please upload qrcode url link',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $qrcodelogo = new FooterSocialMedia();
            if ($request->hasFile('qrcode')) {
                $file = $request->file('qrcode');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/qrcode/', $filename);
                $qrcodelogo->logo = $filename;
            }

            $footerqrcode = new FooterQrcode();
            $footerqrcode->app_title = $request->app_title;
            $footerqrcode->qrcode = $filename;
            $footerqrcode->qrcode_link = $request->qrcode_link;
            $footerqrcode->save();
            return response()->json(['status' => 1, 'msg' => 'Footer social media create successfully']);
        }
    }

    public function footerqrcode_destroy($id)
    {
        $qrcode = FooterQrcode::find($id);

        $image_path = 'upload/qrcode/' . $qrcode->qrcode;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $qrcode->delete();
        return back()->with('qrcodeDelete', 'You have delete a social media');
    }
}

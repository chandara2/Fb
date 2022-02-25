<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContact;
use Illuminate\Http\Request;
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
        return view('admin.footerct', [
            'footercontact' => $footercontact,
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
        $footercontact = FooterContact::find($id);
        return view('admin.footerct_edit', [
            'footercontact' => $footercontact,
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
}

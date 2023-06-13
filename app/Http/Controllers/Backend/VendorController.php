<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class VendorController extends Controller
{

    public function index()
    {
        $vendor = Vendor::latest()->get();
        return view('backend.vendor.index', compact('vendor'));


    }


    public function create()
    {
        return view('backend.vendor.create');
    }


    public function store(Request $request)
    {
        // dd($request);
        // slug insert
        $slug_en  = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->shop_name)));

        // slug image shop_profile
        $image = $request->file('shop_profile');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
        $shop_profile = 'upload/vendor/'.$name_gen;

        // slug image shop_cover
        $image = $request->file('shop_cover');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
        $shop_cover = 'upload/vendor/'.$name_gen;

        // slug image nid
        $image = $request->file('nid');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
        $nid = 'upload/vendor/'.$name_gen;

        // slug image trade_license
        $image = $request->file('trade_license');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
        $trade_license = 'upload/vendor/'.$name_gen;

        $uset_id = Auth::guard('admin')->user()->id;

        // Date insert
        Vendor::insert([
           'shop_name' => $request->shop_name,
           'user_id' => $uset_id,
           'slug' => $slug_en,
           'phone' => $request->phone,
           'email' => $request->email,
           'fb_url' => $request->fb_url,
           'bank_account' => $request->bank_account,
           'bank_name' => $request->bank_name,
           'holder_name' => $request->holder_name,
           'branch_name' => $request->branch_name,
           'routing_name' => $request->routing_name,
           'address' => $request->address,
           'commission' => $request->commission,
           'description' => $request->description,
           'status' => $request->status,

           'shop_profile' => $shop_profile,
           'shop_cover' => $shop_cover,
           'nid' => $nid,
           'trade_license' => $trade_license,

           'created_at' => Carbon::now(),
       ]);
       Session::flash('success', 'Vendor Inserted Successfully');
       return redirect()->route('vendor.index');
    }



    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('backend.vendor.edit', compact('vendor'));
    }


    public function update(Request $request, $id)
    {

        $vendor = Vendor::find($id);
        // slug insert
        $slug_en  = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->shop_name)));
        $uset_id = Auth::guard('admin')->user()->id;

        // shop Profile
        if($request->hasfile('shop_profile')){
            try {
                if(file_exists($vendor->shop_profile)){
                    unlink($vendor->shop_profile);
                }
            } catch (Exception $e) {

            }

            // slug image shop_profile
            $image = $request->file('shop_profile');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
            $shop_profile = 'upload/vendor/'.$name_gen;
        }else{
            $shop_profile = $vendor->shop_profile;
        }

        // shop shop_cover
        if($request->hasfile('shop_cover')){
            try {
                if(file_exists($vendor->shop_cover)){
                    unlink($vendor->shop_cover);
                }
            } catch (Exception $e) {

            }

            // slug image shop_cover
            $image = $request->file('shop_cover');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
            $shop_cover = 'upload/vendor/'.$name_gen;
        }else{
            $shop_cover = $vendor->shop_cover;
        }

        // shop nid
        if($request->hasfile('nid')){
            try {
                if(file_exists($vendor->nid)){
                    unlink($vendor->nid);
                }
            } catch (Exception $e) {

            }

            // slug image nid
            $image = $request->file('nid');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
            $nid = 'upload/vendor/'.$name_gen;
        }else{
            $nid = $vendor->nid;
        }

        // shop trade_license
        if($request->hasfile('trade_license')){
            try {
                if(file_exists($vendor->trade_license)){
                    unlink($vendor->trade_license);
                }
            } catch (Exception $e) {

            }

            // slug image trade_license
            $image = $request->file('trade_license');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(324,346)->save('upload/vendor/'.$name_gen);
            $trade_license = 'upload/vendor/'.$name_gen;
        }else{
            $trade_license = $vendor->trade_license;
        }




        Vendor::find($id)->update([
            'shop_name' => $request->shop_name,
           'user_id' => $uset_id,
           'slug' => $slug_en,
           'phone' => $request->phone,
           'email' => $request->email,
           'fb_url' => $request->fb_url,
           'bank_account' => $request->bank_account,
           'bank_name' => $request->bank_name,
           'holder_name' => $request->holder_name,
           'branch_name' => $request->branch_name,
           'routing_name' => $request->routing_name,
           'address' => $request->address,
           'commission' => $request->commission,
           'description' => $request->description,
           'status' => $request->status,

           'shop_profile' => $shop_profile,
           'shop_cover' => $shop_cover,
           'nid' => $nid,
           'trade_license' => $trade_license,

           'updated_at' => Carbon::now(),
        ]);

        Session::flash('success', 'Vendor Update Successfully');
        return redirect()->route('vendor.index');

    }


    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        unlink($vendor->shop_profile);
        unlink($vendor->shop_cover);
        unlink($vendor->nid);
        unlink($vendor->trade_license);
        $vendor->delete();
        Session::flash('warning', 'Vendor Delete Successfully');
        return redirect()->back();
    }

    public function active($id){

        $vendor = Vendor::find($id);
        $vendor->status = 1;
        $vendor->save();

        Session::flash('success','vendor Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $vendor = Vendor::find($id);
        $vendor->status = 0;
        $vendor->save();

        Session::flash('success','vendor Disabled Successfully.');
        return redirect()->back();
    }

    public function view($id){
        $vendor = Vendor::find($id);
        return view('backend.vendor.view', compact('vendor'));
    }

}

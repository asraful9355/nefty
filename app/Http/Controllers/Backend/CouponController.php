<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class CouponController extends Controller
{

    public function index()
    {
        $coupon = Coupon::latest()->get();
        return view('backend.coupon.index', compact('coupon'));
    }


    public function create()
    {
        return view('backend.coupon.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->first();

        if($coupon){
            Session::flash('warning','Coupon already Created.');
            return redirect()->back();
        }else{
            $coupon = Coupon::insert([
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount'=>$request->coupon_discount,
                'coupon_validity' => $request->coupon_validity,
                'created_at' => Carbon::now()
            ]);
        }

        Session::flash('success','Coupon Inserted Successfully.');
        return redirect()->route('coupon.index');
    }




    public function edit($id)
    {
        $coupons = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupons'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Coupon Updated Successfully');
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id){

        $coupon = Coupon::find($id);
        $coupon->status = 1;
        $coupon->save();

        Session::flash('success','coupon Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $coupon = Coupon::find($id);
        $coupon->status = 0;
        $coupon->save();

        Session::flash('success','coupon Disabled Successfully.');
        return redirect()->back();
    }

    public function view($id){
        $coupon = Coupon::find($id);
        return view('backend.coupon.view', compact('coupon'));
    }
}

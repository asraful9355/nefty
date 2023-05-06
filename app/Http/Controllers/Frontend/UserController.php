<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Order;
use App\Models\Orderdetail;
use Auth;
use DB;
use Session;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* ============= Dashboard & user orders ============= */
    public function index(){
        return view('dashboard');
    }

    /* ============= Order View ============= */
    public function orderView($invoice_no){
        // $order = Order::where('user_id',Auth::id())->orderBy('id','DESC')->first();
        $order = Order::where('invoice_no', $invoice_no)->first();
        // $orders = Order::with('address_id')->where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.order.order_view', compact('order'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

    // User Logout
    public function UserLogout(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Mehtod

    // Show User Password Change Page
    public function UserProfileIndex()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('frontend.user.profile_view',compact('adminData'));
    }

    /* =============== Start StoreProfile Method ================*/
    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->about_us = $request->about_us;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->linkedin = $request->linkedin;
        $data->whatsapp = $request->whatsapp;
        $data->youtube = $request->youtube;
        $data->website = $request->website;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    // // User Password Change
    // public function UserUpdatePassword(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required',
    //         'confirm_password' => 'required|same:new_password',
    //     ]);

    //     // dd($request->all());
    //     $hashedPassword = Auth::guard('web')->user()->password;
    //     // dd($hashedPassword);
    //     if (Hash::check($request->old_password,$hashedPassword )) {
    //         $id = Auth::guard('web')->user()->id;
    //         $user = User::find($id);
    //         $user->password = bcrypt($request->new_password);
    //         $user->save();

    //         $notification = array(
    //             'message' => 'Password Updated Successfully.',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->back()->with($notification);
    //     }else{
    //         $notification = array(
    //             'message' => 'Old password is not match.',
    //             'alert-type' => 'error'
    //         );
    //         return redirect()->back()->with($notification);
    //     }
    // }

    // Show User Password Change Page
    public function UserChangePassword()
    {
        return view('frontend.user.password_change_view');
    }

    // User Password Change
    public function UserUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'

        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => "Old Password Doesn't Match!!.",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        $notification = array(
            'message' => 'Password Changed Successfully.',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);

    } // End Mehtod

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* ========== User Address Index Page Show ==========*/
    public function UserAddress(){
        return view('frontend.user.user_address_view');
    }

}

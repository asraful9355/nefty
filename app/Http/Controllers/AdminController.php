<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use Artisan;
use Cache;

class AdminController extends Controller
{
    /*=================== Start Index Login Methoed ===================*/
    public function Index(){

        if(Auth::check()){
            abort(404);
        }

    	return view('backend.admin.admin_login');
    } // end method

    /*=================== End Index Login Methoed ===================*/

    /*=================== Start Dashboard Methoed ===================*/
    public function Dashboard(){

    	return view('backend.admin.dashboard');
    } // end method

    /*=================== End Dashboard Methoed ===================*/

    /*=================== Start Admin Login Methoed ===================*/
    public function Login(Request $request){

    	$this->validate($request,[
    		'email' =>'required',
    		'password' =>'required'
    	]);

    	// dd($request->all());
    	$check = $request->all();
    	if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password'=> $check['password'] ])){

            if(Auth::guard('admin')->user()->role == "1" || Auth::guard('admin')->user()->role == "5"){
                return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully.');
            }else{
                $notification = array(
                    'message' => 'Invaild Email Or Password.',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }

    	}else{
            $notification = array(
                'message' => 'Invaild Email Or Password.',
                'alert-type' => 'error'
            );
    		return back()->with($notification);
    	}

    } // end method

    /*=================== End Admin Login Methoed ===================*/

    /*=================== Start Logout Methoed ===================*/
    public function AminLogout(Request $request){

    	Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Admin Logout Successfully.',
            'alert-type' => 'success'
        );
    	return redirect()->route('login_form')->with($notification);
    } // end method
    /*=================== End Logout Methoed ===================*/

    /*=================== Start AdminRegister Methoed ===================*/
    public function AdminRegister(){

    	return view('admin.admin_register');
    } // end method
    /*=================== End AdminRegister Methoed ===================*/

     /*=================== Start AdminForgotPassword Methoed ===================*/
    public function AdminForgotPassword(){

        return view('backend.admin.admin_forgot_password');
    } // end method
    /*=================== End AdminForgotPassword Methoed ===================*/

    /*=================== Start AdminRegisterStore Methoed ===================*/
    public function AdminRegisterStore(Request $request){

    	$this->validate($request,[
    		'name' =>'required',
    		'email' =>'required',
    		'password' =>'required',
    		'password_confirmation' =>'required'
    	]);
    	// dd($request->all());
    	User::insert([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'created_at' => Carbon::now(),
    	]);
    	return redirect()->route('login_form')->with('success','Admin Created Successfully.');
    } // end method
    /*=================== End AdminRegisterStore Methoed ===================*/

    /* =============== Start Profile Method ================*/
    public function Profile(){
        $id = Auth::guard('admin')->user()->id;
        $adminData = User::find($id);

        // dd($adminData);
        return view('backend.admin.admin_profile_view',compact('adminData'));

    }// End Method

    /* =============== Start EditProfile Method ================*/
    public function EditProfile(){

        $id = Auth::guard('admin')->user()->id;
        $editData = User::find($id);
        return view('backend.admin.admin_profile_edit',compact('editData'));
    }//

     /* =============== Start StoreProfile Method ================*/
    public function StoreProfile(Request $request){
        $id = Auth::guard('admin')->user()->id;
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
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    /* =============== Start ChangePassword Method ================*/
    public function ChangePassword(){

        return view('backend.admin.admin_change_password');

    }//

    /* =============== Start UpdatePassword Method ================*/
    public function UpdatePassword(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);



        // Match The Old Password
        if (!Hash::check($request->old_password,  auth::guard('admin')->user()->password)) {
            $notification = array(
                'message' => "Old Password Doesn't Match!!",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update The new password
        User::whereId(auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        $notification = array(
            'message' => "Password Changed Successfully",
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }// End Method

    /* =============== Start clearCache Method ================*/
    function clearCache(Request $request){
        Artisan::call('optimize:clear');
        Session::flash('success','Cache cleared successfully.');
        return redirect()->back();
    } // end method

    /* =============== End clearCache Method ================*/
}

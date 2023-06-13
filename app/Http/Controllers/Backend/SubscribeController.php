<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
use Illuminate\Support\Carbon;
use Session;

class SubscribeController extends Controller
{

    public function index()
    {
        $subscribes = Subscribe::latest()->get();
        return view('backend.subscribe.index', compact('subscribes'));
    }

    public function store(Request $request)
    {
        $subscriber = Subscribe::where('email', $request->email)->first();
        if($subscriber == null){
            $subscriber = new Subscribe;
            $subscriber->email = $request->email;
            $subscriber->created_at = Carbon::now();
            $subscriber->save();

            Session::flash('success','You have subscribed successfully.');
            return back();
        }
        else{
            $notification = array(
                'message' => 'You are  already a subscriber.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function destroy($id)
    {
        $subscribe = Subscribe::findOrfail($id);
        $subscribe->delete();

        Session::flash('success', 'Subscribe Deleted Successfully.');
        return redirect()->back();
    }
}

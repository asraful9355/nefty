<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Carbon;
use Session;


class PagesController extends Controller
{

    public function index()
    {

        $pages = Pages::all();
       return view('backend.pages.index',compact('pages'));
    }


    public function create()
    {
        return view('backend.pages.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'name_en' => 'required',
            'description_en' => 'required',
        ]);

        $pages = new Pages();
        $pages->title = $request->title;

        $pages->name_en = $request->name_en;
        if($request->name_bn == ''){
            $pages->name_bn = $request->name_en;
        }else{
            $pages->name_bn = $request->name_bn;
        }

        $pages->description_en = $request->description_en;
        if($request->description_bn == ''){
            $pages->description_bn = $request->description_en;
        }else{
            $pages->description_bn = $request->description_bn;
        }

        $pages->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));
        if($request->status == Null){
            $request->status = 0;
        }
        $pages->status = $request->status;
        $pages->position = $request->position;
        $pages->created_at = Carbon::now();

        $pages->save();

        Session::flash('success','Pages Inserted Successfully');
        return redirect()->route('pages.index');
    }


    public function view($id)
    {  $page = Pages::find($id);
       return view('backend.pages.view',compact('page'));
    }


    public function edit($id)
    {  $page = Pages::find($id);
       return view('backend.pages.edit',compact('page'));
    }


    public function update(Request $request, $id)
    {
        $pages = Pages::find($id);
        $pages->title = $request->title;

        $pages->name_en = $request->name_en;
        if($request->name_bn == ''){
            $pages->name_bn = $request->name_en;
        }else{
            $pages->name_bn = $request->name_bn;
        }

        $pages->description_en = $request->description_en;
        if($request->description_bn == ''){
            $pages->description_bn = $request->description_en;
        }else{
            $pages->description_bn = $request->description_bn;
        }

        $pages->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));
        if($request->status == Null){
            $request->status = 0;
        }
        $pages->status = $request->status;
        $pages->position = $request->position;
        $pages->created_at = Carbon::now();

        $pages->save();

        Session::flash('success','Pages Updated Successfully');
        return redirect()->route('pages.index');
    }

    
    public function delete($id)
    {
        $page = Pages::find($id);
        $page->delete();

        $notification = array(
            'message' => 'Pages Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function active($id){
        $page = Pages::find($id);
        $page->status = 1;
        $page->save();

        Session::flash('success','Pages Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $page = Pages::find($id);
        $page->status = 0;
        $page->save();

        Session::flash('success','Pages Disabled Successfully.');
        return redirect()->back();
    }
}

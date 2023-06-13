<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Session;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index',compact('sliders'));
    }


    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_en' => 'required|string|max:22',
            'title_bn' => 'nullable|string|max:22',
            'slider_url' => 'required',
            'description_en' => 'required|string',
            'description_bn' => 'nullable|string',
            'slider_img' => 'required',
        ]);

         if($request->hasfile('slider_img')){
            $image = $request->slider_img;
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
        }else{
            $save_url = '';
        }

        $slider = new slider();
        $slider->title_en = $request->title_en;

        if($request->title_bn == ''){
            $slider->title_bn = $request->title_en;
        }else{
            $slider->title_bn = $request->title_bn;
        }

        $slider->description_en = $request->description_en;
        if($request->description_bn == ''){
            $slider->description_bn = $request->description_en;
        }else{
            $slider->description_bn = $request->description_bn;
        }

        $slider->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title_en)));
        if($request->status == Null){
            $request->status = 0;
        }
        $slider->status = $request->status;
        $slider->slider_img = $save_url;
        $slider->created_at = Carbon::now();

        $slider->save();

        Session::flash('success','Slider Inserted Successfully');
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.edit',compact('slider'));
    }
    public function view($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.view',compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        $this->validate($request,[
            'title_en' => 'required|string|max:22',
            'title_bn' => 'nullable|string|max:22',
            'slider_url' => 'required',
            'description_en' => 'required|string',
            'description_bn' => 'nullable|string',
        ]);

        if($request->hasfile('slider_img')){
            try {
                if(file_exists($slider->slider_img)){
                    unlink($slider->slider_img);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save('upload/slider/'.$name_gen);
            $slider_img = 'upload/slider/'.$name_gen;
        }else{
            $slider_img = $slider->slider_img;
        }




        $slider->title_en = $request->title_en;
        if($request->title_bn == ''){
            $slider->title_bn = $request->title_en;
        }else{
            $slider->title_bn = $request->title_bn;
        }

        $slider->description_en = $request->description_en;
        if($request->description_bn == ''){
            $slider->description_bn = $request->description_en;
        }else{
            $slider->description_bn = $request->description_bn;
        }

       if($request->status == Null){
            $request->status = 0;
        }
        $slider->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name_en)));

        $slider->status = $request->status;

        $slider->slider_img = $slider_img;
        $slider->slider_url = $request->slider_url;

        $slider->created_at = Carbon::now();

        $slider->save();

        Session::flash('success','Slider Updated Successfully');
        return redirect()->route('slider.index');
    }

    public function delete($id)
    {

        $slider = Slider::findOrFail($id);

        try {
            if(file_exists($slider->slider_img)){
                unlink($slider->slider_img);
            }
        } catch (Exception $e) {

        }

        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function active($id){
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();

        Session::flash('success','Slider Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();

        Session::flash('success','Slider Disabled Successfully.');
        return redirect()->back();
    }
}

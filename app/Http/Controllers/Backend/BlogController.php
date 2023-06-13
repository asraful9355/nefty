<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
use Session;

class BlogController extends Controller
{

    public function index()
    {
        $blog = Blog::latest()->get();
        return view('backend.blog.index', compact('blog'));
    }


    public function create()
    {
        return view('backend.blog.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_title_en' => 'required',
            'blog_image' => 'required',
            'blog_description_en' => 'required',
        ]);

        if($request->hasfile('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,520)->save('upload/blog/'.$name_gen);
            $blog_image = 'upload/blog/'.$name_gen;
        }else{
            $blog_image = $request->blog_images;
        }

        $blog = new Blog;

        $blog->blog_title_en = $request->blog_title_en;
        $blog->blog_description_en = $request->blog_description_en;

        if($request->blog_title_bn == ''){
            $blog->blog_title_bn = $request->blog_title_en;
        }else{
            $blog->blog_title_bn = $request->blog_title_bn;
        }

        if($request->blog_description_bn == ''){
            $blog->blog_description_bn = $request->blog_description_en;
        }else{
            $blog->blog_description_bn = $request->blog_description_bn;
        }

        if($request->status == Null){
            $request->status = 0;
        }
        $blog->blog_slug_en = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->blog_title_en)));
        $blog->status = $request->status;
        $blog->blog_image = $blog_image;
        $blog->created_at = Carbon::now();
        $blog->save();


        Session::flash('success','blog Inserted Successfully');
        return redirect()->route('blog.index');
    }




    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('backend.blog.edit', compact('blog'));


    }

    
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        if($request->hasfile('blog_image')){
            try {
                if(file_exists($blog->blog_image)){
                    unlink($blog->blog_image);
                }
            } catch (Exception $e) {

            }

            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,520)->save('upload/blog/'.$name_gen);
            $blog_image = 'upload/blog/'.$name_gen;
        }else{
            $blog_image = $blog->blog_image;
        }

        $blog->blog_title_en = $request->blog_title_en;
        $blog->blog_description_en = $request->blog_description_en;

        if($request->blog_description_bn == ''){
            $blog->blog_description_bn = $request->blog_description_en;
        }else{
            $blog->blog_description_bn = $request->blog_description_bn;
        }

        if($request->status == Null){
            $request->status = 0;
        }
        $blog->blog_slug_en = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->blog_title_en)));
        $blog->status = $request->status;
        $blog->blog_image =$blog_image ;

        $blog->updated_at = Carbon::now();

        $blog->save();

        Session::flash('success','blog Updated Successfully');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog_image = $blog->blog_image;
        unlink($blog_image);
        $blog->delete();
        Session::flash('warning', 'blog Delete Successfully');
        return redirect()->back();

    }

    public function active($id){

        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();

        Session::flash('success','blog Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();

        Session::flash('success','blog Disabled Successfully.');
        return redirect()->back();
    }

    public function view($id){
        $blog = Blog::find($id);
        return view('backend.blog.view', compact('blog'));
    }
}

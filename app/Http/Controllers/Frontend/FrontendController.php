<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use App\Models\Slider;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Pages;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Subscribe;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(Request $request)
    {
        $products = Product::where('status',1)->orderBy('id','DESC')->get();

        $latest_news = Blog::where('status', 1)->orderBy('id', 'DESC')->get();

        $sliders = Slider::where('status',1)->orderBy('id', 'DESC')->limit(3)->get();
        $brands = Brand::where('status',1)->orderBy('id', 'DESC')->get();
        $banners = Banner::where('status',1)->orderBy('id', 'DESC')->get();
        $featured_category =  Category::where('featured_category',1)->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('status',1)->where('is_deals',1)->latest()->take(4)->get();

        $ashraful = User::all();

        $home_view = 'frontend.home';
        return view($home_view,compact('sliders','brands','products','latest_news','banners','featured_category','hot_deals','ashraful'));
    } // end method
    /*=================== End Index Methoed ===================*/

    /*=================== Start ProductDetails Methoed ===================*/
    public function productDetails($slug){

        $product = Product::where('slug', $slug)->first();
        // dd($product);
        $multiImg = MultiImg::where('product_id',$product->id)->get();
        // dd($multiImg);

        /* ================= Product Color Eng ================== */
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        /* ================= Product Size Eng =================== */
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        /* ================= Realted Product =============== */
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$product->id)->orderBy('id','DESC')->get();

        $categories = Category::orderBy('category_name_en','ASC')->where('status','=',1)->limit(5)->get();
        $new_products = Product::orderBy('name_en')->where('status','=',1)->limit(3)->latest()->get();

        return view('frontend.product.product_details', compact('product','multiImg','categories','new_products','product_color_en','product_size_en','relatedProduct'));
    }
    /*=================== End ProductDetails Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageAbout($slug){
        $page = Pages::where('slug', $slug)->first();
        return view('frontend.settings.page.index',compact('page'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    public function SubsStore(Request $request){
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


    /* ================= Start ProductViewAjax Method ================= */
    public function ProductViewAjax($id){

        $product = Product::with('category','brand')->findOrFail($id);
        //dd($product);
        $attribute_values = json_decode($product->attribute_values);

        $attributes = new Collection;
        foreach($attribute_values as $key => $attribute_value){
            $attr = Attribute::select('id','name')->where('id',$attribute_value->attribute_id)->first();
            // $attribute->name = $attr->name;
            // $attribute->id = $attr->id;
            $attr->values = $attribute_value->values;
            $attributes->add($attr);
        }


        return response()->json(array(
            'product' => $product,
            'attributes' => $attributes,
        ));
    }
    /* ================= END PRODUCT VIEW WITH MODAL METHOD =================== */

    /* ================= Start Product Search =================== */
    public function ProductSearch(Request $request){

        $request->validate(["search" => "required"]);

        $item = $request->search;
        $category_id = $request->searchCategory;
        // echo "$item";

        // Header Category Start //
        $categories = Category::orderBy('category_name_en','DESC')->where('status', 1)->get();
        if($category_id == 0){
            $products = Product::where('name_en','LIKE',"%$item%")->where('status'
            , 1)->latest()->get();
        }else{
            $products = Product::where('name_en','LIKE',"%$item%")->where('category_id', $category_id)->where('status'
            , 1)->latest()->get();
        }

        $attributes = Attribute::orderBy('name', 'DESC')->where('status', 1)->latest()->get();

        return view('frontend.product.search',compact('products','categories','attributes'));

    } // end method 

    /* ================= End Product Search =================== */

    /* ================= Start Advance Product Search =================== */
    public function advanceProduct(Request $request){

        // return $request;

        $request->validate(["search" => "required"]);

        $item = $request->search;
        $category_id = $request->category;
        // echo "$item";

        // Header Category Start //
        $categories = Category::orderBy('category_name_en','DESC')->where('status', 1)->get();

        if($category_id == 0){
            $products = Product::where('name_en','LIKE',"%$item%")->where('status'
            , 1)->latest()->get();
        }else{
            $products = Product::where('name_en','LIKE',"%$item%")->where('category_id', $category_id)->where('status'
            , 1)->latest()->get();
        }

        $attributes = Attribute::orderBy('name', 'DESC')->where('status', 1)->latest()->get();

        return view('frontend.product.advance_search',compact('products','categories','attributes'));

    } // end method 

    /* ================= End Advance Product Search =================== */

    /* ================= Start CatWiseProduct Method ================ */
    public function CatWiseProduct(Request $request,$slug){

        $category = Category::where('slug', $slug)->first();
        // dd($category);
        
        $products = Product::where('status', 1)->where('category_id',$category->id)->orderBy('id','DESC')->latest()->paginate(8);

        return view('frontend.product.category_view',compact('products','category'));
    } // end method
    /* ========== End CatWiseProduct Method ======== */

    /* ========== Start SubCatWiseProduct Method ======== */
    public function SubCatWiseProduct($slug){

        $subcategory = Subcategory::where('slug', $slug)->first();
        $products = Product::where('status','=',1)->where('subcategory_id',$subcategory->id)->orderBy('id','DESC')->paginate(8);

        return view('frontend.product.subcategory_view',compact('products','subcategory'));
    } // end method
    /* ========== End SubCatWiseProduct Method ======== */

    /* ========== Start SubCatWiseProduct Method ======== */
    public function ChildCatWiseProduct($slug){

        $subsubcategory = Subsubcategory::where('slug', $slug)->first();
        $products = Product::where('status','=',1)->where('subsubcategory_id',$subsubcategory->id)->orderBy('id','DESC')->paginate(8);

        return view('frontend.product.childcategory_view',compact('products','subsubcategory'));
    } // end method
    /* ========== End SubCatWiseProduct Method ======== */

     /* ================= Start Hot Deals Page Show =================== */
    public function hotDeals(Request $request){

        // Hot deals product
        $products = Product::where('status',1)->where('is_deals',1)->paginate(10);

        return view('frontend.deals.hot_deals',compact('products'));

    } // end method 


}

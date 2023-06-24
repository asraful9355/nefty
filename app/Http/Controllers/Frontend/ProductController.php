<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // Start Shop Product //
        $products = Product::orderBy('id', 'ASC')->where('status', 1)->latest()->paginate(6);
        // Start Attribute Product //
        $products_attr = Product::orderBy('name_en', 'ASC')->where('status', 1)->latest()->get();
        $featured_category =  Category::orderBy('category_name_en','ASC')->where('featured_category',1)->where('status', 1)->latest()->get();
        $brands =  Brand::orderBy('brand_name_en','ASC')->where('status', 1)->latest()->get();
        // dd($featured_category);

        return view('frontend.product.product_shop', compact('products','featured_category','brands','products_attr'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $varient
     * @return \Illuminate\Http\Response
     */
    public function getVarient($id, $varient)
    {
        $stock = ProductStock::where('product_id', $id)->where('varient', $varient)->first();
        if($stock){
            return $stock->price;
        }else{
            return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
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

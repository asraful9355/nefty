<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Supplier;
use App\Models\Campaing;
use App\Models\CampaingProduct;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductStock;
use Carbon\Carbon;
use Image;
use Session;
use Illuminate\Support\Str;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::latest()->get();
        $subcategories =  Subcategory::latest()->get();
        $subsubcategories =  Subsubcategory::latest()->get();
        $brands = Brand::latest()->get();
        $vendors = Vendor::latest()->get();
        $suppliers = Supplier::latest()->get();
        $campaings = Campaing::latest()->get();
        $attributes = Attribute::latest()->get();

        return view('backend.product.create', compact('categories','subcategories','subsubcategories','brands','vendors','suppliers','campaings','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_en'           => 'required|max:150',
            'purchase_price'    => 'required|nullable',
            'wholesell_price'   => 'nullable|numeric',
            'discount_price'    => 'nullable|numeric',
            'regular_price'     => 'required|numeric',
            'stock_qty'         => 'required|integer',
            'description_en'    => 'nullable|string',
            'category_id'       => 'required|integer',
            'brand_id'          => 'required|integer',
            'product_thumbnail' => 'required|file',
        ]);

        // dd($request->all());

        if(!$request->name_bn){
            $request->name_bn = $request->name_en;
        }

        if(!$request->description_bn){
            $request->description_bn = $request->description_en;
        }

        $slug = strtolower(str_replace(' ', '-', $request->name_en));

        if($request->is_featured == null){
            $request->is_featured = 0;
        }

        if($request->is_deals == null){
            $request->is_deals = 0;
        }

        if($request->is_digital == null){
            $request->is_digital = 0;
        }

        if($request->status == null){
            $request->status = 0;
        }

        if($request->hasfile('product_thumbnail')){
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(438,438)->save('upload/products/thumbnails/'.$name_gen);
            $save_url = 'upload/products/thumbnails/'.$name_gen;
        }else{
            $save_url = '';
        }

        $product = Product::create([
            'brand_id'              => $request->brand_id,
            'category_id'           => $request->category_id,
            'subcategory_id'        => $request->subcategory_id,
            'subsubcategory_id'     => $request->subsubcategory_id,
            'vendor_id'             => $request->vendor_id,
            'supplier_id'           => $request->supplier_id,
            'campaing_id'           => $request->campaing_id,
            'name_en'               => $request->name_en,
            'name_bn'               => $request->name_bn,
            'slug'                  => $slug,
            'purchase_price'        => $request->purchase_price,
            'wholesell_price'       => $request->wholesell_price,
            'wholesell_minimum_qty' => $request->wholesell_minimum_qty,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
            'discount_type'         => $request->discount_type,
            'product_code'          => rand(10000,99999),
            'minimum_buy_qty'       => $request->minimum_buy_qty,
            'stock_qty'             => $request->stock_qty,
            'description_en'        => $request->description_en,
            'description_bn'        => $request->description_bn,
            'is_featured'           => $request->is_featured,
            'is_deals'              => $request->is_deals,
            'is_digital'            => $request->is_digital,
            'status'                => $request->status,
            'product_thumbnail'     => $save_url,
            'created_by'            => Auth::guard('admin')->user()->id,
        ]);

        // dd($product);

        /* ========= Start Multiple Image Upload ========= */
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([
                'product_id' => $product->id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),


            ]);

        }
        /* ========= End Multiple Image Upload ========= */

        /* ========= Product Attributes Start ========= */
        $attribute_values = array();
        if($request->has('choice_attributes')){
            foreach ($request->choice_attributes as $key => $attribute)
            {
                $atr = 'choice_options'.$attribute;
                $item['attribute_id'] = $attribute;
                $data = array();

                foreach ($request[$atr] as $key => $value) {
                    array_push($data, $value);
                }

                $item['values'] = $data;
                array_push($attribute_values, $item);
            }
        }

        if (!empty($request->choice_attributes)) {
            $product->attributes = json_encode($request->choice_attributes);
            $product->is_varient = 1;

            if($request->has('vnames')){
                $i = 0;
                foreach ($request->vnames as $key => $name){
                    $stock = ProductStock::create([
                        'product_id' => $product->id,
                        'varient'    => $name,
                        'sku'        => $request->vskus[$i],
                        'price'      => $request->vprices[$i],
                        'qty'        => $request->vqtys[$i],
                    ]);

                    $image = $request->vimages[$i];
                    if($image){
                        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(438,438)->save('upload/products/variations/'.$name_gen);
                        $save_url = 'upload/products/variations/'.$name_gen;
                    }else{
                        $save_url = '';
                    }

                    $stock->image = $save_url;
                    $stock->save();

                    $i++;
                }
            }
        }
        else {
            $product->attributes = json_encode(array());
        }

        $attr_values = collect($attribute_values);
        $attr_values_sorted = $attr_values->sortByDesc('attribute_id');

        $sorted_array = array();
        foreach($attr_values_sorted as $attr){
            array_push($sorted_array, $attr);
        }

        $product->attribute_values = json_encode($sorted_array, JSON_UNESCAPED_UNICODE);
        /* ========= End Product Attributes ========= */

        /* =========== Start Product Tags =========== */
        $product->tags = implode(',', $request->tags);
        /* =========== End Product Tags =========== */

        $product->save();

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories =  Category::latest()->get();
        $subcategories =  Subcategory::latest()->get();
        $subsubcategories =  Subsubcategory::latest()->get();
        $brands = Brand::latest()->get();
        $vendors = Vendor::latest()->get();
        $suppliers = Supplier::latest()->get();
        $campaings = Campaing::latest()->get();
        $attributes = Attribute::latest()->get();

        return view('backend.product.edit',compact('categories','subcategories','subsubcategories','vendors','suppliers','brands','attributes','product','multiImgs','campaings'));
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
        $product = Product::find($id);

        $this->validate($request,[
            'name_en'           => 'required|max:150',
            'purchase_price'    => 'required|numeric',
            'wholesell_price'   => 'nullable|numeric',
            'discount_price'    => 'nullable|numeric',
            'regular_price'     => 'required|numeric',
            'stock_qty'         => 'required|integer',
            'description_en'    => 'nullable|string',
            'category_id'       => 'required|integer',
            'brand_id'          => 'required|integer',
        ]);

        if(!$request->name_bn){
            $request->name_bn = $request->name_en;
        }

        if(!$request->description_bn){
            $request->description_bn = $request->description_en;
        }

        $slug = strtolower(str_replace(' ', '-', $request->name_en));

        if($request->is_featured == null){
            $request->is_featured = 0;
        }

        if($request->is_deals == null){
            $request->is_deals = 0;
        }

        if($request->is_digital == null){
            $request->is_digital = 0;
        }

        if($request->status == null){
            $request->status = 0;
        }

        /* ============= Start Product Thumbnail Image Updated ========== */
        if($request->hasfile('product_thumbnail')){
            try {
                if(file_exists($product->product_thumbnail)){
                    unlink($product->product_thumbnail);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(438,438)->save('upload/products/thumbnails/'.$name_gen);
            $save_url = 'upload/products/thumbnails/'.$name_gen;
        }else{
            $save_url = $product->product_thumbnail;
        }
        /* ============= End Product Thumbnail Image Updated ========== */

        $product->update([
            'brand_id'              => $request->brand_id,
            'category_id'           => $request->category_id,
            'subcategory_id'        => $request->subcategory_id,
            'subsubcategory_id'     => $request->subsubcategory_id,
            'vendor_id'             => $request->vendor_id,
            'supplier_id'           => $request->supplier_id,
            'campaing_id'           => $request->campaing_id,
            'name_en'               => $request->name_en,
            'name_bn'               => $request->name_bn,
            'slug'                  => $slug,
            'purchase_price'        => $request->purchase_price,
            'wholesell_price'       => $request->wholesell_price,
            'wholesell_minimum_qty' => $request->wholesell_minimum_qty,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
            'discount_type'         => $request->discount_type,
            'minimum_buy_qty'       => $request->minimum_buy_qty,
            'stock_qty'             => $request->stock_qty,
            'description_en'        => $request->description_en,
            'description_bn'        => $request->description_bn,
            'is_featured'           => $request->is_featured,
            'is_deals'              => $request->is_deals,
            'is_digital'            => $request->is_digital,
            'status'                => $request->status,
            'product_thumbnail'     => $save_url,
            'created_by'            => Auth::guard('admin')->user()->id,
        ]);

        /* ========= Start Product Previous Stock  ========= */
        $product_stocks = $product->stocks;
        if(count( $product_stocks) > 0 ) {
            if($request->is_variation_changed){
                foreach( $product_stocks as $stock ) {
                    unlink($stock->image);
                    $stock->delete();
                }
            }else{

                foreach( $product_stocks as $stock ) {
                    $variant = $stock->id."_variant";
                    $price = $stock->id."_price";
                    $sku = $stock->id."_sku";
                    $qty = $stock->id."_qty";
                    $image = $stock->id."_image";

                    $stock->update([
                        'sku' => $request->$sku,
                        'price' => $request->$price,
                        'qty' => $request->$qty,
                    ]);
                }

            }
        }
        /* ========= End Product Previous Stock  ========= */

        /* ========= Start Product Attributes ========= */
        if($request->is_variation_changed){
            $attribute_values = array();
            if($request->has('choice_attributes')){
                foreach ($request->choice_attributes as $key => $attribute)
                {
                    $atr = 'choice_options'.$attribute;
                    $item['attribute_id'] = $attribute;
                    $data = array();

                    foreach ($request[$atr] as $key => $value) {
                        array_push($data, $value);
                    }

                    $item['values'] = $data;
                    array_push($attribute_values, $item);
                }
            }

            if (!empty($request->choice_attributes)) {
                $product->attributes = json_encode($request->choice_attributes);
                $product->is_varient = 1;

                if($request->has('vnames')){
                    $i = 0;
                    foreach ($request->vnames as $key => $name){
                        $stock = ProductStock::create([
                            'product_id' => $product->id,
                            'varient'    => $name,
                            'sku'        => $request->vskus[$i],
                            'price'      => $request->vprices[$i],
                            'qty'        => $request->vqtys[$i],
                        ]);

                        $image = $request->vimages[$i];
                        if($image){
                            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                            Image::make($image)->resize(438,438)->save('upload/products/variations/'.$name_gen);
                            $save_url = 'upload/products/variations/'.$name_gen;
                        }else{
                            $save_url = '';
                        }

                        $stock->image = $save_url;
                        $stock->save();

                        $i++;
                    }
                }
            }
            else {
                $product->attributes = json_encode(array());
                $product->is_varient = 0;
            }

            $attr_values = collect($attribute_values);
            $attr_values_sorted = $attr_values->sortByDesc('attribute_id');

            $sorted_array = array();
            foreach($attr_values_sorted as $attr){
                array_push($sorted_array, $attr);
            }

            $product->attribute_values = json_encode($sorted_array, JSON_UNESCAPED_UNICODE);
        }
        /* ========= End Product Attributes ========= */

        /* =========== Start Product Tags =========== */
        $product->tags = implode(',', $request->tags);
        /* =========== End Product Tags =========== */

        /* =========== Start Multiple Image Update =========== */

        $images = $request->file('multi_img');

        if($images == Null){
            $product->multi_imgs->photo_name = $request->multi_img;
            $product->update();
        }else{
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;

                MultiImg::insert([
                    'product_id' => $product->id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),


                ]);

            }
        }
        /* =========== End Multiple Image Update =========== */

        $product->save();

        Session::flash('success','Product Updated Successfully');
        return redirect()->route('product.index');

    } // end method

    /*=================== Start Multi Image Delete =================*/
    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        try {
            if(file_exists($oldimg->photo_name)){
                unlink($oldimg->photo_name);
            }
        } catch (Exception $e) {

        }

        MultiImg::findOrFail($id)->delete();

        return response()->json(['success'=> 'Product Deleted Successfully']);

    } // end method
    /*=================== End Multi Image Delete =================*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {
            if(file_exists($product->product_thumbnail)){
                unlink($product->product_thumbnail);
            }
        } catch (Exception $e) {

        }

        $product->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            try {
                if(file_exists($img->photo_name)){
                    unlink($img->photo_name);
                }
            } catch (Exception $e) {

            }
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    /*=========== Start Active/Inactive Methoed ===========*/
    public function active($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        $notification = array(
            'message' => 'Product Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    public function inactive($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        $notification = array(
            'message' => 'Product Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } // end method
    /*=========== End Active/Inactive Methoed ===========*/

    /* ============ attribute choice option selected ============= */
    public function add_more_choice_option(Request $request) {
        $attributes = Attribute::whereIn('id', $request->attribute_ids)->get();
        // dd($attributes);
        return view('backend.product.attribute_select_value',compact('attributes'));
    }

    /* ============ category with subcategory show ============= */
    public function getsubcategory($category_id){

        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    /* ============ subcategory with sub->subcategory show ============= */
    public function getsubsubcategory($subcategory_id){

        $subsubbcat = Subsubcategory::where('subcategory_id',$subcategory_id)->orderBy('sub_subcategory_name_en','ASC')->get();
        return json_encode($subsubbcat);
    }

    /* ============== Start Product Category Store Ajax ============ */
    public function categoryInsert(Request $request)
    {

        if($request->category_name_en == Null){
            return response()->json(['error'=> 'Category Field  Required']);
        }

        $category = new Category();

        $category->category_name_en = $request->category_name_en;

        /* ======== Category Name English ======= */
        $category->category_name_en = $request->category_name_en;
        if($request->category_name_bn == ''){
            $category->category_name_bn = $request->category_name_en;
        }else{
            $category->category_name_bn = $request->category_name_bn;
        }


        /* ======== Category Slug   ======= */
        if ($request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->category_name_en)).'-'.Str::random(5);
        }

        if($request->status == Null){
            $request->status = 0;
        }

        $category->status = $request->status;
        $category->created_at = Carbon::now();

        $category->save();

        $categories = Category::all();
        return response()->json([
            'success'=> 'Category Inserted Successfully',
            'categories' => $categories,
        ]);

    }
    /* ============== End Product Category Store Ajax ============ */

    /* ============== Start Product SubCategory Store Ajax ============ */
    public function subcategoryInsert(Request $request)
    {

        if($request->subcategory_name_en == Null){
            return response()->json(['error'=> 'SubCategory Field  Required']);
        }

        $subcategory = new Subcategory();

        $subcategory->subcategory_name_en = $request->subcategory_name_en;

        /* ======== Category Name English ======= */
        $subcategory->subcategory_name_en = $request->subcategory_name_en;
        if($request->subcategory_name_bn == ''){
            $subcategory->subcategory_name_bn = $request->subcategory_name_en;
        }else{
            $subcategory->subcategory_name_bn = $request->subcategory_name_bn;
        }


        /* ======== Category Slug   ======= */
        if ($request->slug != null) {
            $subcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }else {
            $subcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->subcategory_name_en)).'-'.Str::random(5);
        }

        if($request->status == Null){
            $request->status = 0;
        }

        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;
        $subcategory->created_at = Carbon::now();

        $subcategory->save();

        return response()->json([
            'success'=> 'SubCategory Inserted Successfully',
        ]);

    }
    /* ============== End Product SubCategor Store Ajax ============ */

    /* ============== Start Product SubSubCategory Store Ajax ============ */
    public function subsubcategoryInsert(Request $request)
    {

        if($request->sub_subcategory_name_en == Null){
            return response()->json(['error'=> 'SubSubCategory Field  Required']);
        }

        $subsubcategory = new Subsubcategory();

        $subsubcategory->sub_subcategory_name_en = $request->sub_subcategory_name_en;

        /* ======== Category Name English ======= */
        $subsubcategory->sub_subcategory_name_en = $request->sub_subcategory_name_en;
        if($request->sub_subcategory_name_bn == ''){
            $subsubcategory->sub_subcategory_name_bn = $request->sub_subcategory_name_en;
        }else{
            $subsubcategory->sub_subcategory_name_bn = $request->sub_subcategory_name_bn;
        }


        /* ======== Category Slug   ======= */
        if ($request->slug != null) {
            $subsubcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }else {
            $subsubcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->sub_subcategory_name_en)).'-'.Str::random(5);
        }

        if($request->status == Null){
            $request->status = 0;
        }

        $subsubcategory->status = $request->status;
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->subcategory_id = $request->subcategory_id;
        $subsubcategory->created_at = Carbon::now();

        $subsubcategory->save();

        return response()->json([
            'success'=> 'SubSubCategory Inserted Successfully',
        ]);

    }
    /* ============== End Product SubSubCategory Store Ajax ============ */

    /* ============== Start Product Brand Store Ajax ============ */
    public function brandInsert(Request $request)
    {

        if($request->brand_name_en == Null){
            return response()->json(['error'=> 'Brand Field  Required']);
        }

        $brand = new Brand();

        $brand->brand_name_en = $request->brand_name_en;

        /* ======== brand Name English ======= */
        $brand->brand_name_en = $request->brand_name_en;
        if($request->brand_name_bn == ''){
            $brand->brand_name_bn = $request->brand_name_en;
        }else{
            $brand->brand_name_bn = $request->brand_name_bn;
        }

        /* ======== Brand Slug   ======= */
        if ($request->brand_slug_en != null) {
            $brand->brand_slug_en = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->brand_slug_en));
        }else {
            $brand->brand_slug_en = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->brand_name_en)).'-'.Str::random(5);
        }

        // dd($request->image);


        if($request->hasfile('brand_image')){
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;
        }else{
            $save_url = $request->brand_images;
        }

        $brand->brand_image = $save_url;

        // dd($request->all());

        $brand->save();

        $brands = Brand::all();

        return response()->json([
            'success'=> 'Brand Inserted Successfully',
            'brands' => $brands,
        ]);
    }
    /* ============== End Product Brand Store Ajax ============ */
}

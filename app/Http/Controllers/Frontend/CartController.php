<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Coupon;

class CartController extends Controller
{
    /* ============ Start AddToCart Methoed ============ */
    public function AddToCart(Request $request, $id){

        if (Session::has('coupon')) {
            Session::forget('coupon');
         }
        $options = json_decode(stripslashes($request->get('options')));

        //dd($request);
        $attribute_ids = array();
        $attribute_names = array();
        $attribute_values = array();
        // for($i=0; $i < $request->total_attributes; $i++){
        //     //$name = 'attribute_ids' . $no;
        //     $item = $options['attribute_ids'];
        // }
        $product = Product::findOrFail($id);

        if($product->is_varient){
            foreach($options as $option){
                if($option->name == 'attribute_ids[]'){
                    $item = $option->value;
                    array_push($attribute_ids, $item);
                }else if($option->name == 'attribute_names[]'){
                    $item = $option->value;
                    array_push($attribute_names, $item);
                }else if($option->name == 'attribute_options[]'){
                    $item = $option->value;
                    array_push($attribute_values, $item);
                }
            }
        }

        //dd($attribute_names);

        // return response()->json(array(
        //     'options' => $options,
        // ));

        if($request->product_price){
            $price = $request->product_price;
        }else{
            if($product->discount_price > 0){
                if($product->discount_type == 1){
                    $price = $product->discount_price;
                }else{
                    $price = $product->regular_price - ($product->discount_price * $product->regular_price / 100);
                }
            }else{
                $price = $product->regular_price;
            }
        }

        // if ($product->discount_type == 1) {
        //     $price_after_discount = $product->discount_price;
        // } elseif ($product->discount_type == 2) {
        //     $discount_amount = ($product->discount_price / 100) * $product->regular_price;
        //     $price_after_discount = $product->regular_price - $discount_amount;
        // }



    	if($product->is_varient){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'is_varient' => 1,
                    'varient' => $request->product_varient,
                    'attribute_ids' => $attribute_ids,
                    'attribute_names' => $attribute_names,
                    'attribute_values' => $attribute_values,
                ],
            ]);

            return response()->json(['success'=> 'Successfully Added on Your Cart']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'slug' => $product->slug,
                    'is_varient' => 0,
                ],
            ]);

		    return response()->json(['success'=> 'Successfully Added on Your Cart']);
        }
    }
    /* ============ End AddToCart Methoed =========== */

    /*=================== Start Mini Cart  Methoed ===================*/
    public function AddMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));

    } // end method

    /*=================== End Mini Cart  Methoed ===================*/

    /*=========== Start Remove Mini Cart  Methoed ============*/
    public function RemoveMiniCart($rowId){

        Cart::remove($rowId);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }
        return response()->json(['success'=> 'Product Removed from Cart']);
    }

    /*============== End Remove Mini Cart  Methoed =============*/

    /*=========== Start  Cart Index  Methoed ============*/
    public function index(){
        $carts = Cart::content();
        //dd($carts);
        return view('frontend.cart.index',compact('carts'));
    }
    /*=========== End Cart Index  Methoed ============*/

    /* ================= Start GetCartProduct Method =================== */
    public function getCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));

    } //end method
    /* ================= End GetCartProduct Method =================== */

    /* ================= Start CartIncrement Method =================== */
    public function cartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }

        return response()->json('increment');

    } // end mehtod

    /* ================= End CartIncrement Method =================== */

    /* ================= Start CartDecrement Method =================== */
    public function cartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }

        return response()->json($row->qty);
    } // end method

    /* ================= End CartDecrement Method =================== */

    /* ================= Start RemoveCartProduct Method ============== */
    public function removeCartProduct($rowId){

        Cart::remove($rowId);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }
        return response()->json(['success' => 'Successfully Remove From Cart']);
    } // end method
    /* ================= End RemoveCartProduct Method ============== */

    /* ================= Start Destroy Method ============== */
    public function destroy()
    {
        Cart::destroy();
        Session::flash('success','Cart Permanently Deleted Successfully.');
        return back();
    } // end method

    /* ================= Start Destroy Method ============== */

}

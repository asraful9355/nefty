<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\District;
use App\Models\Upazilla;
use App\Models\SmsTemplate;
use App\Utility\SmsUtility;
use App\Utility\SendSMSUtility;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductStock;

class CheckoutController extends Controller
{
	/* ========= Start Checkout Index Method ============ */
    public function index()
    {
        if(!guest_checkout() && !auth()->check()){
            return redirect()->route('login');
        }

        $carts = Cart::content();
        // dd($carts);

        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return view('frontend.checkout.index',compact('carts','cartQty','cartTotal'));
    } // end method
    /* ========= End Checkout Index Method ============ */

     /* ============= Start getdivision Method ============== */
    public function getdivision($division_id){
    $division = District::where('division_id', $division_id)->orderBy('district_name_en','ASC')->get();

        return json_encode($division);
    }
    /* ============= End getdivision Method ============== */

    /* ============= Start getupazilla Method ============== */
    public function getupazilla($district_id){
        $upazilla = Upazilla::where('district_id', $district_id)->orderBy('name_en','ASC')->get();

        return json_encode($upazilla);
    }
    /* ============= End getupazilla Method ============== */


    /* ============= Start Payment Method ============== */
    public function payment(Request $request){
        // dd($request->payment_option);
        if($request->payment_option == 'cash_on_delivery'){
            $checkout = new CheckoutController;
            return $checkout->store($request);
        }

        $payment_method = $request->payment_option;
        $total_amount = Cart::total();
        $last_order = Order::orderBy('id','DESC')->first();
        $order_id = $last_order->id+1;
        $invoice_no = date('YmdHi').$order_id;
        Session::put('invoice_no', $invoice_no);

        if($request->payment_option == 'cash_on_delivery'){
            return redirect()->route('checkout.store');
        }else{
            Session::put('payment_method', $request->payment_option);
            Session::put('payment_type', 'cart_payment');
            Session::put('payment_amount', $total_amount);
            if($request->payment_option == 'nagad'){
                $nagad = new NagadController;
                return $nagad->getSession();
            }else if($request->payment_option == 'bkash'){
                $bkash = new BkashController;
                return $bkash->pay();
            }elseif ($request->payment_option == 'sslcommerz') {
                $sslcommerz = new PublicSslCommerzPaymentController;
                return $sslcommerz->index($request);
            }elseif($payment_method =='aamarpay'){
                $aamarpay = new AamarpayController;
                return $aamarpay->index();
            }
        }
        
        return view('frontend.checkout.payment', compact('payment_method', 'total_amount', 'invoice_no'));
    }
    /* ============= End Payment Method ============== */

    /* ============= Start Checkout Store Method ============== */
    public function store(Request $request)
    {
        $carts = Cart::content();
        // dd($carts);

        if($carts->isEmpty()){
            $notification = array(
                'message' => 'Your cart is empty.', 
                'alert-type' => 'error'
            );
            return redirect()->route('home')->with($notification);
        }

        // dd($request->all());

        if(Auth::check()){
            $user_id = Auth::id();
            $type = 1;
        }else{
            $user_id = 1;
            $type = 2;
        }

        if($request->payment_option == 'cash_on_delivery'){
            $payment_status = 0;
        }else{
            $payment_status = 1;
        }

        // order add //
        $order = Order::create([
            'user_id' => $user_id,
            'grand_total' => Cart::total(),
            'payment_method' => $request->payment_option,
            'payment_status' => $payment_status,
            'invoice_no' => date('Ymd-His') . rand(10, 99),
            'delivery_status' => 'pending',
            'phone' => $request->phone,
            'email' => $request->email,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazilla_id' => $request->upazilla_id,
            'address' => $request->address,
            'type' => $type,
            //'created_by' => Auth::guard('admin')->user()->id,
        ]);

        // order details add //
        foreach ($carts as $cart) {
            $product = Product::find($cart->id);
            if($cart->options->is_varient == 1){
                $variations = array();
                for($i=0; $i<count($cart->options->attribute_names); $i++){
                    $item['attribute_name'] = $cart->options->attribute_names[$i];
                    $item['attribute_value'] = $cart->options->attribute_values[$i];
                    array_push($variations, $item);
                }
                OrderDetail::insert([
                    'order_id' => $order->id, 
                    'product_sales_quantity' => $order->id, 
                    'product_id' => $cart->id,
                    'is_varient' => 1,
                    'variation' => json_encode($variations, JSON_UNESCAPED_UNICODE),
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'tax' => $cart->tax,
                    'created_at' => Carbon::now(),
                ]);

                // stock calculation //
                $stock = ProductStock::where('varient', $cart->options->varient)->first();
                // dd($cart);
                if($stock){
                    // dd($stock);
                    $stock->qty = $stock->qty - $cart->qty;
                    $stock->save();
                }

            }else{
                OrderDetail::insert([
                    'order_id' => $order->id,
                    'product_sales_quantity' => $order->id, 
                    'product_id' => $cart->id,
                    'is_varient' => 0,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'tax' => $cart->tax,
                    'created_at' => Carbon::now(),
                ]);
            }

            $product->stock_qty = $product->stock_qty - $cart->qty;
            $product->save();
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->route('checkout.success', $order->invoice_no)->with($notification);
    }
    /* ============= End Checkout Store Method ============== */

    /* ============= Start Show Method ============== */
    public function show($id)
    {
        $order = Order::where('invoice_no', $id)->first();

        $notification = array(
            'message' => 'Your Order Successfully.', 
            'alert-type' => 'success'
        );

        return view('frontend.order.order_confirmed', compact('order'))->with($notification);
    }
    /* ============= End Show Method ============== */

    
}

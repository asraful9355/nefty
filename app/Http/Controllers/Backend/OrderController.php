<?php

namespace App\Http\Controllers\Backend;

use PDF;
use Session;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\ShipStates;
use App\Models\ShipDivision;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\ShipDistricts;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $date = $request->date;
        $delivery_status = null;
        $payment_status = null;



        //dd($request);

        if($request->delivery_status != null && $request->payment_status != null && $date != null){

            $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;

        }else if($request->delivery_status == null && $request->payment_status == null && $date == null){
            $orders = Order::orderBy('id', 'desc');
        }else{
            if($request->delivery_status == null){
                if($request->payment_status != null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }else if($request->payment_status == null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                }else{
                    $orders = Order::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }
            }else if($request->payment_status == null){
                if($request->delivery_status != null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }else if($request->delivery_status == null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                }else{
                    $orders = Order::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }else if($request->date == null){
                if($request->delivery_status != null && $request->payment_status != null){
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                }else if($request->delivery_status == null && $request->payment_status != null){
                    $orders = Order::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }else{
                    $orders = Order::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        //dd($request);

        $orders = $orders->paginate(15);
        return view('backend.sales.all_orders.index', compact('orders', 'delivery_status', 'date','payment_status'));
    }

   

   
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $divisions = ShipDivision::all();
        $districts = ShipDistricts::all();
        $upazillas = ShipStates::all();

        return view('backend.sales.all_orders.show', compact('order', 'divisions', 'districts', 'upazillas'));
    }




    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->division_id = $request->division_id;
        $order->district_id = $request->district_id;
        $order->upazilla_id = $request->upazilla_id;
        $order->payment_method = $request->payment_method;

        OrderDetail::where('id', $id)->update([
            'shipping_cost' => $request->shipping_cost,
            'shipping_type' => $request->shipping_type
        ]);

        $order->save();

        Session::flash('success','Admin Orders Information Updated Successfully');
        return redirect()->back();
    }

 
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        $notification = array(
            'message' => 'Order Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    /*================= Start update_payment_status Methoed ================*/
    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $order->payment_status = $request->status;
        $order->save();

        // dd($order);

        return response()->json(['success'=> 'Payment status has been updated']);

    }

    /*================= Start update_delivery_status Methoed ================*/
    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_status = $request->status;
        $order->save();

        return response()->json(['success'=> 'Delivery status has been updated']);

    }

    /* ============= Start getdivision Method ============== */
    public function getdivision($division_id){
        $division = ShipDistricts::where('shipdivision_id', $division_id)->orderBy('district_name','ASC')->get();

        return json_encode($division);
    }
    /* ============= End getdivision Method ============== */

    /* ============= Start getupazilla Method ============== */
    public function getupazilla($district_id){
        $upazilla = ShipStates::where('shipdistrict_id', $district_id)->orderBy('state_name','ASC')->get();

        return json_encode($upazilla);
    }
    /* ============= End getupazilla Method ============== */

    /* ============= Start invoice_download Method ============== */
    public function invoice_download($id){
        $order = Order::findOrFail($id);

        $pdf = PDF::loadView('backend.invoices.invoice',compact('order'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // end method
    /* ============= End invoice_download Method ============== */


}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uset_id = Auth::guard('admin')->user()->id;
        // Date insert
        Supplier::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,
            'created_by' => $uset_id,
 
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Supplier Inserted Successfully');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $supplier = Supplier::find($id);
        return view('backend.supplier.edit', compact('supplier'));
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
        $uset_id = Auth::guard('admin')->user()->id;
        // Date insert
        Supplier::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,
            'created_by' => $uset_id,
 
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Supplier Update Successfully');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        Session::flash('warning', 'Supplier Delete Successfully');
        return redirect()->back();
    }


    public function active($id){

        $supplier = Supplier::find($id);
        $supplier->status = 1;
        $supplier->save();

        Session::flash('success','supplier Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $supplier = Supplier::find($id);
        $supplier->status = 0;
        $supplier->save();

        Session::flash('success','supplier Disabled Successfully.');
        return redirect()->back();
    }

    public function view($id){
        $supplier = Supplier::find($id);
        return view('backend.supplier.view', compact('supplier'));
    }
}

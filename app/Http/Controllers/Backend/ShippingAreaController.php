<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\ShipStates;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistricts;
use App\Models\ShipDistrict;
use Illuminate\Support\Facades\Session;

class ShippingAreaController extends Controller
{

    // ==============================================
    // =======>>> Start Division Controller <<<======
    // ==============================================


    public function viewDivision()
    {
        $divisions = ShipDivision::orderBy('id','DESC')->get();
		return view('backend.shipping_area.ship_division.index',compact('divisions'));
    } // End Method


    public function divisionStore(Request $request)
    {
        $this->validate($request, [
            'division_name' => 'required',
        ]);

         // Date insert
        Shipdivision::updateOrCreate([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Division Inserted Successfully');
        return redirect()->back();
    } // End Method


    public function divisionEdit($id)
    {
        $division = ShipDivision::findOrFail($id);
		return view('backend.shipping_area.ship_division.edit',compact('division'));
    } // End Method


    public function divisionUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'division_name' => 'required',
        ]);

         // Date insert
         ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Division Update Successfully');
        return redirect()->route('viewDivision');
    } // End Method


    public function divisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();
        Session::flash('warning', 'Division Delete Successfully');
        return redirect()->back();
    } // End Method




    // ==============================================
    // =======>>> Start District Controller <<<======
    // ==============================================
    public function viewDistricts()
    {

         $divisions = ShipDivision::orderBy('id','DESC')->get();
         $districts = ShipDistricts::with('division')->get();

        // echo $divisions;
		return view('backend.shipping_area.ship_district.index',compact('districts', 'divisions'));
    } // End Method


    public function storeDistrict(Request $request)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'district_name' => 'required',
        ]);

         // Date insert
        ShipDistricts::updateOrCreate([
            'shipdivision_id' => $request->shipdivision_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'District Inserted Successfully');
        return redirect()->back();
    } // End Method


    public function districtEdit($id)
    {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistricts::findOrFail($id);
		return view('backend.shipping_area.ship_district.edit',compact('divisions','district'));
    } // End Method


    public function districtUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'district_name' => 'required',
        ]);

         // Date insert
         ShipDistricts::findOrFail($id)->update([
            'shipdivision_id' => $request->shipdivision_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'District Update Successfully');
        return redirect()->route('viewDistricts');
    } // End Method


    public function districtDelete($id)
    {
        ShipDistricts::findOrFail($id)->delete();
        Session::flash('warning', 'District Delete Successfully');
        return redirect()->back();
    } // End Method




    // ==============================================
    // =======>>> Start State Controller <<<======
    // ==============================================
    public function viewStates()
    {

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistricts::orderBy('district_name','ASC')->get();
        $states = ShipStates::orderBy('id','DESC')->get();
		return view('backend.shipping_area.ship_states.index',compact('divisions','districts','states'));
    } // End Method


    public function storeState(Request $request)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'shipdistrict_id' => 'required',
            'state_name' => 'required',
        ]);

         // Date insert
        ShipStates::insert([
            'shipdivision_id' => $request->shipdivision_id,
            'shipdistrict_id' => $request->shipdistrict_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'State Inserted Successfully');
        return redirect()->back();
    } // End Method


    public function editState($id)
    {
        $divisions = Shipdivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistricts::orderBy('district_name','ASC')->get();
        $state = ShipStates::findOrFail($id);
		return view('backend.shipping_area.ship_states.edit',compact('divisions','districts','state'));
    } // End Method


    public function updateState(Request $request, $id)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'shipdistrict_id' => 'required',
            'state_name' => 'required',
        ]);

         // Date insert
         ShipStates::findOrFail($id)->update([
            'shipdivision_id' => $request->shipdivision_id,
            'shipdistrict_id' => $request->shipdistrict_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'State Update Successfully');
        return redirect()->route('viewStates');
    } // End Method


    public function districtAjax($shipdivision_id)
    {
        $districts = ShipDistricts::where('shipdivision_id',$shipdivision_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    } // End Method
 
    public function destroyState($id)
    {
        ShipStates::findOrFail($id)->delete();
        Session::flash('warning', 'State Delete Successfully');
        return redirect()->back();
    } // End Method



}

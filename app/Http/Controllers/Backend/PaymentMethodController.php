<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class PaymentMethodController extends Controller
{
    /* =========== Start Index Method ========== */
    public function index()
    {
        return view('backend.paymentMethods.configuration');
    }
    /* =========== End Index Method ========== */

    /* =========== Start Update Method ========== */
    public function update(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }

        Session::flash('success','Settions Updated Successfully');
        return back();
    }
    /* =========== End Update Method ========== */

    /* =========== Start OverwriteEnvFile Method ========== */
    public function overWriteEnvFile($type, $val)
    {
        if(env('DEMO_MODE') != 'On'){
            $path = base_path('.env');
            if (file_exists($path)) {
                $val = '"'.trim($val).'"';
                if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                    file_put_contents($path, str_replace(
                        $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                    ));
                }
                else{
                    file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
                }
            }
        }
    }
    /* =========== End OverwriteEnvFile Method ========== */

   
}

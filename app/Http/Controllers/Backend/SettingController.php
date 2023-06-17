<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;

class SettingController extends Controller
{

    public function index()
    {

        $settings = Setting::find(1);
        return view('backend.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // dd($request->types);
        // if($request->types !=null && count($request->types) > 0){
        //     foreach ($request->types as $key => $type) {
        //         $setting = Setting::where('name', $type)->first();
        //         $setting->value = $request[$type];
        //         $setting->save();
        //     }
        // }

        Setting::updateOrCreate(
            ['name' => 'site_name'],
            ['value' => $request->site_name],
        );
        Setting::updateOrCreate(
            ['name' => 'business_name'],
            ['value' => $request->business_name],
        );
        Setting::updateOrCreate(
            ['name' => 'phone'],
            ['value' => $request->phone],
        );
        Setting::updateOrCreate(
            ['name' => 'email'],
            ['value' => $request->email],
        );
        Setting::updateOrCreate(
            ['name' => 'business_hours'],
            ['value' => $request->business_hours],
        );
        Setting::updateOrCreate(
            ['name' => 'copy_right'],
            ['value' => $request->copy_right],
        );
        Setting::updateOrCreate(
            ['name' => 'business_address'],
            ['value' => $request->business_address],
        );
        Setting::updateOrCreate(
            ['name' => 'facebook_url'],
            ['value' => $request->facebook_url],
        );
        Setting::updateOrCreate(
            ['name' => 'twitter_url'],
            ['value' => $request->twitter_url],
        );
        Setting::updateOrCreate(
            ['name' => 'linkedin_url'],
            ['value' => $request->linkedin_url],
        );
        Setting::updateOrCreate(
            ['name' => 'youtube_url'],
            ['value' => $request->youtube_url],
        );
        Setting::updateOrCreate(
            ['name' => 'instagram_url'],
            ['value' => $request->instagram_url],
        );
        Setting::updateOrCreate(
            ['name' => 'pinterest_url'],
            ['value' => $request->pinterest_url],
        );

        //Setting site_favicon Update
        if ($request->hasFile('site_favicon')) {
            $logo = $request->file('site_favicon');
            $logo_save = time() . $logo->getClientOriginalName();
            $logo->move('upload/setting/favicon/', $logo_save);
            $save_url_favicon = 'upload/setting/favicon/' . $logo_save;

            if (get_setting('site_favicon') != null) {
                $setting = Setting::where('name', 'site_favicon')->first();
                try {
                    if (file_exists($setting->value)) {
                        unlink($setting->value);
                    }
                } catch (Exception $e) {}
            }
            Setting::updateOrCreate(
                ['name' => 'site_favicon'],
                ['value' => $save_url_favicon],
            );
        }

        //Setting site_logo Update
        if ($request->hasFile('site_logo')) {
            $logo = $request->file('site_logo');
            $logo_save = time() . $logo->getClientOriginalName();
            $logo->move('upload/setting/logo/', $logo_save);
            $save_url_logo = 'upload/setting/logo/' . $logo_save;

            if (get_setting('site_logo') != null) {
                $setting = Setting::where('name', 'site_logo')->first();
                try {
                    if (file_exists($setting->value)) {
                        unlink($setting->value);
                    }
                } catch (Exception $e) {}
            }
            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                ['value' => $save_url_logo],
            );
        }

        //Setting site_footer_logo Update
        if ($request->hasFile('site_footer_logo')) {
            $logo = $request->file('site_footer_logo');
            $logo_save = time() . $logo->getClientOriginalName();
            $logo->move('upload/setting/footer-logo/', $logo_save);
            $save_url_logo = 'upload/setting/footer-logo/' . $logo_save;

            if (get_setting('site_footer_logo') != null) {
                $setting = Setting::where('name', 'site_footer_logo')->first();
                try {
                    if (file_exists($setting->value)) {
                        unlink($setting->value);
                    }
                } catch (Exception $e) {}
            }
            Setting::updateOrCreate(
                ['name' => 'site_footer_logo'],
                ['value' => $save_url_logo],
            );
        }

        //Setting site_contact_logo Update
        if ($request->hasFile('site_contact_logo')) {
            $logo = $request->file('site_contact_logo');
            $logo_save = time() . $logo->getClientOriginalName();
            $logo->move('upload/setting/contact/', $logo_save);
            $save_url_logo = 'upload/setting/contact/' . $logo_save;

            if (get_setting('site_contact_logo') != null) {
                $setting = Setting::where('name', 'site_contact_logo')->first();
                try {
                    if (file_exists($setting->value)) {
                        unlink($setting->value);
                    }
                } catch (Exception $e) {}
            }
            Setting::updateOrCreate(
                ['name' => 'site_contact_logo'],
                ['value' => $save_url_logo],
            );
        }

        Session::flash('success', 'Setting Updated Successfully');
        return redirect()->back();
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

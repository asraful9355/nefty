<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Division;
use App\Models\User;
use App\Models\District;
use App\Models\Upazilla;
use App\Models\Pages;
use App\Models\Setting;
use App\Models\Attribute;
use App\Models\ProductStock;
use App\Models\Vendor;
use Illuminate\Support\Collection;

if (!function_exists('get_setting')) {
    function get_setting($name)
    {
        return Setting::where('name', $name)->first();
    }
}

if (!function_exists('default_language')) {
    function default_language()
    {
        return env("DEFAULT_LANGUAGE");
    }
}


if (!function_exists('guest_checkout')) {
    function guest_checkout()
    {
        return env("GUEST_CHECKOUT");
    }
}

// if (!function_exists('get_cart_data')) {
//     function get_cart_data()
//     {
//         return Cart::content();
//     }
// }


// Search By Side All Categories // 
if (!function_exists('get_all_categories')) {
    function get_all_categories()
    {
        $categories = Category::where('status', 1)->latest()->get();
        return $categories;
    }
}
//Footer page
if (!function_exists('get_pages_both_footer')) {
    function get_pages_both_footer()
    {
        return Pages::where('status',1)
                ->where('position',2)
                ->orWhere('position',1)
                ->orderBy('id','ASC')
                ->get();
    }
}

//Header page
if (!function_exists('get_pages_nav_header')) {
    function get_pages_nav_header()
    {
        return Pages::where('status',1)
                ->where('position',3)
                ->orderBy('id','ASC')
                ->get();
    }
}

//Footer page
if (!function_exists('get_footer_banner')) {
    function get_footer_banner()
    {
        return Banner::where('status',1)
                ->where('position',0)
                ->orderBy('id','DESC')
                ->first();
    }
}

/* ============ Division Select ============ */
if (!function_exists('get_divisions')) {
    function get_divisions()
    {
        return Division::where('status', 1)->get();
    }
}

/* ========== District Select =========== */
if (!function_exists('get_district_by_division_id')) {
    function get_district_by_division_id($id)
    {
        return District::where('division_id', $id)->where('status', 1)->get();
    }
}

/* ========== Upazilla Select =========== */
if (!function_exists('get_upazilla_by_district_id')) {
    function get_upazilla_by_district_id($id)
    {
        return Upazilla::where('district_id', $id)->get();
    }
}



if (!function_exists('get_guest_user_id')) {
    function get_guest_user_id()
    {
        return User::where('role', 4)->first()->id;
    }
}

if (!function_exists('get_attribute_by_id')) {
    function get_attribute_by_id($id)
    {
        return Attribute::find($id);
    }
}

if (!function_exists('get_product_varient_price')) {
    function get_product_varient_price($id, $varient)
    {
        $stock = ProductStock::where('product_id', $id)->where('varient', $varient)->first();
        if($stock){
            return $stock->price;
        }else{
            return null;
        }
    }
}

if (!function_exists('get_vendors')) {
    function get_vendors()
    {
        return Vendor::where('status', 1)->get();
    }
}
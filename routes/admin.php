<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\SubscribeController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CampaingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentMethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*========================== Start Admin Route  ==========================*/
Route::get('/admin/login',[AdminController::class, 'Index'])->name('login_form');
Route::post('/admin',[AdminController::class, 'Login'])->name('admin.login');
// Admin All Routes
Route::prefix('admin')->middleware('admin')->group(function(){
	    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
	    Route::get('/logout',[AdminController::class, 'AminLogout'])->name('admin.logout');
	    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.regester');
	    Route::post('/register/store',[AdminController::class, 'AdminRegisterStore'])->name('admin.register.store');
	    Route::get('/forgot-password',[AdminController::class, 'AdminForgotPassword'])->name('admin.password.request');
	    Route::get('/profile',[AdminController::class, 'Profile'])->name('admin.profile');
	    Route::get('/edit/profile',[AdminController::class, 'EditProfile'])->name('edit.profile');
	    Route::post('/store/profile',[AdminController::class, 'StoreProfile'])->name('store.profile');
	    Route::get('/change/password',[AdminController::class, 'ChangePassword'])->name('change.password');
	    Route::post('/update/password',[AdminController::class, 'UpdatePassword'])->name('update.password');
// ==================== Admin Slider All Routes ===================//
Route::prefix('slider')->group(function(){
		Route::get('/index', [SliderController::class, 'index'])->name('slider.index');
		Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
		Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
		Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
		Route::get('/view/{id}', [SliderController::class, 'view'])->name('slider.view');
		Route::post('/update/{id}',[SliderController::class, 'update'])->name('slider.update');
		Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
		Route::get('/slider_active/{id}', [SliderController::class, 'active'])->name('slider.active');
		Route::get('/slider_inactive/{id}', [SliderController::class, 'inactive'])->name('slider.in_active');
	});
// ==================== Admin Brand All Routes ===================//
Route::prefix('brand')->group(function(){
		Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
		Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
		Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
		Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
		Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
		Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
		Route::post('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
		Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
		Route::get('/brand_active/{id}', [BrandController::class, 'active'])->name('brand.active');
		Route::get('/brand_inactive/{id}', [BrandController::class, 'inactive'])->name('brand.in_active');
	});
// ==================== Admin Banner All Routes ===================//
Route::prefix('banner')->group(function(){
		Route::get('/index', [BannerController::class, 'index'])->name('banner.index');
		Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
		Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
		Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
		Route::get('/view/{id}', [BannerController::class, 'view'])->name('banner.view');
		Route::get('/view/{id}', [BannerController::class, 'view'])->name('banner.view');
		Route::post('/update/{id}',[BannerController::class, 'update'])->name('banner.update');
		Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
		Route::get('/banner_active/{id}', [BannerController::class, 'active'])->name('banner.active');
		Route::get('/banner_inactive/{id}', [BannerController::class, 'inactive'])->name('banner.in_active');
	});
// ==================== Admin Category All Routes ===================//
Route::prefix('category')->group(function(){
		Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
		Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
		Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
		Route::get('/view/{id}', [CategoryController::class, 'view'])->name('category.view');
		Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
		Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
		Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
		Route::get('/category_active/{id}', [CategoryController::class, 'active'])->name('category.active');
		Route::get('/category_inactive/{id}', [CategoryController::class, 'inactive'])->name('category.in_active');
	});
// ==================== Admin SubCategory All Routes ===================//
Route::prefix('subcategory')->group(function(){
		Route::get('/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
		Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
		Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
		Route::get('/view/{id}', [SubCategoryController::class, 'view'])->name('subcategory.view');
		Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
		Route::post('/update/{id}',[SubCategoryController::class, 'update'])->name('subcategory.update');
		Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
		Route::get('/subcategory_active/{id}', [SubCategoryController::class, 'active'])->name('subcategory.active');
		Route::get('/subcategory_inactive/{id}', [SubCategoryController::class, 'inactive'])->name('subcategory.in_active');
        Route::get('/category-subcategory/ajax/{category_id}',[SubCategoryController::class,'getsubcategory'])->name('subcategory.ajax');
	});
	// ==================== Admin SubSubCategory All Routes ===================//
	Route::prefix('subsubcategory')->group(function(){
		Route::get('/index', [SubSubCategoryController::class, 'index'])->name('subsubcategory.index');
		Route::get('/create', [SubSubCategoryController::class, 'create'])->name('subsubcategory.create');
		Route::post('/store', [SubSubCategoryController::class, 'store'])->name('subsubcategory.store');
		Route::get('/view/{id}', [SubSubCategoryController::class, 'view'])->name('subsubcategory.view');
		Route::get('/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('subsubcategory.edit');
		Route::post('/update/{id}',[SubSubCategoryController::class, 'update'])->name('subsubcategory.udate');
		Route::get('/delete/{id}', [SubSubCategoryController::class, 'delete'])->name('subsubcategory.delete');
		Route::get('/subsubcategory_active/{id}', [SubSubCategoryController::class, 'active'])->name('subsubcategory.active');
		Route::get('/subsubcategory_inactive/{id}', [SubSubCategoryController::class, 'inactive'])->name('subsubcategory.in_active');

    });
	// ==================== Admin Pages  All Routes ===================//
	Route::prefix('pages')->group(function(){
		Route::get('/index', [PagesController::class, 'index'])->name('pages.index');
		Route::get('/create', [PagesController::class, 'create'])->name('pages.create');
		Route::post('/store', [PagesController::class, 'store'])->name('pages.store');
		Route::get('/view/{id}', [PagesController::class, 'view'])->name('pages.view');
		Route::get('/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
		Route::post('/update/{id}',[PagesController::class, 'update'])->name('pages.update');
		Route::get('/delete/{id}', [PagesController::class, 'delete'])->name('pages.delete');
		Route::get('/pages_active/{id}', [PagesController::class, 'active'])->name('pages.active');
		Route::get('/pages_inactive/{id}', [PagesController::class, 'inactive'])->name('pages.in_active');
    });

	// ==================== Admin Pages  BlogController ===================//
	Route::prefix('blog')->group(function(){
		Route::get('/index', [BlogController::class, 'index'])->name('blog.index');
		Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
		Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
		Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
		Route::post('/update/{id}',[BlogController::class, 'update'])->name('blog.update');
		Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
		Route::get('/blog_active/{id}', [BlogController::class, 'active'])->name('blog.active');
		Route::get('/blog_inactive/{id}', [BlogController::class, 'inactive'])->name('blog.in_active');
		Route::get('/view/{id}', [BlogController::class, 'view'])->name('blog.view');
    });

    /* ==================== Admin Attribute  All Routes =================== */
    Route::prefix('attributes')->group(function(){
	    // Attribute All Route
		Route::resource('/attribute', AttributeController::class);
		Route::get('/attribute/delete/{id}', [AttributeController::class, 'destroy'])->name('attribute.delete');

		// AttributeValue All Route
		Route::post('/attribute/value', [AttributeController::class, 'value_store'])->name('attribute.value_store');
		Route::get('/attribute_value_active/{id}', [AttributeController::class, 'value_active'])->name('attribute_value.active');
		Route::get('/attribute_value_inactive/{id}', [AttributeController::class, 'value_inactive'])->name('attribute_value.in_active');
		Route::post('/attribute/value/update/{id}', [AttributeController::class, 'value_update'])->name('attribute_value.update');
		Route::get('/attribute/value/delete/{id}', [AttributeController::class, 'value_destroy'])->name('attribute_value.delete');
    });

    /* ==================== Admin Product All Routes =================== */
	Route::prefix('products')->group(function(){
		Route::get('/index', [ProductController::class, 'index'])->name('product.index');
		Route::get('/create', [ProductController::class, 'create'])->name('product.create');
		Route::post('/store', [ProductController::class, 'store'])->name('product.store');
		Route::get('/view/{id}', [ProductController::class, 'show'])->name('product.view');
		Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
		Route::post('/update/{id}',[ProductController::class, 'update'])->name('product.update');
		Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
		Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
		Route::get('/product_active/{id}', [ProductController::class, 'active'])->name('product.active');
		Route::get('/product_inactive/{id}', [ProductController::class, 'inactive'])->name('product.in_active');

		/* ================  Add Attribute Add  ================== */
		Route::post('/add-more-choice-option', [ProductController::class, 'add_more_choice_option'])->name('products.add-more-choice-option');

		/* ================  Category & Subcategory With Ajax ================== */
		Route::get('/category-subcategory/ajax/{category_id}',[ProductController::class,'getsubcategory'])->name('subcategory.product.ajax');
		Route::get('/subcategory-subsubcategory/ajax/{subcategory_id}',[ProductController::class,'getsubsubcategory'])->name('subsubcategory.product.ajax');

		/* ================  Start Product Ajax All Store ================== */
		Route::post('/category/insert',[ProductController::class,'categoryInsert'])->name('product.category.store');
		Route::post('/subcategory/insert',[ProductController::class,'subcategoryInsert'])->name('product.subcategory.store');
		Route::post('/subsubcategory/insert',[ProductController::class,'subsubcategoryInsert'])->name('product.subsubcategory.store');
		Route::post('/brand/insert',[ProductController::class,'brandInsert'])->name('product.brand.store');
		/* ================  End Product Ajax All Store ================== */
	});

	/* ================  Start Admin Pages  All Route ================== */
	Route::prefix('vendor')->group(function(){
		Route::get('/index', [VendorController::class, 'index'])->name('vendor.index');
		Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
		Route::post('/store', [VendorController::class, 'store'])->name('vendor.store');
		Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
		Route::post('/update/{id}',[VendorController::class, 'update'])->name('vendor.update');
		Route::get('/delete/{id}', [VendorController::class, 'destroy'])->name('vendor.delete');


		Route::get('/vendor_active/{id}', [VendorController::class, 'active'])->name('vendor.active');
		Route::get('/vendor_inactive/{id}', [VendorController::class, 'inactive'])->name('vendor.in_active');
		Route::get('/vendor/{id}', [VendorController::class, 'view'])->name('vendor.view');
    });
    /* ================  End Admin Pages  All Route ================== */

    /* ================  Start Coupon All Route ================== */
	Route::prefix('coupon')->group(function(){
		Route::get('/index', [CouponController::class, 'index'])->name('coupon.index');
		Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
		Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
		Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
		Route::post('/update/{id}',[CouponController::class, 'update'])->name('coupon.update');
		Route::get('/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

		Route::get('/coupon_active/{id}', [CouponController::class, 'active'])->name('coupon.active');
		Route::get('/coupon_inactive/{id}', [CouponController::class, 'inactive'])->name('coupon.in_active');
		Route::get('/coupon/{id}', [CouponController::class, 'view'])->name('coupon.view');
    });
    /* ================  End Coupon All Route ================== */

    /* ================  Start Supplier All Route ================== */
	Route::prefix('supplier')->group(function(){
		Route::get('/index', [SupplierController::class, 'index'])->name('supplier.index');
		Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
		Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
		Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
		Route::post('/update/{id}',[SupplierController::class, 'update'])->name('supplier.update');
		Route::get('/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.delete');

		Route::get('/supplier_active/{id}', [SupplierController::class, 'active'])->name('supplier.active');
		Route::get('/supplier_inactive/{id}', [SupplierController::class, 'inactive'])->name('supplier.in_active');
		Route::get('/coupon/{id}', [SupplierController::class, 'view'])->name('supplier.view');
    });
    /* ================  End Supplier All Route ================== */

    /* ================  Start Subscriber All Route ================== */
    Route::prefix('subscribes')->group(function(){

        Route::get('/index', [SubscribeController::class, 'index'])->name('subscribe.index');
        Route::post('/store', [SubscribeController::class, 'store'])->name('subscribe.store');
        Route::get('/subscribe-delete/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.delete');
    });
    /* ================  End Subscriber All Route ================== */

    /* ================  Start Setting All Route ================== */
    Route::prefix('setting')->group(function(){
        Route::get('/index', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/update', [SettingController::class, 'update'])->name('update.setting');
    });
    /* ================  End Setting All Route ================== */

    /* ================  Start Campaign All Route ================== */
	Route::resource('/campaing', CampaingController::class);
	Route::get('/campaing/delete/{id}', [CampaingController::class, 'destroy'])->name('campaing.delete');
	Route::get('/campaing_active/{id}', [CampaingController::class, 'active'])->name('campaing.active');
	Route::get('/campaing_inactive/{id}', [CampaingController::class, 'inactive'])->name('campaing.in_active');

	Route::post('/flash_deals/product_discount', [CampaingController::class, 'product_discount'])->name('flash_deals.product_discount');
	Route::post('/flash-deals/product-discount-edit', [CampaingController::class, 'product_discount_edit'])->name('flash_deals.product_discount_edit');
	/* ================  End Campaign All Route ================== */

	/* ================  Start User Orders All Route ================== */
	Route::prefix('orders')->group(function(){
		// Orders All Route
		Route::get('/all_orders', [OrderController::class, 'index'])->name('order.index');
		Route::get('/all_orders/{id}/show', [OrderController::class, 'show'])->name('order.show');

		Route::get('/orders_delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');
		Route::post('/orders_update/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
		Route::get('/invoice/{id}', [OrderController::class, 'invoice_download'])->name('invoice.download');
	});
	/* ================  End User Orders All Route ================== */

	// payment status 
	Route::post('/orders/update_payment_status', [OrderController::class, 'update_payment_status'])->name('orders.update_payment_status');
	// delivery status 
	Route::post('/orders/update_delivery_status', [OrderController::class, 'update_delivery_status'])->name('orders.update_delivery_status');

	/*================  Divison With District Show Ajax  ==================*/
	Route::get('/division-district/ajax/{division_id}',[OrderController::class,'getdivision'])->name('division.ajax');
	Route::get('/district-upazilla/ajax/{district_id}',[OrderController::class,'getupazilla'])->name('upazilla.ajax');
	/*================  District With Upazila Show Ajax  ==================*/
	

	/*================  Start Payment Methods Route ==================*/
	Route::get('/payment-methods/configuration', [PaymentMethodController::class, 'index'])->name('paymentMethod.config');
	Route::post('/payment-methods/update', [PaymentMethodController::class, 'update'])->name('paymentMethod.update');
	/*================  End Payment Methods Route ==================*/



});

/*========================== End Admin Route  ==========================*/

require __DIR__.'/auth.php';
